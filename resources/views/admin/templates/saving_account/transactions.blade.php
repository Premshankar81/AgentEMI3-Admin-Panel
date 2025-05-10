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
              </h3>
            </div>

            <div class="box-body">
              <table id="dataTables_table_init" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Payment Type</th>
                    <th>Narration</th>
                    <th>Account No</th>
                    <th>Name.</th>
                    <th>Transation Date</th>
                    <th>Deposit</th>
                    <th>Withdraw</th>
                    <th>Payment Mode</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="TableRecordList1">
                   @foreach($transations as $index=>$row)
                     <?php 
                         $statusClass = 'danger';
                         if($row['status'] == 'completed') { 
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
                        <td>{{@$row['remarks']}}</td>
                        <td>{{@$row['account']['account_no']}}</td>
                        <td>{{@$row['customer']['name']}}</td>
                        <td>{{Helper::getFromDate($row['transation_date'])}}</td>
                        <td>{{$deposit}}</td>
                        <td>{{$Withdrawal}}</td>
                        <td><?= ucfirst($row['payment_mode']) ?></td>
                        <td>
                           <small class="label label-{{$statusClass}}"><?= ucfirst($row['status']) ?></small>
                        </td>
                    
                        <td width="10%">
                            <div class="d-flex gap-2">
                                <div class="edit">
                                   <a class="btn btn-default btn-xs" title="Print receipt" href="{{route('admin.saving_account.receipt',array('id' => $row['id']))}}"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;Receipt</a>
                                   @if(Auth::guard('admin')->user()->user_type == 'admin')
                                   <button type="button" class="btn btn-danger btn-sm" onClick="transation_delete_row({{$row['id']}})"><i class="fa fa-trash"></i></button>
                                   @endif 
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

    