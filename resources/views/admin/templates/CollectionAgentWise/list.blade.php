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
              <div class="navbar-custom-menu pull-right"> 
                    <a href="#" class="btn btn-flat btn-default" data-toggle="modal" data-target="#modal-daterange-reportsProfitnLoss">
                        <i class="fa fa-filter"></i>&nbsp;Add Filter
                    </a>
                    
                    <a href="{{route('admin.cashbook.index')}}" class="btn btn-flat btn-default">
                        <i class="fa fa-refresh"></i>&nbsp;Reset
                    </a>
                    
                </div>
                </h3>
            </div>
            
            

            <div class="box-body">
                
                
                
              <table id="dataTables_table_init" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Agent Code</th>
                    <th>Agent Name</th>
                    <th>Agent Mobile</th>
                    <th>Amount</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
                <tbody id="TableRecordList">
                   @foreach($rows as $index=>$row)
                    
                     <tr role="row">
                       
                        <td>{{@$row['createdBy']['branch_code']}}</td>
                        <td>{{@$row['createdBy']['name']}}</td>
                        <td>{{@$row['createdBy']['mobile']}}</td>
                        <td><?= ucfirst($row['total_amount']) ?></td>
                        <td>
                           <a class="btn btn-warning btn-xs" title="Transactions Detail" href="{{route('collection-agent-wise-tran-details',array('id' => @$row['createdBy']['id']))}}">
                           Transactions Detail
                          </a>
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

    