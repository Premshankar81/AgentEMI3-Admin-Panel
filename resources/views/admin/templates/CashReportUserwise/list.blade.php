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
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      
      <div class="box">
        <div class="box-header" style="width:100%">
          <h3 class="box-title">{{$data['page_title']}} List 
          <div class="navbar-custom-menu pull-right"> 
                <a href="#" class="btn btn-flat btn-default" data-toggle="modal" data-target="#modal-daterange-CollectionUserWise">
                    <i class="fa fa-filter"></i>&nbsp;Add Filter
                </a>
                <a href="{{route('admin.CashReportUserwise.index')}}" class="btn btn-flat btn-default">
                    <i class="fa fa-refresh"></i>&nbsp;Reset
                </a>
                
            </div>
            </h3>
        </div>
        <div class="box-body">
          <table id="dataTables_table_init" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>User Name</th>
                <th>Amount Deposit</th>
                <th>Amount Withdraw</th>
                <th>Cash in Hand</th>
                <th>Action</th>

                
              </tr>
            </thead>
            <tbody id="TableRecordList">
                
            </tbody>
            
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

