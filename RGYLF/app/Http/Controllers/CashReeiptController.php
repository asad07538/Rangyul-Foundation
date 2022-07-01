<?php

namespace App\Http\Controllers;

use App\Models\AccEntry;
use App\Models\AccEntryItem;
use App\Models\AccCostCenter;
use App\Models\AccGroup;
use App\Models\AccLedger;
use App\Models\AccEntryType;
use Illuminate\Http\Request;

class CashReeiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accEntries=AccEntry::where('entry_type',4)->get();
        return view('account.entries.cash_receipt.index',compact('accEntries'));
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
        $accLedgers_from = AccLedger::where('is_bank_cash','!=','0')->get();
        $accLedgers_to = AccLedger::where('is_bank_cash','0')->get();
        // dd($accLedgers_from);
        $accEntryType_id=4;
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
