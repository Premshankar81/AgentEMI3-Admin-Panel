
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

                   <a class="margin-r-10 float-right btn btn-primary " href="{{ route('admin.customer.MemberShipFee',array('id' => $row['customer_id']))}}"><i
                   class="mdi mdi-file-export "></i> Add New</a>  

              </h3>
            </div>

            <div class="box-body">
              <table id="dataTables_table_init" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Transaction Date</th>
                    <th>Amount</th>
                    <th>Payment Mode</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($Transations as $key => $statement): ?>
                    <tr>
                    <td width="5%">{{$key+1}}</td>
                    <td style="padding:5px;">{{Helper::getFromDate($statement['transation_date'])}} </td>
                    <td><?= number_format($statement['amount']) ?></td>
                    <td style="padding:5px;"><?= str_replace('_',' ',ucfirst($statement['payment_mode'])) ?></td>
                    <td>{{$statement['status']}}</td>
                    <td>  <button type="button" class="btn btn-danger btn-sm" onClick="delete_MemberShipFee_row({{$statement['id']}})"><i class="fa fa-trash"></i></button></td>

                </tr>

                  <?php endforeach ?>
                </tbody>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

