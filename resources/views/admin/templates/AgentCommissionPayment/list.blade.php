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

                  <button onclick="bulk_update_status(<?= $_REQUEST['agentId'] ?>)" type="button" class="margin-r-10 float-right btn btn-primary " data-toggle="modal" data-target="#add_row_modal"><i
                   class="las la-plus-circle "></i> Total Collection <i class="fa fa-inr"></i><?= $total_amount;  ?></button> 
              </h3>
            </div>


            <div class="box-body">
              <table id="dataTables_table_init" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Payment Type</th>
                    <th>Account No</th>
                    <th>Name.</th>
                    <th>Transation Date</th>
                    <th>Collection Amount</th>
                    <th>Payment Mode</th>
                   
                    <th>Collection Status</th>
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
                    <td width="10%">Saving </td>
                    <td>{{@$row['account']['account_no']}}</td>
                    <td>{{@$row['customer']['name']}}</td>
                    <td>{{Helper::getFromDate($row['transation_date'])}}</td>
                    <td>{{$deposit}}</td>
                    
                    <td><?= ucfirst($row['payment_mode']) ?></td>
                  
                    <td>
                       <small class="label label-{{$statusClass}}"><?= ucfirst($row['agent_payment_status']) ?></small>
                    </td>
                
                    <td>
                        <div class="d-flex gap-2">
                            <div class="edit">
                               
                                <button type="button" class="btn btn-success btn-sm" onClick="get_row({{$row['id']}})"><i class="fa fa-eye"></i></button>
                            </div>
                        </div>
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

    