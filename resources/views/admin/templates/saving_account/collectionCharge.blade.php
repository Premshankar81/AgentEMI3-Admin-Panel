<section class="content-header">
      <h1>Collection Charge detail</h1>
      <ol class="breadcrumb">
          <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
           <li><a href="{{route('admin.saving_account.manage',array('id' => $row['uuid']))}}">Saving Account -{{$row->account_no}}</a></li>
          <li class="active">Collection Charge detail</li>
      </ol>
  </section>
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
                <th>Collector Name</th>
                <th>Code</th>
                <th>Collection Date</th>
                <th>Name.</th>
                <th>Amount</th>
                <th>Collection Charge Rate</th>
                <th>Collection Charge</th>
                <th>Collection Charge Calculation Date</th>
                <th>PayOut Type</th>
                <th>Paid Status</th>
              </tr>
            </thead>
            <tbody id="TableRecordList1">
               

            </tbody>
            
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

