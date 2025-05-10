<section class="content-header">
      <h1> {{$data['page_title']}}
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
              <h3 class="box-title">{{$data['page_title']}} List </h3>
            </div>

            <div class="box-body">
              <table id="dataTables_table_init" class="table table-bordered table-striped">
                <thead>
                  <tr>
                     <th>Application No</th>
                    <th>Application Date</th>
                    <th>Customer Code</th>
                    <th>Customer Name</th>
                    <th>Loan Request</th>
                    <th>Scheme Name</th>
                    <th>Associate</th>
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

    