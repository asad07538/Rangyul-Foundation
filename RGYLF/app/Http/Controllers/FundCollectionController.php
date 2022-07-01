<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AccEntry;

class FundCollectionController extends Controller
{

    public function index()
    {
        //
        $fund_collections=AccEntry::all();
        return view('fund.collection.index',compact('fund_collections'));
    }
    public function create()
    {
        //
        return view('fund.collection.create',compact('accGroups'));
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
