<section class="content ">
    <form id="add_form" method="POST" name="add_form" action="{{route('admin.AllEmployees.target.add')}}" autocomplete="off">
      {{csrf_field()}}
      <div class="row text-left">
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="tab-pane active" id="memberinfo">
                <div class="box-body">
                  <div class="form-horizontal">
                    <!-- Employee Name -->
                    <div class="row ">
                      <div class="col-md-12">
                        <div class="form-group ">
                          <label class="col-sm-3 control-label">Employee Name<span class="requiredfield">*</span></label>
                          <div class="col-sm-8">
                            <select class="form-control" id="employee_name" name="employee_name">
                              <option value="" disabled selected>Select Employee</option>
                              @foreach($data['employees'] as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Start Date -->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Start Date <span class="requiredfield">*</span></label>
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
                     <!-- End Date -->
                     <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">End Date <span class="requiredfield">*</span></label>
                            <div class="col-sm-8">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input class="form-control" id="end_date" name="end_date" type="date" required>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <!-- add target text -->
                    <div class="row" style="margin-left:20px">
                      <div class="col-md-12">
                        <label class="col-sm-1 control-label">
                        
                        </label>
                        <div class="col-sm-10 form-group d-flex align-items-center" 
                             style="border: 1px solid #ccc; padding: 4px; border-radius: 5px; display: flex; justify-content: space-between; align-items: center;">
                          <span style="font-size: 16px; font-weight: bold; margin: auto;padding-left:80px">Add Target</span>
                          <button id="add-target" class="btn btn-primary" style="margin-left: auto;">+ Add</button>
                        </div>
                      </div>
                    </div>
                    
                    
                
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="col-sm-1 control-label"> </label>
                          <div class="col-sm-4">
                            <input class="form-control"  type="text" value="Target Type"  readonly  style="text-align: center;font-size:14px;font-weight: bold;">
                          </div>
                          <div class="col-sm-3">
                            <input class="form-control" value = " Target Value" type="text"  readonly   style="text-align: center;font-size:14px;font-weight: bold;">
                          </div>
                          <div class="col-sm-3">
                            <input class="form-control" value = " Incentive" type="text"  readonly   style="text-align: center;font-size:14px;font-weight: bold;">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="target-fields">
                   
                    </div>
                
                <!-- Submit and Cancel Buttons -->
                <div class="box-footer">
                  <div class="col-xs-12 text-center">
                    <div class="form-group">
                      <input type="submit" value="Save" class="btn btn-flat btn-success" />
                      <a class="btn btn-flat btn-danger" href="{{route('admin.AllEmployees.index')}}">Cancel</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="timeline"></div>
            </div>
          </div>
        </div>
      </div>
    </form>
 
    <!-- JavaScript to Dynamically Add Fields -->
<script>
    document.getElementById('add-target').addEventListener('click', function () {
        const targetFields = document.getElementById('target-fields');
        
        // Create a new row container
        const newRow = document.createElement('div');
        newRow.className = 'row mb-3';

        // Create the label
        const labelCol = document.createElement('label');
        labelCol.className = 'col-sm-1 control-label';
        labelCol.innerHTML = `<span class="requiredfield text-danger">*</span>`;

        // Create the select field container
        const selectCol = document.createElement('div');
        selectCol.className = 'col-sm-4';
        selectCol.innerHTML = `
            <select class="form-control" name="target_select[]">
                <option value="Savings Goal">Savings Goal</option>
                <option value="Investment Goal">Investment Goal</option>
                <option value="FD">FD</option>
            </select>
        `;

        // Create the input field container
        const inputCol = document.createElement('div');
        inputCol.className = 'col-sm-3';
        inputCol.innerHTML = `
            <input class="form-control" type="number" name="target_input[]" placeholder="Enter target value" required style="text-align: center;font-size:14px;">
        `;
       // Create the input field container
       const incentiveInputCol = document.createElement('div');
        incentiveInputCol.className = 'col-sm-3';
        incentiveInputCol.innerHTML = `
            <input class="form-control" type="number" name="incentive_input[]" placeholder="Enter incentive" required style="text-align: center;font-size:14px;">
        `;
        // Append label, select, and input fields to the new row
        newRow.appendChild(labelCol);
        newRow.appendChild(selectCol);
        newRow.appendChild(inputCol);
        newRow.appendChild(incentiveInputCol);
        // Append the new row to the target fields container
        targetFields.appendChild(newRow);
    });
</script>
      
  </section>
  