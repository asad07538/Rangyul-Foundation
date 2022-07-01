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
            <form method="POST" action="{{ route('sector.store') }}">
                  @csrf
                  <input type="hidden" name="fy_id" value="{{$fyear->id}}">
                  <h4>Personal Details</h4>
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name">
                      <div style="color: red">{{ $errors->first('name') }}</div>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Description</label>
                      <input type="text" class="form-control" name="description">
                      <div style="color: red">{{ $errors->first('description') }}</div>
                    </div>
                    <div class="form-check col-md-4">
                      <label class="form-check-label">
                        <input type="checkbox" value="1" class="form-check-input" value="">Active
                      </label>
                      <div style="color: red">{{ $errors->first('active') }}</div>
                    </div>
                  <div class="form-group text-right">
                      <input type="submit" class="btn btn-primary px-4" value="save" name="save"/>
                  </div>
              </form>
            </div><!-- /.container-fluid -->
            </div><!-- /.container-fluid -->
        </div><!-- /.container-fluid -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection