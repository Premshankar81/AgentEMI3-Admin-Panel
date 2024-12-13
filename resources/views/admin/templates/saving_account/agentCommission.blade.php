<section class="content-header">
      <h1>
          Agent Commission detail
          <a href="javaScript::void(0)" class="btn btn-flat btn-default"><i class="fa fa-plus-circle"></i>&nbsp; Calculate Commission</a>
      </h1>
      <ol class="breadcrumb">
          <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="{{route('admin.saving_account.manage',array('id' => $row['uuid']))}}">Saving Account -{{$row->account_no}}</a></li>
          <li class="active">Agent Commission detail</li>
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
                  <th>Agent Name</th>
                  <th>Collection Date</th>
                  <th>EMI Sr No</th>
                  <th>Name.</th>
                  <th>Amount</th>
                  <th>Commission</th>
                  <th>Commission Rate</th>
                  <th>Commission Calculation Date</th>
                  <th>PayOut Type</th>
                  <th>Introducer Agent</th>
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

  