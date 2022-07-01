
<div class="row">
    @if($accCostCenter)
        <div class="col-md-4">
            <strong>Sector: {{ $accCostCenter->name }}</strong>
        </div>
    @endif
    @if($start_date)
        <div class="col-md-4">
            <strong>Start Date: {{ $start_date }}</strong>
        </div>
    @endif
    @if($end_date)
        <div class="col-md-4">
            <strong>End Date: {{ $end_date }}</strong>
        </div>
    @endif
</div>


<div id="accordion">
    @foreach($ledgers as $ledger)
            <div class="card my-3">
                <div class="card-header" id="headingOne_{{$ledger->id}}">
                <h5 class="mb-0">
                    <button class="btn btn-link w-100" data-toggle="collapse" data-target="#collapseOne_{{$ledger->id}}" aria-expanded="true" aria-controls="collapseOne_{{$ledger->id}}">
                        <div class="row">
                            <div class="col-md-3 text-left">
                                <h4>Title: {{$ledger->name}}</h4>
                            </div>
                        </div>
                    </button>
                </h5>
                </div>

                <div id="collapseOne_{{$ledger->id}}" class="collapse" aria-labelledby="headingOne_{{$ledger->id}}" data-parent="#accordion">
                <div class="card-body">
                    <hr>
                        <div class="row">
                            <div class="col-md-4 text-left">
                                Opening Balance: 
                                    @php 
                                        $balance = 0;
                                        $db_credit_start="Debit";
                                        $debit=0;  
                                        $credit=0; 
                                        $entry_items=$ledger->entryItems;
                                        if($start_date){
                                            $current_ids = $accEntries->where('date','<',$start_date)->pluck('id')->toArray();

                                            $entry_items=$ledger->entryItems->whereIn('entry_id',$current_ids);

                                            $debit=   $ledger->entryItems->whereIn('entry_id',$current_ids)->where('dc','D')->sum('amount');
                                            $credit = $ledger->entryItems->whereIn('entry_id',$current_ids)->where('dc','C')->sum('amount');
                                        }
                                        if($debit > 0){
                                            $balance = $debit - $credit ;
                                        }
                                        if($debit < 0){
                                            $db_credit_start="Credit";
                                            $balance = $credit - $debit;
                                        }
                                    @endphp
                                {{ $balance }} ({{$db_credit_start}})
                            </div>
                            <div class="col-md-4 text-left">
                                Closing Balance: 
                                    @php 
                                        $closing_balance = 0;
                                        $db_credit_close="Debit";                                            
                                        $closing_debit=0;
                                        $closing_credit=0;
                                        if($end_date){
                                            $current_ids = $accEntries->where('date','<',$end_date)->pluck('id')->toArray();

                                            $closing_debit= $ledger->entryItems->whereIn('entry_id',$current_ids)->where('dc','D')->sum('amount');
                                            $closing_credit = $ledger->entryItems->whereIn('entry_id',$current_ids)->where('dc','C')->sum('amount');
                                        }else{
                                            $closing_debit= $ledger->entryItems->where('dc','D')->sum('amount');
                                            $closing_credit = $ledger->entryItems->where('dc','C')->sum('amount');

                                        }

                                        if($closing_debit > $closing_credit){
                                            $db_credit_close="Debit";
                                            $closing_balance = $closing_debit - $closing_credit ;
                                        }
                                        if($closing_debit < $closing_credit){
                                            $db_credit_close="Credit";
                                            $closing_balance = $closing_credit - $closing_debit;
                                        }
                                    @endphp
                                    {{ $closing_balance }} ({{$db_credit_close}})
                            </div>
                            <div class="col-md-4 text-left">
                                Budget Balance: {{$ledger->budget}}
                            </div>
                        </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>No.</th>
                                    <th>Ledger Name</th>
                                    <th>Cheque #</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Balance</th>
                                    <th>Sector</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr-balance">
                                    <th colspan="4">Opening Balance</th>
                                    <td>
                                        {{ $debit }} 
                                    </td>
                                    <td>
                                        {{ $credit }} 
                                    </td>
                                    <td >
                                        {{ $balance }} ({{$db_credit_start}})
                                    </td>
                                    <td >
                                    </td>
                                </tr>
                                @foreach($ledger->entryItems as $entryItem )
                                    <tr >
                                        <td>{{  $entryItem->entry->date ?? "" }}</td>
                                        <td>{{  $entryItem->entry->number ?? "" }}</td>
                                        <td>{{  $entryItem->ledger->name ?? "" }}</td>
                                        <td>{{  $entryItem->ledger->cheque_no ?? "" }}</td>
                                        <td>
                                            @if($entryItem->dc == "D")
                                                {{  $entryItem->amount }}
                                                @php $debit=$debit+$entryItem->amount  @endphp
                                                
                                            @endif
                                        </td>
                                        <td>
                                            @if($entryItem->dc == "C")
                                                {{  $entryItem->amount }}
                                                @php $credit=$credit+$entryItem->amount  @endphp

                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                if($debit > $credit){
                                                    $db_credit_start="Debit";
                                                    $balance = $debit - $credit ;
                                                }
                                                if($debit < $credit){
                                                    $db_credit_start="Credit";
                                                    $balance = $credit - $debit;
                                                }
                                            @endphp
                                            {{$balance}} ({{$db_credit_start}})
                                        </td>
                                        <td>{{$entryItem->entry->costCenter->name}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="tr-balance">
                                    <th colspan="4">Opening Balance</th>
                                    <td>
                                        {{$closing_debit}}
                                    </td>
                                    <td>
                                        {{ $closing_credit }} 
                                    </td>
                                    <td >
                                        {{ $closing_balance }} ({{$db_credit_close}})
                                    </td>
                                    <td >
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                </div>
                </div>
            </div>
    @endforeach
</div>
