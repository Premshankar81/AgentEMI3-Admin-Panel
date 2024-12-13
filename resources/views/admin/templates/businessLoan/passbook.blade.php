<section class="content-header">
<h1>
    Passbook Printing
</h1>
<ol class="breadcrumb">
    <li><a href="\Home\Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="\SavingAccount\Manage\da7e3208-1d73-4929-8308-c9ea92639004">Saving Account</a></li>            
    <li class="active">Transactions</li>
</ol>
</section>

<section class="content padding-top-0">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header">
                        <div class="pull-left">
                            <a class="btn btn-default" href="{{route('admin.businessLoan.passbook-fol1',array('id' => $row['uuid']))}}">
                                <i class="fa fa-print"></i> Print Main Page (Fold-1)
                            </a>
                            <a class="btn btn-default" href="{{route('admin.businessLoan.passbook-fol2',array('id' => $row['uuid']))}}">
                                <i class="fa fa-print"></i> Print Main Page (Fold-2)
                            </a>
                            
                            <a class="btn btn-warning" href="#" onclick="printpassbook('da7e3208-1d73-4929-8308-c9ea92639004');">
                                <i class="fa fa-print"></i> Print Detail Page
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-header with-100p dataTable no-footer" id="table1">
                                <thead style="background-color:#3c8dbc;color:#fff;">
                                    <tr>
                                        <th style="background-color:gray;font-weight:bold;text-align:center;">
                                            Sr No
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Narration
                                        </th>
                                        <th>
                                            Mode
                                        </th>
                                        <th class="text-right">
                                            Withdrawl
                                        </th>
                                        <th class="text-right">
                                            Deposit
                                        </th>
                                        <th class="text-center">
                                            Balance
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $Balance = 0;
                                    ?>
                                    @foreach($statements as $key=>$statement)
                                    
                                   <?php
                                        $CreaditAmount = 0;
                                        $DebitAmount = 0;
                                        
                                        if($statement['transation_type'] == 'credit'){
                                            $CreaditAmount = $statement['amount'];
                                            $Balance =  $Balance + $CreaditAmount;
                                        }
                                        if($statement['transation_type'] == 'debit'){
                                            $DebitAmount = $statement['amount'];
                                            $Balance = $Balance - $DebitAmount;
                                        }
                                        if($key == 0){
                                            $Balance = $statement['amount'];
                                        }
                                        ?>
                     
                                        <tr>
                                            <td style="background-color:gray;font-weight:bold;text-align:center;">
                                                {{$key+1}}
                                            </td>
                                            <td>{{Helper::getFromDate($statement['transation_date'])}}</td>
                                            <td style="text-align:left;">{{$statement['remarks']}}</td>
                                            <td><?= str_replace('_',' ',ucfirst($statement['payment_mode'])) ?></td>

                                            <td style="text-align:right;">{{$DebitAmount}}</td>
                                            <td style="text-align:right;">{{$CreaditAmount}}</td>
                                            
                                            <td style="text-align:right;">{{$Balance}}</td>
                                        </tr>
                                        @endforeach
                                       
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section>