<?php

namespace App\Http\Controllers;

use App\Models\AccCostCenter;
use Illuminate\Http\Request;

class AccCostCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accCostCenters=AccCostCenter::all();
        return view('account.cost_center.index',compact('accCostCenters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('account.cost_center.create');
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
                'remarks'        =>      'string|max:250',
                'active'        =>      '',
            ]
        );
        AccCostCenter::create($data);
        return redirect()->route('account_costcenter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccCostCenter  $accCostCenter
     * @return \Illuminate\Http\Response
     */
    public function show(AccCostCenter $accCostCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccCostCenter  $accCostCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(AccCostCenter $accCostCenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccCostCenter  $accCostCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccCostCenter $accCostCenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccCostCenter  $accCostCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccCostCenter $accCostCenter)
    {
        //
    }
}
