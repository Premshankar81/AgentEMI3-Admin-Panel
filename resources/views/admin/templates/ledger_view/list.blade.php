<style>
        .invoice {
            position: relative;
            background: #fff;
            border: 1px solid #f4f4f4;
            padding: 20px;
            margin: 0px 17px;
    }
    
    .content {
     min-height: 0px;
    }
    </style>
<section class="content-header">
      <h1> Dashboard <small>{{$data['page_title']}}</small>
      </h1>
      <ol class="breadcrumb">
        <li>
          <a href="#">
            <i class="fa fa-dashboard"></i> Home </a>
        </li>
        <li>
          <a href="#">Dashboard</a>
        </li>
        <li class="active">{{$data['page_title']}}</li>
      </ol>
    </section>
    <style type="text/css">
    
    </style>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header" style="width:100%">
              <h3 class="box-title">{{$data['page_title']}} List 

                <!--<a class="float-right btn btn-warning " href="{{route('admin.city.export')}}"><i
                   class="mdi mdi-file-export "></i> Export</a>  -->
                  
              </h3>
            </div>

            <div class="box-body">
               <form id="add_form" method="get" action="{{route('admin.ledger_view.search')}}" >
                <div class="row">
                   
                    <div class="col-lg-3">
                        <div class="mb-3">
                              <label for="ledger_id" class="form-label">Ledger</label>
                              <select id="ledger_id" name="ledger_id" class="form-control">
                                <option value="">Select Ledger </option>
                                @foreach($ledgers as $key => $ledger)
                                  <option <?php if(isset($_GET['ledger_id'])) { if($_GET['ledger_id'] == $ledger['id']) { echo "selected"; } } ?>  data-closing_balance="{{$ledger['closing_balance']}}" value="{{$ledger['id']}}">{{$ledger['title']}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
        
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="title" class="form-label">Start Date</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" value="<?php if(isset($_GET['start_date']) AND $_GET['start_date'] != ''){ echo $_GET['start_date']; } ?>"/>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="title" class="form-label">End Date</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" value="<?php if(isset($_GET['end_date']) AND $_GET['end_date'] != ''){ echo $_GET['end_date']; } ?>"/>
                            <input type="hidden" id="search" name="search" class="form-control" value="filter" />
                            
                        </div>
                    </div>
                    
                    <div class="col-lg-2 margin-t-20">
                        <br>
                        <div class="mb-3" style="margin-top: 6px;">
                            <label for="title" class="form-label"><br></label>
                            <a class="margin-r-10 float-right btn btn-info " href="{{route('admin.ledger_view.index')}}"><i
                   class="mdi mdi-file-export "></i> Reset</a> 
                   
                            <button type="submit" class="margin-r-10 float-right btn btn-primary " data-toggle="modal" data-target="#add_row_modal"><i
                           class="las la-plus-circle "></i> Search </button> 
                           
                            
                   
                           
                   </div>
                    </div>
        
                </div>
                <br>
                </form>
                
            </div>
          </div>
          
        </div>
      </div>
      
    </section>
    
    
    <?php if(isset($_GET['search']) AND $_GET['search'] == 'filter') { ?>
    <section class="invoice">
       
        <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> {{$data['page_title']}} <small class="pull-right">Date: <?php echo date('d-m-Y') ?></small>
              </h2>
            </div>
        </div>

        <div class="row invoice-info">
            <div class="col-sm-2 invoice-col">
                <img class="img-responsive" src="https://nidhiexpert.com/AppImages/Logo/acc27fe1-a8cb-42ae-8297-4b3e00d39e48.png">
            </div>
            <div class="col-sm-10 invoice-col text-center">  
            
            <address>
            
            <td style="text-align:center;"><span style="text-align:center;font-size:40px;font-weight:bold;">{{Auth::guard('admin')->user()->name}}</span><br>
    		<span style="text-align:center;color:gray;font-size:small;font-family:'Arial Unicode MS'"></span><br>
    		<span style="text-align:center;font-size:small;">MAHARANA PRATAP CHOUK NANDED &nbsp;maharana pratap chouk ,nanded NANDED -431401 Maharashtra</span><br>
    	    <span style="text-align:center;font-size:small;">E: shreepandurangnidhi@gmail.com M: 8805208504 CIN: U65990MH2021PLN371663</span>
            </td>

            </address>

            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <p style="font-family: Calibri;text-align:center;font-size: 18px;border-top: 2px solid #3c8dbc;">
                    <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('statement','accounts','03023e76-c7c6-49d6-84f7-020ec49ccd5d');"> <br>
                        <strong>{{$ledger_signle->title}} Statement</strong>
                    </a>
                </p>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Ledger Name</th>
                    <th>Credit</th>
                    <th>Debit</th>
                    <th>Balance</th>
                    
                  </tr>
                </thead>
                
                 <?php
                    $debit_ob = '';
                    $credit_oa = '';


                    if($ledger_signle->ledger_transaction_type == 'credit'){
                        $credit_oa = $ledger_signle->opening_balanace;    
                    }else{
                        $debit_ob = $ledger_signle->opening_balanace;      
                    }
                  ?>
                <tbody>
                 <tr>
                    <td><b>Opening Balance </b></td>
                    <td width="10%"><b>{{$credit_oa}}</b></td>
                    <td width="10%"><b>{{$debit_ob}}</b></td>
                    <td width="10%"><b></b></td>
                  </tr>
                    
                    <?php
                        $total_debit_amount = 0;
                        $total_credit_amount = 0;
                        $opening_balance = $ledger_signle->opening_balanace;      
                    ?>
                  @foreach($TrialBalanaces as $key=>$TrialBalanace)
                  
                  <?php
                    
                        if($TrialBalanace->debit_ledger_account_id == $TrialBalanace->credit_ledger_account_id){ continue; }
                        
                        $debit_amount = '';
                        $credit_amount = '';
                        $Narration = '';
                        
                        if($ledger_signle->id != $TrialBalanace->debit_ledger_account_id){
                            $debit_amount = $TrialBalanace->ledger_account_amount;
                            $Narration = "By".$TrialBalanace->DebitledgerAccount->title;
                            $total_debit_amount += $debit_amount;
                            $opening_balance = $opening_balance + $debit_amount;

                        }
                        if($ledger_signle->id != $TrialBalanace->credit_ledger_account_id){
                            $credit_amount = $TrialBalanace->ledger_account_amount;
                            $Narration = "To ".$TrialBalanace->CreditledgerAccount->title;
                            $total_credit_amount += $credit_amount;
                            $opening_balance = $opening_balance - $credit_amount;
                        }

                  ?>

                  <tr>
                    <td>{{$Narration}}</td>
                    <td width="10%">{{$credit_amount}}</td>
                    <td width="10%">{{$debit_amount}}</td>
                    <td width="10%">{{$opening_balance}}</td>
                  </tr>
                  
                 @endforeach
                 
                 <tr>
                    <td><b>Total</b></td>
                    <td width="10%"><b>{{$total_credit_amount}}</b></td>
                    <td width="10%"><b>{{$total_debit_amount}}</b></td>
                    <td width="10%"><b></b></td>
                  </tr>
                 
                 
                </tbody>
              </table>
            </div>
          </div>
         
          <div class="row no-print">
            <div class="col-xs-12">
              <!--<a href="invoice-print.html" target="_blank" class="btn btn-default">
                <i class="fa fa-print"></i> Print </a>-->

            </div>
          </div>
        </section>
        
        <?php } ?>
        
        <div class="clearfix"></div>

    