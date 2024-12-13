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

                <a class="float-right btn btn-warning " href="{{route('admin.ledger.export')}}"><i
                   class="mdi mdi-file-export "></i> Export</a>  
                  <button type="button" class="margin-r-10 float-right btn btn-primary " data-toggle="modal" data-target="#add_row_modal"><i
                   class="las la-plus-circle "></i> Add New</button> 
              </h3>
            </div>

            <div class="box-body">
              <table id="dataTables_table_init" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Ledger Group</th>
                    <th>O-Balanace</th>
                    <th>C-Balanace</th>
                    <th>Type</th>
                    <th>Trans Type</th>
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

    