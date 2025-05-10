<section class="content-header">
    <h1> Dashboard <small>{{$data['page_title']}}</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home </a></li>
        <li><a href="#">Dashboard</a></li>
        <li class="active">{{$data['page_title']}}</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
        <div class="col-xs-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        {{$data['page_title']}}
                        <a class="margin-r-10 float-right btn btn-primary"
                           href="#" data-toggle="modal" data-target="#add_leave">
                            <i class="mdi mdi-file-export"></i> Add New
                        </a>
                    </h3>
                </div>
                <div class="box-body">
                  <table id="dataTables_table_init" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th style="width: 50px;">No.</th>
                              <th style="width: 100px;">Leave Type</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($data['leaveTypes'] as $index => $leaveType)
                              <tr>
                                  <td>{{ $index + 1 }}</td>
                                  <td>{{ $leaveType->leave_type }}</td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
              
            </div>
        </div>
    </div>


 <!-- Add Leave Modal -->
  
<div class="modal custom-modal fade container"  id="add_leave" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <button type="button" class="close" style="padding:20px;" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
      <div class="modal-header d-flex justify-content-between align-items-center">
  <h3 class="modal-title mx-auto" style="text-align: center">Add Leave</h3>
  
</div>
<div class="modal-body">
  <form action="{{route('admin.leaveTypes.add')}}" method="POST" name="add_form" id= "add_form" autocomplete="off">
    {{csrf_field()}}
    <div class="col-md-12">
      <div class="form-group">
        <label class="col-sm-3 control-label">Leave Type<span class="requiredfield">*</span></label>
        <div class="col-sm-9">
          <input class="form-control" id="leave_type" maxlength="50" name="leave_type" type="text">
        </div>
      </div>
    </div>

    <div class="submit-section" style="text-align: center;">
      <button type="submit" class="btn btn-primary submit-btn" style="margin-top: 30px;">Submit</button>
    </div>
  </form>
</div>

      </div>
    </div>
  </div>
</div>

 
  </section>