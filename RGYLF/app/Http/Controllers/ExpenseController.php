<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AccEntry;
class ExpenseController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $expenses=AccEntry::all();
        return view('fund.expense.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('fund.expense.create',compact('accGroups'));
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
                'name'        =>      'required|string',
            ]
        );
        $ledger=AccLedger::create($data);
        return redirect()->route('donar.index');
    }

}
