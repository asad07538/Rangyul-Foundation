@extends('admin_layout.app', ['title' => 'Donars'])

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Donars</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 text-right">
            <a href="{{ route('account_ledger.show',$needyPerson->acc_ledger_id ) }}" class="btn btn-success btn-sm" title="Ledger"><i class="fa fa-print"></i></a>
            <a href="{{ route('account_ledger.show',$needyPerson->acc_ledger_id ) }}" class="btn btn-success btn-sm" title="Ledger"><i class="fa fa-download"></i></a>
            <a href="{{ route('account_ledger.show',$needyPerson->acc_ledger_id ) }}" class="btn btn-success btn-sm" title="Ledger"><i class="fa fa-book"></i></a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card py-4 px-2 mt-2">
            <h5>Personal Details</h5>
            <hr>
            <div class="row ">
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Name: </strong></div>
                        <div class="col-md-6">{{$needyPerson->name}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Father Name: </strong></div>
                        <div class="col-md-6">{{$needyPerson->father_name}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>CNIC: </strong></div>
                        <div class="col-md-6">{{$needyPerson->cnic}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Date of Birth: </strong></div>
                        <div class="col-md-6">{{$needyPerson->dob}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Email: </strong></div>
                        <div class="col-md-6">{{$needyPerson->email}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Marital Status: </strong></div>
                        <div class="col-md-6">{{$needyPerson->marital_status}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Gender: </strong></div>
                        <div class="col-md-6">{{$needyPerson->gender}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Contact No: </strong></div>
                        <div class="col-md-6">{{$needyPerson->contact_no}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Whatsapp No: </strong></div>
                        <div class="col-md-6">{{$needyPerson->whatsapp_no}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Prefrence For Mailing: </strong></div>
                        <div class="col-md-6">{{$needyPerson->prefrence_for_mailing}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>No of Dependents: </strong></div>
                        <div class="col-md-6">{{$needyPerson->no_of_dependents}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Nearest Land Mark: </strong></div>
                        <div class="col-md-6">{{$needyPerson->nearest_land_mark}}</div>
                    </div>            
                </div>
            </div>

        </div>
        <div class="card py-4 px-2 mt-2">
            <h5>Address</h5>
            <hr>
            <div class="row ">
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Country: </strong></div>
                        <div class="col-md-6">{{$needyPerson->country}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>District: </strong></div>
                        <div class="col-md-6">{{$needyPerson->district}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Tehsil: </strong></div>
                        <div class="col-md-6">{{$needyPerson->tehsil}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Address: </strong></div>
                        <div class="col-md-6">{{$needyPerson->address}}</div>
                    </div>            
                </div>
            </div>
        </div>
        <div class="card py-4 px-2 mt-2">
            <h5>Residential Details</h5>
            <hr>
            <div class="row ">
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Residense Status: </strong></div>
                        <div class="col-md-6">{{$needyPerson->residense_status}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Residense Rent Amount: </strong></div>
                        <div class="col-md-6">{{$needyPerson->residense_rent_amount}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Residense For: </strong></div>
                        <div class="col-md-6">Year: {{$needyPerson->residense_for_year}} Month: {{$needyPerson->residense_for_month}}</div>
                    </div>            
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Country: </strong></div>
                        <div class="col-md-6">{{$needyPerson->residense_permnant_country}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>District: </strong></div>
                        <div class="col-md-6">{{$needyPerson->residense_permnant_district}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Tehsil: </strong></div>
                        <div class="col-md-6">{{$needyPerson->residense_permnant_tehsil}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Address: </strong></div>
                        <div class="col-md-6">{{$needyPerson->residense_permnant_address}}</div>
                    </div>            
                </div>
            </div>
        </div>
        <div class="card py-4 px-2 mt-2">
            <h5>Kin Details</h5>
            <hr>
            <div class="row ">
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Kin Name: </strong></div>
                        <div class="col-md-6">{{$needyPerson->kin_name}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Kin Relationship: </strong></div>
                        <div class="col-md-6">{{$needyPerson->kin_relationship}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Kin CNIC: </strong></div>
                        <div class="col-md-6">{{$needyPerson->kin_cnic}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Kin Phone: </strong></div>
                        <div class="col-md-6">{{$needyPerson->kin_phone}}</div>
                    </div>            
                </div>
            </div>
        </div>
        <div class="card py-4 px-2 mt-2">
            <h5>Bank Account Details</h5>
            <hr>
            <div class="row ">
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Account Name: </strong></div>
                        <div class="col-md-6">{{$needyPerson->account_name}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Account CNIC: </strong></div>
                        <div class="col-md-6">{{$needyPerson->account_cnic}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Account Crm No: </strong></div>
                        <div class="col-md-6">{{$needyPerson->account_crm_no}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Account Title: </strong></div>
                        <div class="col-md-6">{{$needyPerson->account_title}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Account No: </strong></div>
                        <div class="col-md-6">{{$needyPerson->account_no}}</div>
                    </div>            
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-6"><strong>Account Type: </strong></div>
                        <div class="col-md-6">{{$needyPerson->account_type}}</div>
                    </div>            
                </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection