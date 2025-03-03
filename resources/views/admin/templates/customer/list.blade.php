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

                <a class="float-right btn btn-warning " href="{{route('admin.ledger_type.export')}}"><i
                   class="mdi mdi-file-export "></i> Export</a>  

                   <a class="margin-r-10 float-right btn btn-primary " href="{{route('admin.customer.create')}}"><i
                   class="mdi mdi-file-export "></i> Add New</a>  

              </h3>
            </div>

            <div class="box-body">
              <div style="overflow-x:auto;width:100%">
              <table id="dataTables_table_init" class="table table-bordered table-striped" style="width: 200%;">
                <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Age</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Marital Status</th>

                    <th>Religion</th>
                    <th>Cast</th>
                    <th>Enrollment Date</th>
                    <th>Agent Name </th>
                    <th>Latitude </th>
                    <th>Longitude </th>
                    <th>AADHAR No </th>
                    <th>PAN No </th>
                    <th>Voter ID No </th>
                    <th>Ration Card No </th>
                    <th>Driving License No </th>
                    <th>Passport No </th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data['members'] as $member)
                      <tr>
                         <td>{{ $loop->iteration }}</td>
                          <td>{{ $member->name }}</td>
                          <td>{{ $member->gender }}</td>
                          <td>{{ $member->dob }}</td>
                          <td>{{ $member->age }}</td>
                          <td>{{ $member->mobile_no }}</td>
                          <td>{{ $member->email }}</td>
                          <td>{{ $member->father_name }}</td>
                          <td>{{ $member->mother_name }}</td>
                          <td>{{ $member->marital_status }}</td>

                          <td>{{ $member->religion }}</td>
                          <td>{{ $member->member_cast }}</td>
                          <td>{{ $member->enrollment_date }}</td>
                          <td>{{ $member->agent_name }}</td>
                          <td>{{ $member->latitude }}</td>
                          <td>{{ $member->longitude }}</td>
                          <td>{{ $member->adhar_card_no }}</td>
                          <td>{{ $member->pan }}</td>
                          <td>{{ $member->voter_id_no }}</td>
                          <td>{{ $member->ration_card_no }}</td>
                          <td>{{ $member->driving_license_no }}</td>
                          <td>{{ $member->passport_no }}</td>
                          <td>
                              {{-- <a href="{{route('admin.AllEmployees.edit_employee', $member->id) }}"  class="btn btn-warning btn-sm">Edit</a>
                              <a href="#"  onclick="deleteEmployee({{ $member->id }})" class="btn btn-danger btn-sm">Delete</a> --}}
                              <a href="#', $member->id) }}"  class="btn btn-warning btn-sm">Edit</a>
                              <a href="#"  class="btn btn-danger btn-sm">Delete</a>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
                
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    