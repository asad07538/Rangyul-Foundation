<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AccEntry;
class FundRecoveryController extends Controller
{
    //
    public function index()
    {
        //
        $fund_recoveries=AccEntry::all();
        return view('fund.recovery.index',compact('fund_recoveries'));
    }
    public function create()
    {
        //
        return view('fund.recovery.create',compact('accGroups'));
    }
    public function store(Request $request)
    {
        //
        $data=$request->validate(
            [
                'name'        =>      'required|string',
            ]
        );
        $ledger=AccLedger::create($data);
        return redirect()->route('donar.index');
    }

}
