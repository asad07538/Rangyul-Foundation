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

class JournalEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accEntries=AccEntry::where('entry_type',5)->get();

        return view('account.entries.journal_entry.index',compact('accEntries'));
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
        $accLedgers_to = AccLedger::all();
        $accLedgers_from = AccLedger::all();
        $accEntryType_id=5;
        return view('account.entries.journal_entry.create',compact('accEntries','accLedgers_from','accLedgers_to','accEntryTypes','accCostCenters','accEntryType_id'));
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

        $total_credit=0;
        $total_debit=0;

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

        foreach ($request->ledger_id as $key => $ledger_id) {   
            $accEntryItem=new AccEntryItem;
            $accEntryItem->entry_id =$accEntry->id;
            $accEntryItem->ledger_id =$ledger_id;
            $accEntryItem->amount =$request->amount[$key];
            $accEntryItem->dc =$request->type[$key];
            if($request->type[$key] == "D"){
                $total_debit+=$request->amount[$key];
            }else{
                $total_credit+=$request->amount[$key];
            }
            $accEntryItem->save();
        }
        $accEntry->dr_total=$total_debit;
        $accEntry->cr_total=$total_credit;
        $accEntry->update();
        return redirect()->route('account_journal_entry.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccEntry  $accEntry
     * @return \Illuminate\Http\Response
     */
    public function show(AccEntry $accEntry)
    {
        //
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
