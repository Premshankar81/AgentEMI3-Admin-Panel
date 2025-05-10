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
                <div class="box-header">
                    <h3 class="box-title">
                        {{$data['page_title']}} Lists
                        <a class="margin-r-10 float-right btn btn-primary"
                           href="{{route('admin.AllEmployees.target.add.form')}}" >
                            <i class="mdi mdi-file-export"></i> Add New
                        </a>
                    </h3>
                </div>
                <div class="box-body">
                    <table id="dataTables_table_init" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px;">No.</th>
                                <th >Employee Name</th>
                                <th >Target Type</th>
                                <th >Target Value</th>
                                <th >Incentive</th>
                                <th >Start Date</th>
                                <th >End Date</th>
                                <th>Achievement</th> 
                                <th >Status</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['employeesTargets'] as $group => $employeeTargets)
                                @php
                                    $firstTarget = $employeeTargets->first(); // Get the first target in the group
                                @endphp
                                <tr>
                                    <td rowspan="{{ $employeeTargets->count() }}" style="vertical-align: middle; text-align: center;">{{ $loop->iteration }}</td>
                                    <td rowspan="{{ $employeeTargets->count() }}" style="vertical-align: middle; text-align: center;">{{ $firstTarget->employee['employee_name'] }}</td>
                                    <td>{{ $firstTarget['target_type'] }}</td>
                                    <td>{{ $firstTarget['target_value'] }}</td>
                                    <td>{{ $firstTarget['incentive'] }}</td>
                                    <td>{{ $firstTarget['start_date'] }}</td>
                                    <td>{{ $firstTarget['end_date'] }}</td>
                                    <td>{{ $firstTarget['achievement'] }}</td>
                                    <td id="status-{{ $firstTarget['id'] }}">{{ ucfirst($firstTarget['status']) }}</td>
                                    <td>
                                         
                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                <form action="#', $entry['id']) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-sm btn-danger">Delete</a>
                                </form>
                                    </td>
                                </tr>
                                @foreach($employeeTargets->skip(1) as $employeeTarget)
                                    <tr>
                                        <td>{{ $employeeTarget['target_type'] }}</td>
                                        <td>{{ $employeeTarget['target_value'] }}</td>
                                        <td>{{ $employeeTarget['incentive'] }}</td>
                                        <td>{{ $employeeTarget['start_date'] }}</td>
                                        <td>{{ $employeeTarget['end_date'] }}</td>
                                        <td>{{ $employeeTarget['achievement '] }}</td>
                                        <td id="status-{{ $employeeTarget['id'] }}">{{ ucfirst($employeeTarget['status']) }}</td>
                                        <td>
                                        <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                       <form action="#', $entry['id']) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                       <a class="btn btn-sm btn-danger">Delete</a>
                                </form>
                                        </td>
                                    </tr>
                                @endforeach
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