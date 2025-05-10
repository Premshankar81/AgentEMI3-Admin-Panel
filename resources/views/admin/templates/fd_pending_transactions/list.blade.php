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
                    <th>Deposit</th>
                    <th>Withdraw</th>
                    <th>Payment Mode</th>
                    <th>Ledget Account</th>
                    <th>Status</th>
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

    