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
      <div class="col-xs-12">
          <div class="box">
              <div class="box-header" style="width:100%">
                  <h3 class="box-title">
                      All active Employees list
                      <a class="margin-r-10 float-right btn btn-primary"
                         href="{{route('admin.AllEmployees.addEmployeeForm')}}">
                          <i class="mdi mdi-file-export"></i> Add New
                      </a>
                  </h3>
              </div>
              <div class="box-body">
                  <table id="dataTables_table_init" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Employee ID</th>
                              <th>Email</th>
                              <th>Mobile</th>
                              <th>Joining Date</th>
                              <th>Department</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($data['employees'] as $employee)
                            <tr>
                                <td>{{ $employee->employee_name }}</td>
                                <td>{{ $employee->employee_id }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->mobile }}</td>
                                <td>{{ $employee->joining_date }}</td>
                                <td>{{ $employee->position }}</td>
                                <td>
                                    <a href="{{route('admin.AllEmployees.edit_employee', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
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
  
