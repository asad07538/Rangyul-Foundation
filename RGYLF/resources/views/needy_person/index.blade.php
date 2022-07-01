@extends('admin_layout.app', ['title' => 'Needy Persons'])

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Needy Persons</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 text-right">
            <a href="{{ route('needy_person.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus">Add New</i></a>
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
                  @foreach($needy_persons as $key => $needy_person)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$needy_person->name}}</td>
                    <td>{{$needy_person->email}}</td>
                    <td>{{$needy_person->contact_no}}</td>
                    <td>{{$needy_person->whatsapp_no}}</td>
                    <td>
                      <form action="{{ route('needy_person.destroy',$needy_person->id) }}" method="post"> 
                        @csrf
                        @method('DELETE')
                          <a href="{{ route('account_ledger.show',$needy_person->acc_ledger_id ) }}" class="btn btn-success btn-sm" title="Ledger"><i class="fa fa-book"></i></a>
                          <a href="{{ route('needy_person.show',$needy_person->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                          <!-- <a href="{{ route('needy_person.edit',$needy_person->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a> -->
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