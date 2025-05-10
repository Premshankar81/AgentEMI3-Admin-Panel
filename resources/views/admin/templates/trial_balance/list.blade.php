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
               <form id="add_form" method="get" action="{{route('admin.trial_balance.search')}}" >
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
                        </div>
                    </div>
                    
                    <div class="col-lg-2 margin-t-20">
                        <br>
                        <div class="mb-3" style="margin-top: 6px;">
                            <label for="title" class="form-label"><br></label>
                            <a class="margin-r-10 float-right btn btn-info " href="{{route('admin.trial_balance.index')}}"><i
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
    
    
    
    <section class="invoice">
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Trial balance <small class="pull-right">Date: <?php echo date('d-m-Y') ?></small>
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
			<span style="text-align:center;font-size:small;">E: shreepandurangnidhi@gmail.com M: 8805208504 CIN: U65990MH2021PLN371663</span></td>
              </address>
            </div>
            
          </div>
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Ledger Name</th>
                    <th>Credit</th>
                    <th>Debit</th>
                    
                  </tr>
                </thead>
                <tbody>
                    <?php
                        $total_debit_amount = 0;
                        $total_credit_amount = 0;
                    ?>
                  @foreach($Ledgers_TrialBalanaces as $key=>$TrialBalanace)
                  <?php
                    
                    $debit_amount = '';
                    $credit_amount = '';

                    if($TrialBalanace->ledger_transaction_type == 'credit'){
                        $credit_amount = $TrialBalanace->opening_balanace;    
                        $total_credit_amount +=  $TrialBalanace->opening_balanace;      
                    }else{
                        $debit_amount = $TrialBalanace->opening_balanace;      
                        $total_debit_amount +=  $TrialBalanace->opening_balanace;      
                    }
                  ?>
                  <tr>
                    <td><a href="{{route('admin.ledger_view.index')}}?ledger_id={{$TrialBalanace->id}}&start_date=&end_date=&search=filter"> {{$TrialBalanace->title}}</a></td>
                    <td width="10%">{{$credit_amount}}</td>
                    <td width="10%">{{$debit_amount}}</td>
                  </tr>
                  
                 @endforeach
                 
                 <tr>
                    <td><b>Total</b></td>
                    <td width="10%"><b>{{$total_credit_amount}}</b></td>
                    <td width="10%"><b>{{$total_debit_amount}}</b></td>
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
        
        <div class="clearfix"></div>

    