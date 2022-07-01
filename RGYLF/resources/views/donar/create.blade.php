@extends('admin_layout.app', ['title' => 'Donar'])

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">New Donar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Donar</li>
            </ol>
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
        <div class="row justify-content-center">
            <div class="col-md-12">
              <form method="POST" action="{{ route('donar.store') }}">
                  @csrf
                  <input type="hidden" name="fy_id" value="{{$fyear->id}}">
                  <input type="hidden"  name="group_id" class="form-control" value="5">
                  <input type="hidden"  name="is_bank_cash" class="form-control" value="0">
                  <h4>Personal Details</h4>
                  <hr>
                  <div class="row">
                    <div class="form-group col-md-4 col-lg-3">
                      <label>Name *</label>
                      <input type="text" class="form-control" name="name">
                      <div style="color: red">{{ $errors->first('name') }}</div>
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                      <label>Father Name *</label>
                      <input type="text" class="form-control" name="father_name">
                      <div style="color: red">{{ $errors->first('father_name') }}</div>
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                      <label>CNIC *</label>
                      <input type="text" class="form-control" name="cnic">
                      <div style="color: red">{{ $errors->first('cnic') }}</div>
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                      <label>Date of Birth *</label>
                      <input type="date" class="form-control" name="dob">
                      <div style="color: red">{{ $errors->first('dob') }}</div>
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email">
                      <div style="color: red">{{ $errors->first('email') }}</div>
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                      <label>Contact Number *</label>
                      <input type="text" class="form-control" name="contact_no">
                      <div style="color: red">{{ $errors->first('contact_no') }}</div>
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                      <label>What'a App Number</label>
                      <input type="text" class="form-control" name="whatsapp_no">
                      <div style="color: red">{{ $errors->first('whatsapp_no') }}</div>
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                      <label>Marital Status *</label>
                      <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="Married" name="marital_status"> Married
                          </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" value="Unmarried" name="marital_status"> Unmarried
                        </label>
                      </div>
                      <div style="color: red">{{ $errors->first('marital_status') }}</div>
                    </div>

                    <div class="form-group col-md-4 col-lg-3">
                      <label>Gender *</label>
                      <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="Male" name="gender"> Male
                          </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" value="Female" name="gender"> Female
                        </label>
                      </div>
                      <div style="color: red">{{ $errors->first('gender') }}</div>
                    </div>

                    <div class="form-group col-md-4 col-lg-3">
                      <label>Prefrence for mailing</label>
                      <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="home" name="prefrence_for_mailing"> Home
                          </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" value="office" name="prefrence_for_mailing"> Office
                        </label>
                      </div>
                      <div style="color: red">{{ $errors->first('prefrence_for_mailing') }}</div>
                    </div>
                </div>
                <h4>Address</h4>
                <hr>
                  <div class="row">
                    <div class="form-group col-md-4 col-lg-3">
                      <label>Country *</label>
                      <input type="text" class="form-control" name="country">
                      <div style="color: red">{{ $errors->first('country') }}</div>
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                      <label>District *</label>
                      <input type="text" class="form-control" name="district">
                      <div style="color: red">{{ $errors->first('district') }}</div>
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                      <label>Tehsil *</label>
                      <input type="text" class="form-control" name="tehsil">
                      <div style="color: red">{{ $errors->first('tehsil') }}</div>
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                      <label>Address *</label>
                      <input type="text" class="form-control" name="address">
                      <div style="color: red">{{ $errors->first('address') }}</div>
                    </div>

                  </div>

                  <h4>Bank Details</h4>
                  <hr>
                  <div class="row">
                    <div class="form-group col-md-4 col-lg-3">
                      <label>Account Name *</label>
                      <input type="text" class="form-control" name="account_name">
                      <div style="color: red">{{ $errors->first('account_name') }}</div>
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                      <label>Account CNIC *</label>
                      <input type="text" class="form-control" name="account_cnic">
                      <div style="color: red">{{ $errors->first('account_cnic') }}</div>
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                      <label>Account CRM No *</label>
                      <input type="text" class="form-control" name="account_crm_no">
                      <div style="color: red">{{ $errors->first('account_crm_no') }}</div>
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                      <label>Account Title *</label>
                      <input type="text" class="form-control" name="account_title">
                      <div style="color: red">{{ $errors->first('account_title') }}</div>
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                      <label>Account No *</label>
                      <input type="text" class="form-control" name="account_no">
                      <div style="color: red">{{ $errors->first('account_no') }}</div>
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                      <label>Account Type *</label>
                      <input type="text" class="form-control" name="account_type">
                      <div style="color: red">{{ $errors->first('account_type') }}</div>
                    </div>
                  </div>


                  <h4>Account Details</h4>
                  <hr>
                  <div class="row">
                    <div class="form-group col-md-4 col-lg-3">
                      <label>Account Code *</label>
                      <input type="text" class="form-control" name="acc_code">
                      <div style="color: red">{{ $errors->first('acc_code') }}</div>
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                      <label>Opening Balance *</label>
                      <input type="number" class="form-control" name="op_balance">
                      <div style="color: red">{{ $errors->first('op_balance') }}</div>
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                      <label>Opening Balance Credit/Debit *</label>
                      <select name="op_balance_dc" class="form-control">
                        <option value="Credit">Credit</option>
                        <option value="Debit">Debit</option>
                      </select>
                      <div style="color: red">{{ $errors->first('op_balance_dc') }}</div>
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                      <label>Budget</label>
                      <input type="number" class="form-control" name="budget">
                      <div style="color: red">{{ $errors->first('budget') }}</div>
                    </div>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" value="1" class="form-check-input" value="">Active
                    </label>
                    <div style="color: red">{{ $errors->first('active') }}</div>
                  </div>
                  <div class="form-group text-right">
                      <input type="submit" class="btn btn-primary px-4" value="save" name="save"/>
                  </div>
              </form>
            </div><!-- /.container-fluid -->
        </div><!-- /.container-fluid -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection