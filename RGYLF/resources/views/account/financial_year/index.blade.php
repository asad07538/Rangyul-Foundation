@extends('admin_layout.app', ['title' => 'Financial Years'])

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Financial Years</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Financial Years</li>
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
            <a href="{{ route('account_financialyear.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus">Add New</i></a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($accFinalYears as $key => $accFinalYear)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$accFinalYear->name}}</td>
                    <td>{{$accFinalYear->start_date}}</td>
                    <td>{{$accFinalYear->end_date}}</td>
                    <td>
                      @if($accFinalYear->active == 1)
                        Active
                      @else
                        Inactive
                      @endif
                    </td>
                    <td>
                      <form action="{{ route('account_financialyear.destroy',$accFinalYear->id) }}" method="post"> 
                        @csrf
                        @method('DELETE')
                          <a href="{{ route('account_financialyear.show',$accFinalYear->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                          <a href="{{ route('account_financialyear.edit',$accFinalYear->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                          <a href="{{ route('account_financialyear.active',$accFinalYear->id) }}" class="btn btn-info btn-sm"><i class="">Active</i></a>
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