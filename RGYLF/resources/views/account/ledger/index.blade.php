@extends('admin_layout.app', ['title' => 'Ledgers'])

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ledgers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Ledgers</li>
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
            <a href="{{ route('account_ledger.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus">Add New</i></a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Group</th>
                        <th>Acc Code</th>
                        <th>Name</th>
                        <th>Opening Balance</th>
                        <th>Opening Balance DC</th>
                        <th>Is Bank Cash</th>
                        <th>Budget</th>
                        <th>Financial Year</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($accLedgers as $key => $accLedger)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$accLedger->accountGroup->name}}</td>
                    <td>{{$accLedger->acc_code}}</td>
                    <td>{{$accLedger->name}}</td>
                    <td>{{$accLedger->op_balance}}</td>
                    <td>{{$accLedger->op_balance_dc}}</td>
                    <td>{{$accLedger->is_bank_cash}}</td>
                    <td>{{$accLedger->budget}}</td>
                    <td>{{$accLedger->financialYear->name}}</td>
                    <td>
                      <form action="{{ route('account_ledger.destroy',$accLedger->id) }}" method="post"> 
                        @csrf
                        @method('DELETE')
                          <a href="{{ route('account_ledger.show',$accLedger->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                          <a href="{{ route('account_ledger.edit',$accLedger->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
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