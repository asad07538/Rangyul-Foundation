<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccLedger;
use App\Models\AccCostCenter;
use App\Models\AccEntry;
class AccReportController extends Controller
{
    //

    public function statement(Request $request){
        $ledgers=AccLedger::all();
        $accCostCenters=AccCostCenter::all();
        
        return view('account.reports.ledger_statement.index',compact('ledgers','accCostCenters'));
    }
    public function statement_report(Request $request){
        $ledgers=AccLedger::whereIn('id',$request->ledgers)->get();
        $accEntries=AccEntry::all();
        if($request->cost_center != 0){
            $accCostCenter=AccCostCenter::find($request->cost_center);
        }else{
            $accCostCenter=$request->cost_center;
        }
        $start_date=$request->start_date;
        $end_date=$request->end_date;
        
        return view('account.reports.ledger_statement.report',compact('ledgers','accCostCenter','start_date','end_date','accEntries'));
    }
    public function range(){


        return view('account.reports.range.index');
    }
    public function trial_balance(){

        return view('account.reports.trial_balance.index');
    }
    public function income_statement(){

        return view('account.reports.income_statement.index');
    }
    public function balance_sheet(){

        return view('account.reports.balance_sheet.index');
    }
}
