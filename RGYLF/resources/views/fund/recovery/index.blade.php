@extends('admin_layout.app', ['title' => 'Needy Persons'])

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Needy Persons</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Needy Persons</li>
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
            <a href="{{ route('fund_recovery.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus">Add New</i></a>
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
                  @foreach($fund_recoveries as $key => $fund_recovery)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$fund_recovery->name}}</td>
                    <td>{{$fund_recovery->email}}</td>
                    <td>{{$fund_recovery->contact_no}}</td>
                    <td>{{$fund_recovery->whatsapp_no}}</td>
                    <td>
                      <form action="{{ route('fund_recovery.destroy',$fund_recovery->id) }}" method="post"> 
                        @csrf
                        @method('DELETE')
                          <a href="{{ route('fund_recovery.show',$fund_recovery->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                          <a href="{{ route('fund_recovery.edit',$fund_recovery->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
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