<?php

namespace App\Http\Controllers;

use App\Models\NeedyPerson;
use App\Models\AccGroup;
use App\Models\AccLedger;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class NeedyPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $needy_persons=NeedyPerson::all();
        return view('needy_person.index',compact('needy_persons'));
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
        $users=User::all();
        return view('needy_person.create',compact('accGroups','users'));
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
        // dd($request);
        $data=$request->validate(
            [
                'name'        =>      'required|string|max:250',
                'father_name'        =>      'string|max:250',
                'cnic'        =>      'string|max:250',
                'dob'        =>      'date|max:250',
                'marital_status'        =>      'string|max:250',
                'gender'        =>      'string|max:250',
                'prefrence_for_mailing'        =>      'string|max:250',
                'no_of_dependents'        =>      'string|max:250',
                'nearest_land_mark'        =>      'string|max:250',
                'country'        =>      'string|max:250',
                'district'        =>      'string|max:250',
                'tehsil'   =>      'string|max:250',
                'address'   =>      'string|max:250',

                'residense_status'   =>      'string|max:250',
                'residense_rent_amount'   =>      'string|max:250',
                'residense_for_year'   =>      'string|max:250',
                'residense_for_month'   =>      'string|max:250',
                'residense_permnant_country'   =>      'string|max:250',
                'residense_permnant_district'   =>      'string|max:250',
                'residense_permnant_tehsil'   =>      'string|max:250',
                'residense_permnant_address'   =>      'string|max:250',

                'kin_relationship'   =>      'string|max:250',
                'kin_cnic'   =>      'string|max:250',
                'kin_phone'   =>      'string|max:250',



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

        $needy_person=NeedyPerson::create($data);
        $needy_person->user_id  = $user->id;
        $needy_person->acc_ledger_id  = $ledger->id;
        $needy_person->added_by = Auth::user()->id;
        $needy_person->update();

        // dd($needy_person);

        return redirect()->route('needy_person.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NeedyPerson  $needyPerson
     * @return \Illuminate\Http\Response
     */
    public function show(NeedyPerson $needyPerson)
    {
        //
        return view('needy_person.show',compact('needyPerson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NeedyPerson  $needyPerson
     * @return \Illuminate\Http\Response
     */
    public function edit(NeedyPerson $needyPerson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NeedyPerson  $needyPerson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NeedyPerson $needyPerson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NeedyPerson  $needyPerson
     * @return \Illuminate\Http\Response
     */
    public function destroy(NeedyPerson $needyPerson)
    {
        //
    }
}
