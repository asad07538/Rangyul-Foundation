@extends('admin_layout.app', ['title' => 'Sector'])

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">New Sector</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Sector</li>
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
              <form method="POST" action="{{ route('account_costcenter.store') }}">
                  @csrf
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name">
                    <div style="color: red">{{ $errors->first('name') }}</div>
                  </div>
                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" class="form-control" name="remarks">
                    <div style="color: red">{{ $errors->first('remarks') }}</div>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" value="1" class="form-check-input" value="">Active
                    </label>
                    <div style="color: red">{{ $errors->first('active') }}</div>
                  </div>
                  <div class="form-group">
                      <input type="submit" value="save" name="save"/>
                  </div>
              </form>
            </div><!-- /.container-fluid -->
        </div><!-- /.container-fluid -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection