<?php

namespace App\Http\Controllers;

use App\Models\AccLedger;
use App\Models\AccGroup;
use Illuminate\Http\Request;

class AccLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accLedgers=AccLedger::all();
        return view('account.ledger.index',compact('accLedgers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $accGroups=AccGroup::all();
        return view('account.ledger.create',compact('accGroups'));
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
                'group_id'        =>      'required|string',
                'acc_code'        =>      'required',
                'name'        =>      'required',
                'op_balance'        =>      'required',
                'op_balance_dc'        =>      'required',
                'is_bank_cash'        =>      'required',
                'budget'        =>      'required',
                'fy_id'        =>      'required',
            ]
        );
        AccLedger::create($data);
        return redirect()->route('account_ledger.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccLedger  $accLedger
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $accLedger=AccLedger::find($id);
        return view('account.ledger.show',compact('accLedger'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccLedger  $accLedger
     * @return \Illuminate\Http\Response
     */
    public function edit(AccLedger $accLedger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccLedger  $accLedger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccLedger $accLedger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccLedger  $accLedger
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccLedger $accLedger)
    {
        //
    }
}
