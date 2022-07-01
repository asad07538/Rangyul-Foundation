@extends('admin_layout.app', ['title' => 'Fund Disbursement'])

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Fund Disbursement</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Fund Disbursement</li>
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
        <div class="text-right">
            <a href="{{ route('fund_disbursement.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus">Add New</i></a>
        </div>
        <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Number</th>
                        <th>Type</th>
                        <th>Dr Total</th>
                        <th>Cr Total</th>
                        <th>Sector</th>
                        <th>Financial Year</th>
                        <th>User</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($fund_disbursements as $key => $accEntry)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$accEntry->date}}</td>
                    <td>{{$accEntry->number}}</td>
                    <td>{{$accEntry->entryType->name}}</td>
                    <td>{{$accEntry->dr_total}}</td>
                    <td>{{$accEntry->cr_total}}</td>
                    <td>{{$accEntry->costCenter->name}}</td>
                    <td>{{$accEntry->financialYear->name}}</td>
                    <td>{{$accEntry->user->name}}</td>
                    <td>
                      <form action="{{ route('account_entry.destroy',$accEntry->id) }}" method="post"> 
                        @csrf
                        @method('DELETE')
                          <a href="{{ route('account_entry.show',$accEntry->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                          <!-- <a href="{{ route('account_entry.edit',$accEntry->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> -->
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection