<?php

namespace App\Http\Controllers;

use App\Models\AccGroup;
use Illuminate\Http\Request;

class AccGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accGroups=AccGroup::all();
        return view('account.group.index',compact('accGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $accGroups=AccGroup::all();
        return view('account.group.create',compact('accGroups'));
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
                'group_code'        =>      'required',
                'fy_id'        =>      'required',
            ]
        );
        $accgroup=AccGroup::create($data);
        return redirect()->route('account_group.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccGroup  $accGroup
     * @return \Illuminate\Http\Response
     */
    public function show(AccGroup $accGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccGroup  $accGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(AccGroup $accGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccGroup  $accGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccGroup $accGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccGroup  $accGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccGroup $accGroup)
    {
        //
    }
}
