@extends('admin_layout.app', ['title' => 'Entry Types'])

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Entry Types</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Entry Types</li>
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
            <!-- <a href="{{ route('account_type.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus">Add New</i></a> -->
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Prefix</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                  @foreach($accEntryTypes as $key => $accEntryType)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$accEntryType->name}}</td>
                    <td>{{$accEntryType->description}}</td>
                    <td>{{$accEntryType->prefix}}</td>
                    <!-- <td>
                      <form action="{{ route('account_entry.destroy',$accEntryType->id) }}" method="post"> 
                        @csrf
                        @method('DELETE')
                          <a href="{{ route('account_type.show',$accEntryType->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                          <a href="{{ route('account_type.edit',$accEntryType->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </form>
                    </td> -->
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection