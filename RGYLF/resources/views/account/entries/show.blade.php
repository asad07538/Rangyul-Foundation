@extends('admin_layout.app', ['title' => 'Entries'])

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Entries</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Entries</li>
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
            <form action="{{ route('account_entry.destroy',$accEntry->id) }}" method="post"> 
                @csrf
                @method('DELETE')
                <a  class="btn btn-info btn-sm"><i class="fa fa-print"></i></a>
                <a  class="btn btn-info btn-sm"><i class="fa fa-download"></i></a>
                <!-- <a href="{{ route('account_entry.edit',$accEntry->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a> -->
                <!-- <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> -->
            </form>
        </div>
        <div class="table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>{{$accEntry->date}}</th>
                        <th>Number</th>
                        <th>{{$accEntry->number}}</th>
                        <th>Type</th>
                        <th>{{$accEntry->entryType->name ?? ""}}</th>
                        <th>Financial Year</th>
                        <th>{{$accEntry->financialYear->name ?? ""}}</th>
                    </tr>
                    <tr>
                        <th>Dr Total</th>
                        <th>{{$accEntry->dr_total}}</th>
                        <th>Cr Total</th>
                        <th>{{$accEntry->cr_total}}</th>
                        <th>Sector</th>
                        <th>{{$accEntry->costCenter->name ?? ""}}</th>
                        <th>Added By</th>
                        <th>{{$accEntry->user->name  ?? ""}}</th>
                    </tr>
                </thead>
            </table>
        </div>

        
        <div class="table-responsive card mb-5 ">
            <table class="table ">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Account Head</th>
                            <th>Debit</th>
                            <th>Credit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($accEntry->entryItems->sortByDesc('dc') as $key => $entryItem)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$entryItem->ledger->name}}</td>
                                <td>@if($entryItem->dc == "D"){{$entryItem->amount}} @endif</td>
                                <td>@if($entryItem->dc == "C"){{$entryItem->amount}} @endif</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">
                                Total
                            </th>
                            <th>
                                {{$accEntry->entryItems->where('dc','D')->sum('amount')}}
                            </th>
                            <th>
                                {{$accEntry->entryItems->where('dc','C')->sum('amount')}}
                            </th>
                        </tr>
                    </tfoot>
            </table>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection