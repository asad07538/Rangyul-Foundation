@extends('admin_layout.app', ['title' => 'Fund Disbursement'])

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">New Fund Disbursement</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Fund Disbursement</li>
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
        <form method="POST" action="{{ route('fund_disbursement.store') }}">
            @csrf
            <input type="hidden" name="entry_type" value="{{$accEntryType_id}}">
            <input type="hidden" name="fy_id" value="{{$fyear->id}}">
            <div class="row">
              <div class="col-md-4 p-2">
                <div class="card p-3">
                  <table width="100%">
                      <tbody>
                          <tr>
                              <td> Entry No :
                                  <input type="text" name="number" class="form-control "  readonly="" value="">
                              </td>
                          </tr>

                          <tr class="alt">
                              <td> Payment Head : <br>
                                  <select name="pay_ledger_id"  class="form-control chzn chzn-done"
                                      id="sel825">
                                      <option value="">(Please Select)</option>
                                      @foreach($accLedgers_from as $accLedger)
                                      <option value="{{$accLedger->id}}">{{$accLedger->acc_code }}({{$accLedger->name}})</option>
                                      @endforeach
                                  </select>
                              </td>
                          </tr>

                          <!-- <tr>
                              <td> Project : <br>
                                  <select name="project_id" id="project_id" onchange="getMeasurement(1)" required=""
                                       class="form-control  chzn hidden chzn-done">
                                      <option value="0">No. Project</option>
                                  </select>
                              </td>
                          </tr> -->


                          <tr class="alt" >
                              <td> Sector : <br>
                                  <select name="cost_center_id" required="" 
                                      class="form-control chzn hidden chzn-done" id="sel1DM">
                                      @foreach($accCostCenters as $key => $accCostCenter)
                                      <option value="{{$accCostCenter->id}}" @if($key==0) selected @endif>{{$accCostCenter->name}}</option>
                                      @endforeach
                                  </select>
                              </td>
                          </tr>

                          <tr>
                              <td> Entry Date :
                                  <input type="date" name="date" class="form-control "  required="" min="2022-01-01" max="2022-12-31"
                                      value="2022-06-10">
                              </td>
                          </tr>

                          <tr class="alt">
                              <td> Cheque No :
                                  <input type="text" name="cheque_no" class="form-control "  value="">
                              </td>
                          </tr>
                      </tbody>
                  </table>
                </div>              
              </div>
              <div class="col-md-8 p-2">
                <div class="card p-3">
                    <div id="tbl_ledg_wrapper">
                      <div  id="tbl_ledg">
                        <table width="100%">
                          <tbody>
                            <tr style="height:20px">
                                <th> Needy Person </th>
                                <th> Amount </th>
                                <th> </th>
                            </tr>
                            <tr class="alt">
                                <input type="hidden" name="entry_items_id[]" value="">
                                <td>
                                    <select name="ledger_id[]" id="ledger_id_1"  class="form-control  chzn hidden chzn-done">
                                        <option value="">(Please Select)</option>
                                        @foreach($needyPersons as $needyPerson)
                                          <option value="{{$needyPerson->ledger->id}}">{{$needyPerson->ledger->acc_code }}({{$needyPerson->ledger->name}})</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td> <input type="number" class="form-control " min="0.01" step="0.01" name="amount[]"> </td>
                                <td> </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="text-right py-2">
                      <a class="btn btn-primary" onclick="add_tbl_ledg()"><i class="fa fa-plus"></i></a>
                    </div>

                    <script>
                      function add_tbl_ledg(){
                        var p=$("#tbl_ledg").html();
                        $("#tbl_ledg_wrapper").append(p);
                      }
                    </script>
                    <table width="100%">
                      <tbody>
                          <tr>
                              <td> Narration :
                                  <textarea name="narration" class="form-control " style="width:100%; height:60px"></textarea>
                              </td>
                          </tr>
                      </tbody>
                  </table>
                </div>              
              </div>
            </div>

            <div class="form-group text-right ">
                <input type="submit" class="btn btn-primary px-3" value="save" name="save"/>
            </div>
        </form>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection