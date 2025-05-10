<section class="content-header">
  <h1> Address Detail 
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{route('admin.dashboard')}}">
        <i class="fa fa-dashboard"></i> Dashboard </a>
    </li>
    <li>
      <a href="{{route('admin.customer.index')}}">Customer List</a>
    </li>
    <li>
      <a href="{{route('admin.customer.edit',array('id' => $memberId))}}">Customer View</a>
    </li>
    <li class="active">Address Detail</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
     
    <form id="update_form_address" method="POST" name="update_form_address" action="{{ route('admin.customer.update_address') }}">
    {{csrf_field()}}
    <input type="hidden" name="member_id" id="member_id" value="{{$memberId}}" />
    <input type="hidden" name="address_id" id="address_id" value="{{$address->id ?? ''}}" />

      <div class="nav-tabs-custom">

        <ul class="nav nav-tabs">
          <li class="">
            <a href="{{ route('admin.customer.edit.basicDetails',array('id' => $memberId)) }}">Basic Detail</a>
          </li>
          <li class="active"><a href="#" data-toggle="tab" aria-expanded="true">Address</a></li>
          <li class=""><a href="#">Bank Detail</a></li>
          <li class=""><a href="#">Employement Detail</a></li>
          <li class=""><a href="#">Electricity Bill Detail</a></li>
          <li class=""><a href="#">Nominee </a></li>
          <li class="">
            <a href="#" style="color:lightgray;cursor:initial;">Upload Documents</a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="memberinfo">
            <div class="box-body">
              <div class="form-horizontal">
                <input data-val="true" data-val-required="The Id field is required." id="Id" name="Id" type="hidden" value="c15464d9-4fdc-4141-9b75-3f97e44fbf7a" autocomplete="off">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Resident Status <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <select class="form-control required" id="residense_type" name="residense_type" required>
                        <option value="">Select Resident Status</option>
                        <option value="resident" {{ old('residense_type', $address->residense_type ?? '') == 'resident' ? 'selected' : '' }}>Resident</option>
                        <option value="non_resident" {{ old('residense_type', $address->residense_type ?? '') == 'non_resident' ? 'selected' : '' }}>Non-Resident</option>
                    </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Duration of stay at present address</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="stability" maxlength="20" name="stability" type="text" autocomplete="off" value="{{ $address->stability ?? '' }}" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <h4>Present Address:</h4>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Residence Type <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <select class="form-control required" id="present_residence_type" name="present_residence_type" required>
                        <option value="">Select Residence Type</option>
                        <option value="owned" {{ old('present_residence_type', $address->present_residence_type ?? '') == 'owned' ? 'selected' : '' }}>Owned</option>
                        <option value="rented" {{ old('present_residence_type', $address->present_residence_type ?? '') == 'rented' ? 'selected' : '' }}>Rented</option>
                    </select>
                    
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Address1 <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <input class="form-control required" id="present_address1" maxlength="100" name="present_address1" type="text" autocomplete="off" value="{{$address->present_address1 ?? ''}}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Address2/Landmark</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="present_address2" maxlength="100" name="present_address2" type="text"  autocomplete="off" value="{{$address->present_address2 ?? ''}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Ward </label>
                    <div class="col-sm-7">
                      <input class="form-control" id="present_ward" maxlength="100" name="present_ward" type="text" value="{{$address->present_ward ?? ''}}" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Area</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="present_area" maxlength="100"  name="present_area" type="text" autocomplete="off" value="{{ $address->present_area ?? '' }}" required>
                    </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-4 control-label">State<span class="requiredfield">*</span>
                      </label>
                      <div class="col-sm-7">
                        <select class="form-control" id="present_state" name="present_state" required>
                          <option value="">Select State</option>
                          @foreach ($states as $state)
                              <option value="{{ $state->name }}">{{ $state->name }}</option>
                          @endforeach
                      </select>
                        
                      </div>
                    </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">City <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <input class="form-control" id="present_city" value="{{$address->present_city??''}}" maxlength="100" name="present_city" type="text" autocomplete="off" required>
                    </div>
                  </div>
                  
                    <div class="form-group">
  <label class="col-sm-4 control-label">PIN Code <span class="requiredfield">*</span></label>
  <div class="col-sm-7">
    <input class="form-control required" value="{{$address->present_pin_code ?? ''}}"
           id="present_pin_code" 
           maxlength="6" 
           name="present_pin_code" 
           type="text" 
           autocomplete="off" 
           required>
    <div class="invalid-feedback" id="pincode_error1" style="display: none; color: red;">
      Please enter a valid 6-digit PIN code.
    </div>
  </div>
</div>
                
                
                </div>


                <div class="col-md-6">
                  <h4>Permanent Address: &nbsp; 
                    <a class="btn btn-primary btn-xs" href="javascript:void(0);" onclick="copyPresentAddressDetails();">
                        Copy present address
                    </a>
                </h4>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Residence Type <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <select class="form-control  required" id="permanent_residence_type" name="permanent_residence_type" required>
                        <option value="">Select Residence Type</option>
                        <option  value="owned" {{ old('permanent_residence_type', $address->present_residence_type ?? '') == 'owned' ? 'selected' : '' }}>Owned</option>
                        <option  value="rented" {{ old('permanent_residence_type', $address->present_residence_type ?? '') == 'owned' ? 'selected' : '' }}>Rented</option>
                      </select>
                     
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Address1 <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <input class="form-control" id="permanent_address1" value="{{$address->permanent_address1 ?? ''}}"  maxlength="100" name="permanent_address1" type="text" autocomplete="off" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Address2/Landmark</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="permanent_address2" value="{{$address->permanent_address2 ?? ''}}" maxlength="100" name="permanent_address2" type="text" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Ward </label>
                    <div class="col-sm-7">
                      <input class="form-control" id="permanent_ward" value="{{$address->permanent_ward ?? ''}}" maxlength="100" name="permanent_ward" type="text" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Area</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="permanent_area" value="{{$address->permanent_area ?? ''}}" maxlength="100" name="permanent_area" type="text" autocomplete="off" required>
                    </div>
                  </div>
                  
                    <div class="form-group">
                      <label class="col-sm-4 control-label">State<span class="requiredfield">*</span>
                      </label>
                      <div class="col-sm-7">
                        <select class="form-control" id="permanent_state" name="permanent_state" required>
                          <option value="">Select State</option>
                          @foreach ($states as $state)
                              <option value="{{ $state->name }}">{{ $state->name }}</option>
                          @endforeach
                      </select>
                        
                      </div>
                    </div>
                    
                  <div class="form-group">
                    <label class="col-sm-4 control-label">City <span class="requiredfield">*</span>
                    </label>
                      <div class="col-sm-7">
                        <input class="form-control" id="permanent_city" value="{{$address->permanent_city ?? ''}}" maxlength="100" name="permanent_city" type="text" autocomplete="off" required>
                    </div>
                  </div>
            
          <div class="form-group">
  <label class="col-sm-4 control-label">PIN Code <span class="requiredfield">*</span></label>
  <div class="col-sm-7">
    <input class="form-control required"  value="{{$address->permanent_pin_code ?? ''}}"
           id="permanent_pin_code" 
           maxlength="6" 
           name="permanent_pin_code" 
           type="text" 
           autocomplete="off" 
           required>
    <div class="invalid-feedback" id="pincode_error" style="display: none; color: red;">
      Please enter a valid 6-digit PIN code.
    </div>
  </div>
</div>
       
                  
                </div>
              </div>
            </div>
            <div class="box-footer">
              <div class="col-xs-12 text-center ">
                <div class="form-group">
                  <input type="submit"   class="btn btn-flat btn-success" value="Save"/>
                  <a class="btn btn-flat btn-danger" href="{{route('admin.customer.edit',array('id' => $memberId))}}">Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>



    </div>
  </div>

  <script>
    function copyPresentAddressDetails() {
     document.getElementById('permanent_residence_type').value = document.getElementById('present_residence_type').value;
        document.getElementById('permanent_address1').value = document.getElementById('present_address1').value;
        document.getElementById('permanent_address2').value = document.getElementById('present_address2').value;
        document.getElementById('permanent_ward').value = document.getElementById('present_ward').value;
        document.getElementById('permanent_area').value = document.getElementById('present_area').value;
        document.getElementById('permanent_state').value = document.getElementById('present_state').value;
        document.getElementById('permanent_city').value = document.getElementById('present_city').value;
        document.getElementById('permanent_pin_code').value = document.getElementById('present_pin_code').value;
    }
    
    
   document.getElementById("permanent_pin_code").addEventListener("input", function () {
    let pinInput = this.value.trim();
    let errorDiv = document.getElementById("pincode_error");

    // Remove non-numeric characters
    this.value = this.value.replace(/\D/g, '');

    if (this.value.length !== 6) {
      this.classList.add("is-invalid");
      errorDiv.style.display = "block";
      errorDiv.innerText = "PIN code must be exactly 6 digits.";
    } else {
      this.classList.remove("is-invalid");
      errorDiv.style.display = "none";
    }
  });
  
  document.getElementById("present_pin_code").addEventListener("input", function () {
    let pinInput = this.value.trim();
    let errorDiv = document.getElementById("pincode_error1");

    // Remove non-numeric characters
    this.value = this.value.replace(/\D/g, '');

    if (this.value.length !== 6) {
      this.classList.add("is-invalid");
      errorDiv.style.display = "block";
      errorDiv.innerText = "PIN code must be exactly 6 digits.";
    } else {
      this.classList.remove("is-invalid");
      errorDiv.style.display = "none";
    }
  });
</script>
</section>