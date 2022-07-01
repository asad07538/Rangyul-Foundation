@extends('admin_layout.app', ['title' => 'Needy Person'])

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">New Needy Person</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Needy Person</li>
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
            <div class="col-md-10">
            <form method="POST" action="{{ route('needy_person.store') }}">
                  @csrf
                  <input type="hidden" name="fy_id" value="{{$fyear->id}}">
                  <h4>Personal Details</h4>
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name">
                      <div style="color: red">{{ $errors->first('name') }}</div>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Email</label>
                      <input type="text" class="form-control" name="email">
                      <div style="color: red">{{ $errors->first('email') }}</div>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Contact Number</label>
                      <input type="text" class="form-control" name="contact_no">
                      <div style="color: red">{{ $errors->first('contact_no') }}</div>
                    </div>
                    <div class="form-group col-md-4">
                      <label>What'a App Number</label>
                      <input type="text" class="form-control" name="whatsapp_no">
                      <div style="color: red">{{ $errors->first('whatsapp_no') }}</div>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Verified By</label>
                      <select name="verified_by" class="form-control">
                        @foreach($users as $user)
                          <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                      </select>
                      <div style="color: red">{{ $errors->first('name') }}</div>
                    </div>
                  </div>
                  
                  <h4>Account Details</h4>
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label>Account Groups</label>
                      <select name="group_id" class="form-control">
                        @foreach($accGroups as $accGroup)
                          <option value="{{$accGroup->id}}">{{$accGroup->name}}</option>
                        @endforeach
                      </select>
                      <div style="color: red">{{ $errors->first('name') }}</div>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Account Code</label>
                      <input type="text" class="form-control" name="acc_code">
                      <div style="color: red">{{ $errors->first('acc_code') }}</div>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Opening Balance</label>
                      <input type="number" class="form-control" name="op_balance">
                      <div style="color: red">{{ $errors->first('op_balance') }}</div>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Opening Balance Credit/Debit</label>
                      <select name="op_balance_dc" class="form-control">
                        <option value="Credit">Credit</option>
                        <option value="Debit">Debit</option>
                      </select>
                      <div style="color: red">{{ $errors->first('op_balance_dc') }}</div>
                    </div>
                    <div class="form-check col-md-4">
                      <label class="form-check-label">
                        <input type="radio" name="is_bank_cash" value="1" class="form-check-input" checked="" value="0">No
                      </label><br>
                      <label class="form-check-label">
                        <input type="radio" name="is_bank_cash" value="1" class="form-check-input" value="1">Is Bank
                      </label><br>
                      <label class="form-check-label">
                        <input type="radio" name="is_bank_cash" value="1" class="form-check-input" value="2">Is Cash
                      </label>
                      <div style="color: red">{{ $errors->first('active') }}</div>
                    </div>
                    <div class="form-group col-md-4">
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