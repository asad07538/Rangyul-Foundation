<?php

namespace App\Http\Controllers;

use App\Models\AccFinalYear;
use Illuminate\Http\Request;

class AccFinalYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accFinalYears=AccFinalYear::all();
        return view('account.financial_year.index',compact('accFinalYears'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('account.financial_year.create');
    }
    public function active($id)
    {
        //
        AccFinalYear::where('active',1)->update([
            'active'=>0 
        ]);
        $accFinalYear=AccFinalYear::find($id);
        $accFinalYear->active=1;
        $accFinalYear->update();
        return redirect()->route('account_financialyear.index');
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
                'name'        =>      'required|string|max:250',
                'start_date'        =>      'required',
                'end_date'        =>      'required',
                'active'        =>      '',
            ]
        );
        AccFinalYear::create($data);
        return redirect()->route('account_financialyear.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccFinalYear  $accFinalYear
     * @return \Illuminate\Http\Response
     */
    public function show(AccFinalYear $accFinalYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccFinalYear  $accFinalYear
     * @return \Illuminate\Http\Response
     */
    public function edit(AccFinalYear $accFinalYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccFinalYear  $accFinalYear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccFinalYear $accFinalYear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccFinalYear  $accFinalYear
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccFinalYear $accFinalYear)
    {
        //
    }
}
