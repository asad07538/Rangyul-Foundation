<?php

namespace App\Http\Controllers;

use App\Models\AccEntryType;
use Illuminate\Http\Request;

class AccEntryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accEntryTypes=AccEntryType::all();
        return view('account.entry_types.index',compact('accEntryTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // dd("dsf");
        return view('account.entry_types.create');
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
                'name'        =>      'required|string|max:20',
                'description'        =>      'required|string|max:20',
                'prefix'        =>      'required|string|max:20',
            ]
        );
        AccEntryType::create($data);
        return redirect()->route('account_type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccEntryType  $accEntryType
     * @return \Illuminate\Http\Response
     */
    public function show(AccEntryType $accEntryType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccEntryType  $accEntryType
     * @return \Illuminate\Http\Response
     */
    public function edit(AccEntryType $accEntryType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccEntryType  $accEntryType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccEntryType $accEntryType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccEntryType  $accEntryType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccEntryType $accEntryType)
    {
        //
    }
}
