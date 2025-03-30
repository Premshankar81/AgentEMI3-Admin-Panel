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

                   <a class="margin-r-10 float-right btn btn-primary " href="{{route('admin.customer.create')}}"><i
                   class="mdi mdi-file-export "></i> Add New</a>  

              </h3>
            </div>

            <div class="box-body">
              <table id="dataTables_table_init" class="table table-bordered table-striped" >
                <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Enrollment Date</th>
                    <th>Agent Name </th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data['members'] as $member)
                      <tr>
                         <td>{{ $loop->iteration }}</td>
                          <td>{{ $member->name }}</td>
                          <td>{{ $member->mobile_no }}</td>
                          <td>{{ $member->enrollment_date }}</td>
                          <td>{{ $member->agent_name }}</td>
                          <td>{{$member->status}}</td>
                          <td style="width: 20%">
                              {{-- <a href="{{route('admin.AllEmployees.edit_employee', $member->id) }}"  class="btn btn-warning btn-sm">Edit</a>
                              <a href="#"  onclick="deleteEmployee({{ $member->id }})" class="btn btn-danger btn-sm">Delete</a> --}}
                              <a href='{{route('admin.customer.view.details',$member->id)}}'  class ="btn btn-warning btn-sm" >View</a>
                             
                              <select class="form-control update-status" data-id="{{ $member->id }}">
                                <option value="Pending" {{ $member->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Approved" {{ $member->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                <option value="Rejected" {{ $member->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                            

                                {{-- {{ $employeeLeave['status'] == 'pending' ? 'selected' : '' }}
                                {{ $employeeLeave['status'] == 'approved' ? 'selected' : '' }}
                                {{ $employeeLeave['status'] == 'rejected' ? 'selected' : '' }} --}}
                          
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
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
        $(document).ready(function() {
        $('.update-status').on('change', function() {
            var status = $(this).val(); // Get the new status value
            var leaveId = $(this).data('id'); // Get the leave ID from the data-id attribute
            // Send the AJAX request to update the status
            $.ajax({
                url: '{{ route("admin.customer.update.status",":id") }}'.replace(':id', leaveId), // Use the route for status update
                method: 'PATCH',
                data: {
                    id: leaveId,
                    status: status,
                    _token: '{{ csrf_token() }}', // CSRF token for security
                },
                success: function(response) {
                    if(response.success) {
                        alert('Status updated successfully!');
                        // Optionally update the UI (e.g., show the new status)
                        $('#status-' + leaveId).text(response.status);
                    } else {
                        alert('Error updating status');
                    }
                },
                error: function(xhr, status, error) {
                    alert('Something went wrong: ' + error);
                }
            });
        });
    });
        </script>
    </section>

    