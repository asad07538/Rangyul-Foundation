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
            <a href="{{ route('donar.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus">Add New</i></a>
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
                  @foreach($donars as $key => $donar)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$donar->name}}</td>
                    <td>{{$donar->email}}</td>
                    <td>{{$donar->contact_no}}</td>
                    <td>{{$donar->whatsapp_no}}</td>
                    </td>
                    <td>
                      <form action="{{ route('donar.destroy',$donar->id) }}" method="post"> 
                        @csrf
                        @method('DELETE')
                          <a href="{{ route('account_ledger.show',$donar->acc_ledger_id ) }}" class="btn btn-success btn-sm" title="Ledger"><i class="fa fa-book"></i></a>
                          <a href="{{ route('donar.show',$donar->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                          <!-- <a href="{{ route('donar.edit',$donar->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a> -->
                          <!-- <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> -->
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