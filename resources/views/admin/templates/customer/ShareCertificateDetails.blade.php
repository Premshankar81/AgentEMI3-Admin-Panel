
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

                   <a class="margin-r-10 float-right btn btn-primary " href="{{route('admin.transfer_share_certificates.create')}}"><i
                   class="mdi mdi-file-export "></i> Add Transfer Share</a>  

                   <a class="margin-r-10 float-right btn btn-primary " href="{{route('admin.allocate_share_certificates.create')}}"><i
                   class="mdi mdi-file-export "></i> Add Allocate Share</a>  

                   

              </h3>
            </div>


            <div class="box-body">
              <table id="dataTables_table_init" class="table table-bordered table-striped">
                <thead>
                  <tr>
                   <th>Date</th>
                    <th>Member Code</th>
                    <th>Promoter's Name</th>
                    <th>Lot Number</th>
                    <th>Share Range</th>
                    <th>Total Share</th>
                    <th>Face Value</th>
                    <th>Total Value</th>
                    <th>SH-1</th>
                    <th>Receipt</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($AllocatedShares as $index=>$row)
                   <tr role="row">
                      <td>{{Helper::getFromDate($row['created_at'])}}</td>
                      <td>{{$row['memberDetails']['customer_code']}}</td>
                      <td>{{$row['memberDetails']['name']}}</td>
                      <td>{{$row['lot_number']}}</td>
                      <td>{{$row['share_range']}}</td>
                      <td>{{$row['total_shares']}}</td>
                      <td>{{$row['share_nominal_value']}}</td>
                      <td>{{$row['total_shares_value']}}</td>
                      <td>
                          <a target="_blank" class="btn btn-default btn-xs" href="{{route('admin.customer.TransferShareCertificates',array('id' => $row['id']))}}"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;SH-1</a>
                      </td>
                      <td>
                          <a target="_blank" class="btn btn-default btn-xs" href="{{route('admin.customer.TransferShareReceipt',array('id' => $row['id']))}}"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;Receipt</a>
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

