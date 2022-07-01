<?php

namespace App\Http\Controllers;

use App\Models\Donar;
use App\Models\AccGroup;
use App\Models\AccLedger;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;


class DonarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $donars=Donar::all();
        // dd($donars);
        return view('donar.index',compact('donars'));
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
        return view('donar.create',compact('accGroups'));
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
                'father_name'        =>      'string|max:250',
                'cnic'        =>      'string|max:250',
                'dob'        =>      'date|max:250',
                'gender'        =>      'string|max:250',
                'prefrence_for_mailing'        =>      'string|max:250',
                'country'        =>      'string|max:250',
                'district'        =>      'string|max:250',
                'tehsil'   =>      'string|max:250',
                'address'   =>      'string|max:250',



                'account_name'   =>      'string|max:250',
                'account_cnic'   =>      'string|max:250',
                'account_crm_no'   =>      'string|max:250',
                'account_title'   =>      'string|max:250',
                'account_no'   =>      'string|max:250',
                'account_type'   =>      'string|max:250',
                
                'email'        =>      'required',
                'contact_no'        =>      'required',
                'whatsapp_no'        =>      'required',


                'group_id'        =>      'required',
                'acc_code'        =>      'required',
                'op_balance'        =>      'required',
                'op_balance_dc'        =>      'required',
                'is_bank_cash'        =>      'required',
                'budget'        =>      'required',
                'fy_id'        =>      'required',
            ]
        );
        $ledger=AccLedger::create($data);


        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make('123456789');
        $user->save();

        $accgroup=Donar::create($data);
        $accgroup->user_id  = $user->id;
        $accgroup->acc_ledger_id  = $ledger->id;
        $accgroup->added_by = Auth::user()->id;
        $accgroup->update();

        // dd($accgroup);
        return redirect()->route('donar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donar  $donar
     * @return \Illuminate\Http\Response
     */
    public function show(Donar $donar)
    {
        //

        // $donars=Donar::all();
        // dd($donars);
        return view('donar.show',compact('donar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donar  $donar
     * @return \Illuminate\Http\Response
     */
    public function edit(Donar $donar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donar  $donar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donar $donar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donar  $donar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donar $donar)
    {
        //
    }
}
