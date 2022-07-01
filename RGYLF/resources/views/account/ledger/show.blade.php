@extends('admin_layout.app', ['title' => 'Ledgers'])

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ledger: {{$accLedger->name}}</h1>
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
        <div class="text-right py-2">
          <form action="{{ route('account_ledger.destroy',$accLedger->id) }}" method="post"> 
            @csrf
            @method('DELETE')
              <a href="{{ route('account_ledger.edit',$accLedger->id) }}" class="btn btn-info btn-sm"><i class="fa fa-download"></i></a>
              <a href="{{ route('account_ledger.edit',$accLedger->id) }}" class="btn btn-info btn-sm"><i class="fa fa-print"></i></a>
              <a href="{{ route('account_ledger.edit',$accLedger->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
              <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
          </form>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Group</th>
                        <td>{{$accLedger->accountGroup->name}}</td>
                        <th>Acc Code</th>
                        <td>{{$accLedger->acc_code}}</td>
                        <th>Opening Balance</th>
                        <td>{{$accLedger->op_balance}}</td>
                      </tr>
                      <tr>
                        <th>Opening Balance DC</th>
                        <td>{{$accLedger->op_balance_dc}}</td>
                        <th>Is Bank Cash</th>
                        <td>{{$accLedger->is_bank_cash}}</td>
                        <th>Budget</th>
                        <td>{{$accLedger->budget}}</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Account Head</th>
                            <th>Date</th>
                            <th>Narration</th>
                            <th>Debit</th>
                            <th>Credit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($accLedger->entryItems as $key => $entryItem)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$entryItem->ledger->name}}</td>
                                <td>{{$entryItem->entry->date}}</td>
                                <td>{{$entryItem->entry->narration}}</td>
                                <td>@if($entryItem->dc == "D"){{$entryItem->amount}} @endif</td>
                                <td>@if($entryItem->dc == "C"){{$entryItem->amount}} @endif</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">
                                Total
                            </th>
                            <th>
                                {{$accLedger->entryItems->where('dc','D')->sum('amount')}}
                            </th>
                            <th>
                                {{$accLedger->entryItems->where('dc','C')->sum('amount')}}
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4">
                              <strong>
                                Balance
                              </strong>
                            </th>
                            <th>
                              @if($accLedger->entryItems->where('dc','D')->sum('amount') > $accLedger->entryItems->where('dc','C')->sum('amount'))
                              <strong>
                                {{$accLedger->entryItems->where('dc','D')->sum('amount') - $accLedger->entryItems->where('dc','C')->sum('amount')}}
                              </strong>
                              @endif
                            </th>
                            <th>
                              @if($accLedger->entryItems->where('dc','D')->sum('amount') < $accLedger->entryItems->where('dc','C')->sum('amount'))
                              <strong>
                                {{$accLedger->entryItems->where('dc','C')->sum('amount') - $accLedger->entryItems->where('dc','D')->sum('amount')}}
                              </strong>
                              @endif
                            </th>
                        </tr>
                    </tfoot>
            </table>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection