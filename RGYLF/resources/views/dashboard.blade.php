@extends('admin_layout.app', ['title' => 'Dashboard'])

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
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
        <!-- Small boxes (Stat box) -->


        <div class="row justify-content-between">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$donations}}</h3>
                <p>Donations</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('fund_collection.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$disbursements}}</h3>
                <p>Donated</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('fund_disbursement.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$recoveries}}</h3>
                <p>Recoveries</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('fund_recovery.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$expenses}}</h3>

                <p>Expenses</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route('expense.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
        <div class="row bg-white  p-3">
          <div class="col-lg-6 col-md-4">
            {!! $no_of_donar_and_beneficiaries->render() !!}
          </div>
          <div class="col-lg-6 col-md-4 py-3">
              <h3>Donars and Beneficiaries</h3>
              <div class="table-responsive py-3">
                <table class="table  my-2">
                  <tr>
                    <th>Donars</th>
                    <td>{{$no_of_donar}}<td>
                  </tr>
                  <tr>
                    <th>Beneficiaries</th>
                    <td>{{$no_of_needy_ones}}<td>
                  </tr>
                </table>
            </div>
          </div>
        </div>
        <div class="row p-3">
          <div class="col-lg-6 col-md-4">
              <h3>Sector Credit and Debit</h3>
              <div class="table-responsive py-3">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th class="text-center">Sector</th>
                      <th class="text-center">Total Debit</th>
                      <th class="text-center">Total Credit</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($labels as $key => $label)
                        <tr>
                          <td class="text-center">{{$label}}</td>
                          <td class="text-center">{{$cr_values[$key]}}</td>
                          <td class="text-center">{{$dr_values[$key]}}</td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
            </div>
          </div>
          <div class="col-lg-6 col-md-4">
            {!! $creditDebitSectors->render() !!}
          </div>
        </div>
        <div class="row bg-white p-3">
          <div class="col-lg-6 col-md-4 py-3">
            {!! $male_female_beneficiaries->render() !!}
          </div>
          <div class="col-lg-6 col-md-4 py-3">
              <h3>Male and Female</h3>
              <div class="table-responsive py-3">
                <table class="table ">
                  <tr>
                    <th>Male</th>
                    <td>{{$males}}<td>
                  </tr>
                  <tr>
                    <th>Female</th>
                    <td>{{$females}}<td>
                  </tr>
                </table>
              </div>
          </div>
        </div>
        <!-- /.row -->


@endsection