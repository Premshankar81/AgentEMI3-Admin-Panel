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
              <div class="navbar-custom-menu pull-right"> 
                    <a href="#" class="btn btn-flat btn-default" data-toggle="modal" data-target="#modal-daterange-reportsProfitnLoss">
                        <i class="fa fa-filter"></i>&nbsp;Add Filter
                    </a>
                    
                    <a href="{{route('admin.cashbook.index')}}" class="btn btn-flat btn-default">
                        <i class="fa fa-refresh"></i>&nbsp;Reset
                    </a>
                    
                </div>
                </h3>
            </div>
            
            

            <div class="box-body">
                
                
                
              <table id="dataTables_table_init" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Account No</th>
                    <th>Account Type</th>
                    <th>Customer Name</th>
                    <th>Customer code</th>
                    <th>Created By</th>
                    <th>Transation Date</th>
                    <th>Narration</th>
                    <th>Status</th>
                    <th>Received</th>
                    <th>Paid</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
                <tbody id="TableRecordList">
                   @foreach($rows as $index=>$row)
                     <?php 
                         $statusClass = 'danger';
                         if($row['status'] == 'active') { 
                            $statusClass = 'success'; 
                         } 
                         $Withdrawal = 0;
                         $deposit = 0;
                         if($row['type'] == 'withdrawal') { 
                            $Withdrawal = $row['amount']; 
                         } else{
                            $deposit = $row['amount'];
                         }
                    
                     ?>
                     <tr role="row">
                        
                        <?php if($row['tran_page_type'] == 'saving') { ?>
                            <td>{{@$row['saving']['account_no']}}</td>
                        <?php } else if($row['tran_page_type'] == 'loan') { ?>
                                <td>{{@$row['loan_account']['account_no']}}</td>
                        <?php } else if($row['tran_page_type'] == 'fixedDeposit') { ?>
                                <td>{{@$row['fd_account']['account_no']}}</td>
                        <?php } else if($row['tran_page_type'] == 'recurring') { ?>
                                <td>{{@$row['rd_account']['account_no']}}</td>
                        <?php }else{  ?>
                                <td>-</td>
                        <?php } ?>
                        
                        <td>{{@$row['tran_page_type']}}</td>
                        <td>{{@$row['customer']['name']}}</td>
                        <td>{{@$row['customer']['customer_code']}}</td>
                        <td>{{@$row['createdBy']['name']}}</td>
                        <td>{{Helper::getFromDate($row['transation_date'])}}</td>
                        <td>{{$row['remarks']}}</td>
                        <td><?= ucfirst($row['status']) ?></td>
                        <td>{{$deposit}}</td>
                        <td>{{$Withdrawal}}</td>
                        
                            <td>
                                 <a class="btn btn-default btn-xs" title="Print receipt" href="{{route('admin.businessLoan.receipt',array('id' => $row['id']))}}"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;Receipt</a>
                                @if(Auth::guard('admin')->user()->user_type == 'admin')         
                                    <button type="button" class="btn btn-danger btn-sm" onClick="transation_delete_row({{$row['id']}})"><i class="fa fa-trash"></i></button>
                                @endif
                        </td>
                    </tr>
                    
                    @endforeach
                    
                    
                   
        <?php
        
    
        $total_debit_amount = 0;
        $total_credit_amount = 0;
        ?>
        @foreach($TrialBalanaces as $key=>$TrialBalanace)
      
        <?php
        
            $debit_amount = '';
            $credit_amount = '';
            $Narration = '';
            
            if($TrialBalanace->transaction_type == 'debit'){
                $debit_amount = $TrialBalanace->ledger_account_amount;
                $Narration = "By".$TrialBalanace->DebitledgerAccount->title;
                $total_debit_amount = $debit_amount;
            }
            if($TrialBalanace->transaction_type == 'credit'){
                $credit_amount = $TrialBalanace->ledger_account_amount;
                $Narration = "To ".$TrialBalanace->CreditledgerAccount->title;
                $total_credit_amount = $credit_amount;
            }
        ?>
    
      <tr>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>{{@$TrialBalanace['createdBy']['name']}}</td>
        
         
         <td>{{Helper::getFromDate($TrialBalanace['voucher']['voucher_date'])}} 11</td>
        <td>{{$Narration}}</td>
        <td>Completed</td>
        <td width="10%">{{$credit_amount}}</td>
        <td width="10%">{{$debit_amount}}</td>
      </tr>
      
    @endforeach
                    
                    
                    
                </tbody>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    