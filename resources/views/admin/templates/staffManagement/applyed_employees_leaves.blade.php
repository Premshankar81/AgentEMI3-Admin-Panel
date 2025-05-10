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
                <div class="box-body">
                    <table id="dataTables_table_init" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px;">No.</th>
                                <th style="width: 100px;">Employee Name</th>
                                <th style="width: 100px;">Leave Type</th>
                                <th style="width: 100px;">Start Date</th>
                                <th style="width: 100px;">End Date</th>
                                <th style="width: 100px;">Status</th>
                                <th style="width: 150px;">Reason</th>
                                <th style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['employeesLeaves'] as $index => $employeeLeave)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $employeeLeave['employee_name'] }}</td> <!-- Accessing the name correctly -->
                                    <td>{{ $employeeLeave['leave_type'] }}</td> <!-- Accessing the leave type correctly -->
                                    <td>{{ $employeeLeave['start_date'] }}</td>
                                    <td>{{ $employeeLeave['end_date'] }}</td>
                                    <td id="status-{{ $employeeLeave['id'] }}">{{ ucfirst($employeeLeave['status']) }}</td>
                                    <td>{{ $employeeLeave['reason'] }}</td>
                                    <td>
                                        <select class="form-control update-status" data-id="{{ $employeeLeave['id'] }}">
                                            <option value="pending" {{ $employeeLeave['status'] == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="approved" {{ $employeeLeave['status'] == 'approved' ? 'selected' : '' }}>Approved</option>
                                            <option value="rejected" {{ $employeeLeave['status'] == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        </select>
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
                url: '{{ route("admin.employee.leave.update.status",":id") }}'.replace(':id', leaveId), // Use the route for status update
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