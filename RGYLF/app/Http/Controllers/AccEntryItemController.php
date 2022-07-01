<?php

namespace App\Http\Controllers;

use App\Models\AccEntryItem;
use Illuminate\Http\Request;

class AccEntryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accEntryItems=AccEntryItem::all();
        return view('account.financial_year.index',compact('accEntryItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\AccEntryItem  $accEntryItem
     * @return \Illuminate\Http\Response
     */
    public function show(AccEntryItem $accEntryItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccEntryItem  $accEntryItem
     * @return \Illuminate\Http\Response
     */
    public function edit(AccEntryItem $accEntryItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccEntryItem  $accEntryItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccEntryItem $accEntryItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccEntryItem  $accEntryItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccEntryItem $accEntryItem)
    {
        //
    }
}
