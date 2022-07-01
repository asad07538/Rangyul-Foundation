@extends('admin_layout.app', ['title' => 'Financial Year'])

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">New Financial Year</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Financial Year</li>
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
            <div class="col-md-8">
              <form method="POST" action="{{ route('account_financialyear.store') }}">
                  @csrf
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name">
                    <div style="color: red">{{ $errors->first('name') }}</div>
                  </div>
                  <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" class="form-control" name="start_date">
                    <div style="color: red">{{ $errors->first('start_date') }}</div>
                  </div>
                  <div class="form-group">
                    <label>End Date</label>
                    <input type="date" class="form-control" name="end_date">
                    <div style="color: red">{{ $errors->first('end_date') }}</div>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" value="1" class="form-check-input" value="">Active
                    </label>
                    <div style="color: red">{{ $errors->first('active') }}</div>
                  </div>
                  <div class="form-control">
                      <input type="submit" value="save" name="save"/>
                  </div>
              </form>
            </div><!-- /.col-8 -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection