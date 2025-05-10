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
        <div class="col-xs-24">
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
                    <!-- Add a scrollable container -->
                    <div style="overflow-x:auto;width:100%">
                        <table id="dataTables_table_init" class="table table-bordered table-striped" style="width: 150%;">
                            <thead>
                                <tr>
                                    <th style="width: 9%;">Name</th>
                                    <th style="width: 7%;">Employee ID</th>
                                    <th style="width: 9%;">Email</th>
                                    <th style="width: 9%;">Mobile</th>
                                    <th style="width: 9%;">Joining Date</th>
                                    <th style="width: 9%;">Position</th>
                                    <th style="width: 9%;">Father's Mobile No.</th>
                                    <th style="width: 11%;">Bank Account No.</th>
                                    <th style="width: 9%;">IFSC Code</th>
                                    <th style="width: 9%;">Branch Name</th>
                                    <th style="width: 9%;">Action</th>
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
                                      <td>{{ $employee->father_no }}</td>
                                      <td>{{ $employee->account_no }}</td>
                                      <td>{{ $employee->ifsc_code }}</td>
                                      <td>{{ $employee->branch_name }}</td>
                                      <td>
                                          <a href="{{route('admin.AllEmployees.edit_employee', $employee->id) }}"  class="btn btn-warning btn-sm">Edit</a>
                                          <a href="#"  onclick="deleteEmployee({{ $employee->id }})" class="btn btn-danger btn-sm">Delete</a>
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
  

  <script>
    function deleteEmployee(employeeId) {
        if (confirm("Are you sure you want to delete this employee?")) {
            fetch("{{ route('admin.AllEmployees.delete_employee', '') }}/" + employeeId, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                }
            }).then(response => {
                if (response.ok) {
                    alert("Employee deleted successfully.");
                    location.reload();
                } else {
                    alert("Failed to delete employee.");
                }
            });
        }
    }
      // Laravel variable passed to JavaScript
    const status = @json($employee->status);
    const exitDateHeader = "Exit Date"; // New column name
    // Condition to hide the "Action" column
if (status=="inactive") {
  const table = document.getElementById("dataTables_table_init");
  const colIndex = 10; 
  // Index of the "Action" column (zero-based)

  // Hide the header cell
  table.querySelectorAll("thead th")[colIndex].style.display = "none";

  // Hide the cells in the column
  table.querySelectorAll("tbody tr").forEach(row => {
    row.children[colIndex].style.display = "none";
  });
   // Add a new column "Exit Date" to the table
    const headerRow = table.querySelector("thead tr");
    const newHeaderCell = document.createElement("th");
    newHeaderCell.textContent = exitDateHeader;
    headerRow.appendChild(newHeaderCell);
     // Add "Exit Date" cells to each row in the body
const exitDates = @json($employee->pluck('updated_at')); // Assuming you have exit_date data

// Iterate through each row in the table body
table.querySelectorAll("tbody tr").forEach((row, index) => {
  const newCell = document.createElement("td");

  // Check if an exit date exists for the given row, otherwise display "N/A"
  const exitDate = exitDates[index];

  if (exitDate) {
    // Format the exit date to a readable format (optional, you can adjust this format as needed)
    const formattedDate = new Date(exitDate).toLocaleString('en-IN', { timeZone: 'Asia/Kolkata' });
    newCell.textContent = formattedDate;
  } else {
    newCell.textContent = "N/A"; // Default value if exit date is not available
  }

  // Append the new cell to the row
  row.appendChild(newCell);
});

}
    </script>