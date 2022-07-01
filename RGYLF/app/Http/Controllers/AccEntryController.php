<?php

namespace App\Http\Controllers;

use App\Models\AccEntry;
use App\Models\AccEntryItem;
use App\Models\AccCostCenter;
use App\Models\AccGroup;
use App\Models\AccLedger;
use App\Models\AccEntryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AccEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accEntries=AccEntry::all();
        return view('account.entries.index',compact('accEntries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $accEntries=AccEntry::all();
        $accCostCenters=AccCostCenter::all();
        $accEntryTypes=AccEntryType::all();
        $accLedgers_from=AccLedger::all();
        $accLedgers_to=AccLedger::all();

        $accEntryType_id=6;
        return view('account.entries.create',compact('accEntries','accLedgers_from','accLedgers_to','accEntryTypes','accCostCenters','accEntryType_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        $accEntry=new AccEntry;
        $accEntry->tag_id="";
        $accEntry->entry_type=$request->entry_type;
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
        $accEntry->save();

        $accEntryItem=new AccEntryItem;
        $accEntryItem->entry_id = $accEntry->id;
        $accEntryItem->ledger_id =$request->pay_ledger_id;
        $accEntryItem->amount =array_sum($request->amount);

        if($request->entry_type == 1){
            $accEntryItem->dc ="C";
        }
        if($request->entry_type == 2){
            $accEntryItem->dc ="D";
        }
        if($request->entry_type == 3){
            $accEntryItem->dc ="C";
        }
        if($request->entry_type == 4){
            $accEntryItem->dc ="D";
        }
        if($request->entry_type == 5){
            $accEntryItem->dc ="D";
        }
        if($request->entry_type == 6){
            $accEntryItem->dc ="D";
        }
        $accEntryItem->save();


        $debit  = 0;                
        $credit = 0;

        foreach ($request->ledger_id as $key => $ledger_id) {   
            $loopAccEntryItem=new AccEntryItem;
            $loopAccEntryItem->entry_id =$accEntry->id;
            $loopAccEntryItem->ledger_id =$ledger_id;
            $loopAccEntryItem->amount =$request->amount[$key];

            if($request->entry_type == 1){
                $loopAccEntryItem->dc ="D";
                $debit  += $request->amount[$key];                
            }else{
                $credit += $request->amount[$key];
            }
            if($request->entry_type == 2){
                $loopAccEntryItem->dc ="C";
                $credit += $request->amount[$key];
            }else{
                $debit  += $request->amount[$key];                
            }
            if($request->entry_type == 3){
                $loopAccEntryItem->dc ="D";
                $debit  += $request->amount[$key];                
            }else{
                $credit += $request->amount[$key];
            }
            if($request->entry_type == 4){
                $loopAccEntryItem->dc ="C";
                $credit += $request->amount[$key];
            }else{
                $debit  += $request->amount[$key];                
            }
            if($request->entry_type == 5){
                $loopAccEntryItem->dc ="C";
                $credit += $request->amount[$key];
            }else{
                $debit  += $request->amount[$key];                
            }
            if($request->entry_type == 6){
                $loopAccEntryItem->dc ="C";
                $credit += $request->amount[$key];
            }else{
                $debit  += $request->amount[$key];
            }
            $loopAccEntryItem->save();
        }
        

        $accEntry->status ="Completed";
        $accEntry->dr_total= $debit;
        $accEntry->cr_total= $credit;
        $accEntry->update();


        if($request->entry_type == 1){
            return redirect()->route('account_bank_payment.index');
        }
        if($request->entry_type == 2){
            return redirect()->route('account_bank_receipt.index');
        }
        if($request->entry_type == 3){
            return redirect()->route('account_cash_payment.index');
        }
        if($request->entry_type == 4){
            return redirect()->route('account_cash_receipt.index');
        }
        if($request->entry_type == 5){
            return redirect()->route('account_journal_entry.index');
        }
        if($request->entry_type == 6){
            return redirect()->route('account_bank_transfer.index');
        }
        // dd($request);
        return redirect()->route('account_entry.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccEntry  $accEntry
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $accEntry=AccEntry::find($id);
        return view('account.entries.show',compact('accEntry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccEntry  $accEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(AccEntry $accEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccEntry  $accEntry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccEntry $accEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccEntry  $accEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccEntry $accEntry)
    {
        //
    }
}
