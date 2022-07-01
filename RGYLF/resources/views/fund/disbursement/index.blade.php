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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Whatsapp No</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($fund_disbursements as $key => $fund_disbursement)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$fund_disbursement->name}}</td>
                    <td>{{$fund_disbursement->email}}</td>
                    <td>{{$fund_disbursement->contact_no}}</td>
                    <td>{{$fund_disbursement->whatsapp_no}}</td>
                    <td>
                      <form action="{{ route('fund_disbursement.destroy',$fund_disbursement->id) }}" method="post"> 
                        @csrf
                        @method('DELETE')
                          <a href="{{ route('fund_disbursement.show',$fund_disbursement->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                          <a href="{{ route('fund_disbursement.edit',$fund_disbursement->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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