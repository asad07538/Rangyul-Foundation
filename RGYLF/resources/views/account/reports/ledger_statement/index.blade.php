@extends('admin_layout.app', ['title' => 'Entries'])

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ledger Statement</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Ledger Statement</li>
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
            <a href="{{ route('account_entry.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
        </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Select Ledgers</label>
                <select class="form-control" id="ledgers" name="ledgers[]" multiple rows="5">
                  @foreach($ledgers as $key => $ledger)
                    <option value="{{$ledger->id}}" >{{$ledger->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Start Date</label>
                  <input type="date" id="start_date" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label>End Date</label>
                  <input type="date" id="end_date" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label>Select Sector</label>
                  <select class="form-control" id="cost_center" >
                    <option value="0" >ALL</option>
                    @foreach($accCostCenters as $key => $accCostCenter)
                      <option value="{{$accCostCenter->id}}" >{{$accCostCenter->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <br>
                  <input type="button" onclick="getLedgerStatement()" class="btn btn-primary" value="Generate">
                </div>
              </div>
            </div>
          </div>

        <div class="card m-3 p-3" id="ledgerstatement_report">


        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<script>
    function getLedgerStatement(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajax({
          url: '\account_ledger_statement',
          method: 'post',
          data: {
              ledgers: $("#ledgers").val(),
              start_date: $("#start_date").val(),
              end_date: $("#end_date").val(),
              cost_center: $("#cost_center").val(),
          },
          success: function(result){
              console.log(result);
              $("#ledgerstatement_report").html(result);
          }}
          );
      }
        

</script>
@endsection