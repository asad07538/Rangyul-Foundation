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
        $expenses=AccEntry::where('custom_type','expense')->get();
        return view('fund.expense.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accCostCenters=AccCostCenter::all();
        $accEntryTypes=AccEntryType::all();
        $accLedgers_from=AccLedger::where('is_bank_cash','!=','0')->get();
        $accLedgers_to=AccLedger::where('group_id','4');
        $donars=Donar::all();
        $accEntryType_id=4;
        return view('fund.expense.create',compact('accEntries','accLedgers_from','accLedgers_to','accEntryTypes','accCostCenters','accEntryType_id','donars'));
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
