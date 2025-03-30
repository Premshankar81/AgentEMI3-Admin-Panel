<section class="content-header">
  <h1> Employement Detail </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('admin.customer.index')}}">Customer List</a></li>
    <li><a href="">Customer View</a></li>
    <li class="active">Employement Detail</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="">
            <a href="{{ route('admin.customer.edit.basicDetails',array('id' => $memberId)) }}">Basic Detail</a>
          </li>
          <li class="">
            <a href="{{ route('admin.customer.address',array('id' => $memberId)) }}">Address</a>
          </li>
          <li class="">
            <a href="{{ route('admin.customer.bankDetail',array('id' => $memberId)) }}">Bank Detail</a>
          </li>
          <li class="active">
            <a href="#" data-toggle="tab" aria-expanded="true">Employement Detail</a>
          </li>
          <li class="">
            <a href="">Electricity Bill Detail</a>
          </li>
          <li class="">
            <a href="">Nominee </a>
          </li>
          <li class="">
            <a href="#" style="color:lightgray;cursor:initial;">Upload Documents</a>
          </li>
        </ul>
    <form id="update_form_professionDetail" method="POST" name="update_form_professionDetail" action="{{ route('admin.customer.professionDetail_update')}}">
    {{csrf_field()}}
    <input type="hidden" name="member_id" id="member_id" value="{{$memberId}}" />
        <div class="tab-content">
          <div class="tab-pane active" id="memberinfo">
            <div class="box-body">
              <div class="form-horizontal">
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Occupation</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="occupation" maxlength="30" name="occupation" type="text" autocomplete="off" value="{{$professionDetail->occupation??""}}" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Employement Type <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <select class="form-control" id="employment_type" name="employment_type" required>
                        <option value="">Select Employment Type</option>
                        <option value="house_wife" {{ old('employment_type', $professionDetail->employment_type ?? '') == 'house_wife' ? 'selected' : '' }}>House-Wife</option>
                        <option value="retired" {{ old('employment_type', $professionDetail->employment_type ?? '') == 'retired' ? 'selected' : '' }}>Retired</option>
                        <option value="salaried" {{ old('employment_type', $professionDetail->employment_type ?? '') == 'salaried' ? 'selected' : '' }}>Salaried</option>
                        <option value="self_employed_professional" {{ old('employment_type', $professionDetail->employment_type ?? '') == 'self_employed_professional' ? 'selected' : '' }}>Self Employed Professional</option>
                        <option value="self_employed" {{ old('employment_type', $professionDetail->employment_type ?? '') == 'self_employed' ? 'selected' : '' }}>Self-Employed</option>
                        <option value="student" {{ old('employment_type', $professionDetail->employment_type ?? '') == 'student' ? 'selected' : '' }}>Student</option>
                        <option value="not_employed" {{ old('employment_type', $professionDetail->employment_type ?? '') == 'not_employed' ? 'selected' : '' }}>Not-Employed</option>
                    </select>
                    
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">
                      <span id="companytitle">Business Name</span>
                    </label>
                    <div class="col-sm-7">
                      <input class="form-control" id="business_name" maxlength="50" name="business_name" type="text" value="{{$professionDetail->business_name??""}}" autocomplete="off" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Address1</label>
                    <div class="col-sm-7">
                      <input class="form-control " id="address1" maxlength="100" value="{{$professionDetail->address1??""}}" name="address1" type="text" autocomplete="off" required>
                      
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Address2</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="address2" maxlength="100" value="{{$professionDetail->address2??""}}" name="address2" type="text"  autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">State </label>
                    <div class="col-sm-7">
                      <select class="form-control" name="state" id="state" required>
                        <option value="">Select State</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->name }}" 
                                {{ old('state', $professionDetail->state ?? '') == $state->name ? 'selected' : '' }}>
                                {{ $state->name }}
                            </option>
                        @endforeach
                    </select>
                    
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">District</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="distict"  value="{{$professionDetail->district??""}}"  name="district" type="text"  autocomplete="off" required>
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
  <label class="col-sm-4 control-label">PIN Code <span class="requiredfield">*</span></label>
  <div class="col-sm-7">
    <input class="form-control required"  value="{{$professionDetail->pin_code??""}}"
           id="pin_code" 
           maxlength="6" 
           name="pin_code" 
           type="text" 
           autocomplete="off" 
           required>
    <div class="invalid-feedback" id="pincode_error" style="display: none; color: red;">
      Please enter a valid 6-digit PIN code.
    </div>
  </div>
</div>
                </div>
                
               
       
                
                <div id="salarieddiv" class="displaynone">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Employer Contact No</label>
                      <div class="col-sm-7">
                        <input class="form-control" id="employer_contact" maxlength="10" value="{{$professionDetail->employer_contact??""}}" name="employer_contact" type="number" autocomplete="off">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Employer Email</label>
                      <div class="col-sm-7">
                        <input class="form-control" id="employer_email" maxlength="50"  name="employer_email" type="email" value="{{$professionDetail->employer_email??""}}" autocomplete="off">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Monthly Income (Net)</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="monthly_income" value="{{$professionDetail->monthly_income??""}}" maxlength="30" name="monthly_income" type="number"  autocomplete="off" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <div class="col-xs-12 text-center ">
                <div class="form-group">
                  <button type="submit"  class="btn btn-flat btn-success">SAVE</button>
                  <a class="btn btn-flat btn-danger" href="">Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </form>


      </div>
    </div>
  </div>
  <script>
       document.getElementById("pin_code").addEventListener("input", function () {
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
  </script>
</section>