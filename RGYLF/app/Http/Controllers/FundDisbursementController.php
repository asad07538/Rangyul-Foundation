<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AccEntry;
use App\Models\AccEntryItem;
use App\Models\AccCostCenter;
use App\Models\AccGroup;
use App\Models\AccLedger;
use App\Models\AccEntryType;

use Illuminate\Support\Facades\Auth;
use App\Models\NeedyPerson;
class FundDisbursementController extends Controller
{

    public function index()
    {
        //
        $fund_disbursements=AccEntry::where('custom_type','fund_disbursment')->get();
        return view('fund.disbursement.index',compact('fund_disbursements'));
    }
    public function create()
    {
        //
        $accEntries=AccEntry::all();
        $accCostCenters=AccCostCenter::all();
        $accEntryTypes=AccEntryType::all();
        $accLedgers_from=AccLedger::where('is_bank_cash','!=','0')->get();
        $accLedgers_to=AccLedger::all();
        $needyPersons=NeedyPerson::all();

        $accEntryType_id=4;
        return view('fund.disbursement.create',compact('accEntries','accLedgers_from','accLedgers_to','accEntryTypes','accCostCenters','accEntryType_id','needyPersons'));
    }
    public function store(Request $request)
    {
        //

        $data=$request->validate(
            [
                'entry_type'        =>      'required',
                'cost_center_id'        =>      'required',
                'fy_id'        =>      'required',
            ]
        );
        // dd($request);


        $accLedger=AccLedger::find($request->pay_ledger_id);



        $accEntry=new AccEntry;
        $accEntry->tag_id="";

        if($accLedger->is_bank_cash =="1"){
            // bank
            $accEntry->entry_type=1;
        }else{
            // cash
            $accEntry->entry_type=3;
        }
        $accEntry->number=$request->number;
        $accEntry->date=$request->date;
        $accEntry->dr_total=array_sum($request->amount);
        $accEntry->cr_total=array_sum($request->amount);
        $accEntry->narration=$request->narration;
        $accEntry->cheque_no=$request->cheque_no;
        $accEntry->cost_center_id =$request->cost_center_id;
        $accEntry->fy_id =$request->fy_id;
        $accEntry->user_id  =Auth::user()->id;
        $accEntry->status ="Completed";
        $accEntry->custom_type= "fund_disbursment";
        $accEntry->save();

        $accEntryItem=new AccEntryItem;
        $accEntryItem->entry_id = $accEntry->id;
        $accEntryItem->ledger_id =$request->pay_ledger_id;
        $accEntryItem->amount =array_sum($request->amount);
        $accEntryItem->dc ="D";
        $accEntryItem->save();


        $debit  = 0;                
        $credit = 0;

        foreach ($request->ledger_id as $key => $ledger_id) {   
            $loopAccEntryItem=new AccEntryItem;
            $loopAccEntryItem->entry_id =$accEntry->id;
            $loopAccEntryItem->ledger_id =$ledger_id;
            $loopAccEntryItem->amount =$request->amount[$key];

                $loopAccEntryItem->dc ="C";
                $credit += $request->amount[$key];

            $accEntryItem->save();
        }
        

        $accEntry->status ="Completed";
        $accEntry->dr_total= $debit;
        $accEntry->cr_total= $credit;
        $accEntry->custom_type= "fund_disbursment";
        $accEntry->update();



        return redirect()->route('fund_disbursement.index');
    }

}
