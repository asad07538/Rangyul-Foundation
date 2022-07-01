@extends('admin_layout.app', ['title' => 'Fund Collection'])

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Fund Collection</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Fund Collection</li>
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
            <a href="{{ route('fund_collection.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus">Add New</i></a>
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
                  @foreach($fund_collections as $key => $fund_collection)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$fund_collection->name}}</td>
                    <td>{{$fund_collection->email}}</td>
                    <td>{{$fund_collection->contact_no}}</td>
                    <td>{{$fund_collection->whatsapp_no}}</td>
                    <td>
                      <form action="{{ route('fund_collection.destroy',$fund_collection->id) }}" method="post"> 
                        @csrf
                        @method('DELETE')
                          <a href="{{ route('fund_collection.show',$fund_collection->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                          <a href="{{ route('fund_collection.edit',$fund_collection->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
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