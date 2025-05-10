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
                    <a href="#" class="btn btn-flat btn-default" data-toggle="modal" data-target="#modal-daterange-CollectionAccountWise">
                        <i class="fa fa-filter"></i>&nbsp;Add Filter
                    </a>
                    
                    <a href="{{route('admin.CollectionAccountWise.index')}}" class="btn btn-flat btn-default">
                        <i class="fa fa-refresh"></i>&nbsp;Reset
                    </a>
                    
                </div>
                </h3>
            </div>
            
            

            <div class="box-body">
                
                
                
              <table id="dataTables_table_init" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    
                    <th>Account Type</th>
                    <th>Aount</th>
                    <th>Action</th>
                    
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
                        
                        <td>{{@$transation_name}}</td>
                        <td>{{@$row['total_amount']}}</td>
                        
                        <td>
                             <a class="btn btn-default btn-xs" title="Print receipt" href="{{route('admin.CollectionActWiseTran.index',array('tran_type' => $row['tran_page_type']))}}"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;Transation Details</a>
                        </td>
                    </tr>
                    
                    @endforeach
                    
                    
                    
                    
                </tbody>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    