<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AccEntry;
class FundDisbursementController extends Controller
{

    public function index()
    {
        //
        $fund_disbursements=AccEntry::all();
        return view('fund.disbursement.index',compact('fund_disbursements'));
    }
    public function create()
    {
        //
        return view('fund.disbursement.create',compact('accGroups'));
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
