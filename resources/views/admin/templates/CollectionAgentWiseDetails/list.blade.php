<section class="content-header">
      <h1> Dashboard <small>{{$data['page_title']}}</small>
      </h1>
      <ol class="breadcrumb">
        <li>
          <a href="{{route('admin.dashboard')}}">
            <i class="fa fa-dashboard"></i> Home </a>
        </li>
        <li>
          <a href="{{route('admin.dashboard')}}">Dashboard</a>
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
                    <!-- <a href="#" class="btn btn-flat btn-default" data-toggle="modal" data-target="#modal-daterange-CollectionAccountWise">
                        <i class="fa fa-filter"></i>&nbsp;Add Filter
                    </a> -->
                    
                   <!--  <a href="{{route('admin.CollectionAccountWise.index')}}" class="btn btn-flat btn-default">
                        <i class="fa fa-refresh"></i>&nbsp;Reset
                    </a> -->
                    
                </div>
                </h3>
            </div>
            
            

            <div class="box-body">
                
                
                
              <table id="dataTables_table_init" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Transation Date</th>
                    <th>Account No</th>
                    <th>Account Date</th>
                    <th>Customer Name</th>
                    <th>Account Type</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody id="TableRecordList">
                   @foreach($rows as $index=>$row)
                     <tr role="row">
                        
                        <?php 
                        $transation_name = '';
                        if($row['tran_page_type'] == 'saving') {
                            $transation_name = 'Saving Account';
                        } else if($row['tran_page_type'] == 'loan') {
                            $transation_name = 'Business Loan';
                         } else if($row['tran_page_type'] == 'fixedDeposit') {
                            $transation_name = 'Fixed Deposit Account';
                        } else if($row['tran_page_type'] == 'recurring') { 
                            $transation_name = 'Recurring Account';
                         }else{  
                            
                        } ?>

                        <?php if($row['tran_page_type'] == 'saving') { ?>
                                <td>{{Helper::getFromDate(@$row['saving']['application_date'])}}</td>
                                <td>{{@$row['saving']['account_no']}}</td>
                                
                        <?php } else if($row['tran_page_type'] == 'loan') { ?>
                                <td>{{Helper::getFromDate(@$row['loan_account']['application_date'])}}</td>
                                <td>{{@$row['loan_account']['account_no']}}</td>
                                
                        <?php } else if($row['tran_page_type'] == 'fixedDeposit') { ?>
                                <td>{{Helper::getFromDate(@$row['fd_account']['application_date'])}}</td>
                                <td>{{@$row['fd_account']['account_no']}}</td>
                                
                        <?php } else if($row['tran_page_type'] == 'recurring') { ?>
                                <td>{{Helper::getFromDate(@$row['rd_account']['application_date'])}}</td>
                                <td>{{@$row['rd_account']['account_no']}}</td>
                                
                        <?php }else{  ?>
                                <td>-</td>
                                <td>-</td>
                        <?php } ?>
                        <td>{{Helper::getFromDate($row['transation_date'])}}</td>
                         <td>{{@$row['customer']['name']}}</td>
                         <td>{{@$transation_name}}</td>
                        <td>{{@$row['amount']}}</td>
                        
                        
                    </tr>
                    
                    @endforeach
                    
                    
                    
                    
                </tbody>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    