@extends('admin_layout.app', ['title' => 'Entry Type'])

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">New Entry Type</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Entry Type</li>
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
            <form method="POST" action="{{ route('account_type.store') }}">
                @csrf
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name">
                  <div style="color: red">{{ $errors->first('name') }}</div>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <input type="text" class="form-control" name="description">
                  <div style="color: red">{{ $errors->first('description') }}</div>
                </div>
                <div class="form-group">
                  <label>Prefix</label>
                  <input type="text" class="form-control" name="prefix">
                  <div style="color: red">{{ $errors->first('prefix') }}</div>
                </div>
                <div class="form-group">
                    <input type="submit" value="save" name="save"/>
                </div>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection