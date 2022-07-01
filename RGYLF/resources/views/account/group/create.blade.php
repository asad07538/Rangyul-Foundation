@extends('admin_layout.app', ['title' => 'Group'])

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">New Group</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Group</li>
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


        <form method="POST" action="{{ route('account_group.store') }}">
            @csrf
            <input type="hidden" name="fy_id" value="{{$fyear->id}}">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="name">
              <div style="color: red">{{ $errors->first('name') }}</div>
            </div>
            <div class="form-group">
              <label>Group Code</label>
              <input type="text" class="form-control" name="group_code">
              <div style="color: red">{{ $errors->first('group_code') }}</div>
            </div>
            <div class="form-group">
              <label>Parent Id</label>
              <select class="form-control" name="parent_id">
                <option>Select Parent</parent>
                  @foreach($accGroups as $key => $accGroup)
                    <option value="{{$accGroup->id}}">{{$accGroup->name}}</parent>
                  @endforeach
              </select>
              <div style="color: red">{{ $errors->first('parent_id') }}</div>
            </div>
            <div class="form-control">
                <input type="submit" value="save" name="save"/>
            </div>
        </form>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection