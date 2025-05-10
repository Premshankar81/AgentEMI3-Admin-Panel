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
        <div class="col-xs-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        {{$data['page_title']}} Lists
                        <a class="margin-r-10 float-right btn btn-primary"
                        href="#" data-toggle="modal" data-target="#add_leave" id="addIncentive">
                         <i class="mdi mdi-file-export"></i> Add New
                     </a>
                    </h3>
                </div>
                <div class="box-body">
                    <table id="dataTables_table_init" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px;">No.</th>
                                <th style="width: 150px;">Employee Name</th>
                                <th style="width: 150px;">Date</th>
                                <th style="width: 100px;">Incentive</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['incentives'] as $index => $incentive)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $incentive['employee']['employee_name'] }}</td>
                                    <td>{{ $incentive['created_at'] ? \Carbon\Carbon::parse($incentive['created_at'])->format('Y-m-d') : 'N/A' }}</td>
                                    <td>{{ number_format($incentive['commission_amount'], 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
        </div>
    </div>
   
</div>

<!-- Add Leave Modal -->
  
<div class="modal custom-modal fade container" id="add_leave" role="dialog" aria-labelledby="addLeaveModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
      <div class="modal-content">
      <button type="button" class="close" style="padding:20px;" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
      <div class="modal-header d-flex justify-content-between align-items-center">
  <h3 class="modal-title mx-auto" style="text-align: center">Add Employee Incentive</h3>
  
</div>
<div class="modal-body">
  <form action="{{route('add.total.employee.incentive')}}" method="POST" name="add_form" id= "add_form" autocomplete="off">
    {{csrf_field()}}
    <div class="col-md-12">
        <!-- Employee Name -->
        <div class="row ">
            <div class="col-md-12">
              <div class="form-group">
                <label class="col-sm-3 control-label">Employee Name<span class="requiredfield">*</span></label>
                <div class="col-sm-8">
                  <select class="form-control" id="employee_name" name="employee_name">
                    <option value="" disabled selected>Select Employee</option>
                </select>
                </div>
              </div>
            </div>
          </div>
      <!-- Start Date -->
      <div class="row" style="margin-top: 20px">
        <div class="col-md-12">
          <div class="form-group">
            <label class="col-sm-3 control-label">Date <span class="requiredfield">*</span></label>
            <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input class="form-control" id="start_date" name="start_date" type="date" required>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Target Fields -->
<div id="targets-container">
    <!-- Target header -->
    <div class="row" style="margin-top: 20px">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-sm-4">
                    <input class="form-control" type="text" value="Target Type" readonly style="text-align: center;font-size:14px;font-weight: bold;">
                </div>
                <div class="col-sm-4">
                    <input class="form-control" type="text" value="Target Value" readonly style="text-align: center;font-size:14px;font-weight: bold;">
                </div>
                <div class="col-sm-4">
                    <input class="form-control" type="text" value="Incentive" readonly style="text-align: center;font-size:14px;font-weight: bold;">
                </div>
            </div>
        </div>
    </div>

    <!-- Dynamic rows will be added here -->
</div>

    </div>
    <div class="submit-section" style="text-align: center;">
      <button type="submit" class="btn btn-success submit-btn" style="margin-top: 30px;padding-left:20px;padding-right:20px">Save</button>
    </div>
  </form>
</div>

      </div>
    </div>  
  </div>


</div>


<script>
    document.getElementById("addIncentive").addEventListener("click", function () {
        fetchEmployees();
    });

    function fetchEmployees() {
        const employeeSelect = document.getElementById("employee_name");

        // Fetch employee data from the server
        fetch("{{ route('get.employees.list') }}")
            .then(response => response.json())
            .then(data => {
                // Clear existing options
                employeeSelect.innerHTML = '<option value="" disabled selected>Select Employee</option>';

                // Populate the dropdown with employee names
                data.forEach(employee => {
                    const option = document.createElement("option");
                    option.value = employee.id;
                    option.textContent = employee.employee_name;
                    employeeSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error("Error fetching employees:", error);
            });
    }

    // Add event listeners to employee_name and start_date fields
document.getElementById("start_date").addEventListener("change", function () {
    fetchCompletedTargetsRoute();
});
document.getElementById("employee_name").addEventListener("change", function () {
    fetchCompletedTargetsRoute();
});

// Function to directly fetch completed target data 
function fetchCompletedTargetsRoute() {
    const employeeId = document.getElementById("employee_name").value;
    const date = document.getElementById("start_date").value;

    if (!employeeId || !date) {
        return; // Do nothing if either field is not selected
    }

    const route = `{{ route('get.employees.completed.targets') }}?employee_id=${employeeId}&date=${date}`;

    fetch(route)
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById("targets-container");

            // Clear previous target rows
            const rows = container.querySelectorAll(".target-row");
            rows.forEach(row => row.remove());

            // Populate new target rows
            data.forEach(target => {
                const row = document.createElement("div");
                row.className = "row target-row";
                row.style.marginTop = "10px";

                row.innerHTML = `
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <input class="form-control" type="text" value="${target.target_type}" readonly style="text-align: center;">
                            </div>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" value="${target.target_value}" readonly style="text-align: center;">
                            </div>
                            <div class="col-sm-4">
                                <input class="form-control" name="incentives[]" type="text" placeholder="Enter Incentive" style="text-align: center;">
                            </div>
                        </div>
                    </div>
                `;
                container.appendChild(row);
            });
        })
        .catch(error => {
            console.error("Error fetching completed targets:", error);
        });
}

//add total incentive in the database
document.querySelector("form").addEventListener("submit", function (e) {
    // Prevent the default form submission
    e.preventDefault();

    // Get selected employee ID
    const employeeId = document.getElementById("employee_name").value;

    // Calculate total incentive
    let totalIncentive = 0;
    document.querySelectorAll('input[name="incentives[]"]').forEach(input => {
        const value = parseFloat(input.value) || 0;
        totalIncentive += value;
    });

    // Update hidden fields
    document.getElementById("employee_id").value = employeeId;
    document.getElementById("total_incentive").value = totalIncentive;

    // Submit the form
    this.submit();
});


</script>


</section>