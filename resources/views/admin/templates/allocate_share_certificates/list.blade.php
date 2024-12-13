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

                  <a class="margin-r-10 float-right btn btn-primary " href="{{route('admin.allocate_share_certificates.create')}}"><i
                   class="mdi mdi-file-export "></i> Add New</a>  
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

    