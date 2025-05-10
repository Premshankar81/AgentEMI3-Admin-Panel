
<section class="content-header">
  <h1>
      Basic Info
      <small>[Basic Information]</small>
  </h1>
  <ol class="breadcrumb">
      <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{route('admin.customer.index')}}">Customer List</a></li>
      <li><a href="{{route('admin.customer.edit',array('id' => $member->id))}}">Customer View</a></li>
      <li class="active">Basic Info</li>
      
  </ol>
</section>

<section class="content">
  <div class="row">
      <div class="col-md-12">
          <div class="nav-tabs-custom">
              <div class="tab-content">
                  <div class="tab-pane active" id="memberinfo">
                    <form id="add_form" method="POST" name="add_form" action="{{ route('admin.customer.store.basicDetails')}}" >
                      {{csrf_field()}}
                      <input type="hidden" name="member_id" id="member_id" value="{{$memberId}}" />
                    <div class="row">
                      <div class="col-md-12">
                        <div class="nav-tabs-custom">
                          <ul class="nav nav-tabs">
                            <li class="active">
                              <a href="#memberinfo" data-toggle="tab" aria-expanded="true">Basic Detail</a>
                            </li>
                            <li class="">
                              <a href="" style="color:lightgray;cursor:initial;">Address</a>
                            </li>
                            <li class="">
                              <a href="#" style="color:lightgray;cursor:initial;">Bank Detail</a>
                            </li>
                            <li class="">
                              <a href="#" style="color:lightgray;cursor:initial;">Employement Detail</a>
                            </li>
                            <li class="">
                              <a href="#" style="color:lightgray;cursor:initial;">Electricity Bill Detail</a>
                            </li>
                            <li class="">
                              <a href="#" style="color:lightgray;cursor:initial;">Nominee </a>
                            </li>
                            <li class="">
                              <a href="#" style="color:lightgray;cursor:initial;">Upload Documents</a>
                            </li>
                          </ul>
                          <div class="tab-content">
                            <div class="tab-pane active" id="memberinfo">
                             
                              <div class="box-body">
                                <div class="form-horizontal">
                                  
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Enrollment Date <span class="requiredfield">*</span></label>
                                      <div class="col-sm-7">
                                        <div class="mb-3">
                                              <input type="date" id="enrollment_date" name="enrollment_date"  class="form-control" required value="{{$member->enrollment_date}}"/>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                  
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Customer's Name</label>
                                      <div class="col-sm-7">
                                        <div class="input-group">
                                          <div class="input-group-addon padding-0" style="padding:0px;">
                                            <select id="prifix_name" name="prifix_name" style="height: 32px; background-color: #fff !important;">
                                              <option value=""></option>
                                              <option value="mr." {{ old('prifix_name', $member->prefix_name ?? '') == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                                              <option value="ms." {{ old('prifix_name', $member->prefix_name ?? '') == 'Ms.' ? 'selected' : '' }}>Ms.</option>
                                              <option value="mrs." {{ old('prifix_name', $member->prefix_name ?? '') == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                                              <option value="master" {{ old('prifix_name', $member->prefix_name ?? '') == 'Master' ? 'selected' : '' }}>Master</option>
                                              <option value="shri" {{ old('prifix_name', $member->prefix_name ?? '') == 'Shri' ? 'selected' : '' }}>Shri</option>
                                              <option value="smt." {{ old('prifix_name', $member->prefix_name ?? '') == 'Smt.' ? 'selected' : '' }}>Smt.</option>
                                              <option value="dr." {{ old('prifix_name', $member->prefix_name ?? '') == 'Dr.' ? 'selected' : '' }}>Dr.</option>
                                          </select>
                                          
                                          </div>
                                          <input class="form-control"id="name" maxlength="50" name="name" type="text" autocomplete="off" value="{{$member->name}}">
                                        </div>
                                        
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Gender <span class="requiredfield">*</span>
                                      </label>
                                      <div class="col-sm-7">
                                        <select class="form-control" id="gender" name="gender">
                                          <option value="">Select Gender</option>
                                          <option value="male" {{ old('gender', $member->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                                          <option value="female" {{ old('gender', $member->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                                          <option value="transgender" {{ old('gender', $member->gender ?? '') == 'transgender' ? 'selected' : '' }}>Transgender</option>
                                      </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Date of Birth</label>
                                      <div class="col-sm-7">
                                          <div class="mb-3">
                                              <input type="date" id="dob" name="dob"  class="form-control" required  value="{{$member->dob}}"/>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                  
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Age</label>
                                      <div class="col-sm-7">
                                        <input class="form-control" id="age" maxlength="100" name="age" type="number"  autocomplete="off" value="{{$member->age}}" required>
                                        <span class="field-validation-valid" data-valmsg-for="Age" data-valmsg-replace="true"></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Marital Status <span class="requiredfield">*</span>
                                      </label>
                                      <div class="col-sm-7">
                                        <select class="form-control" id="marital_status" name="marital_status" required>
                                          <option value="">Select Marital Status</option>
                                          <option value="married" {{ old('marital_status', $member->marital_status ?? '') == 'Married' ? 'selected' : '' }}>Married</option>
                                          <option value="unMarried" {{ old('marital_status', $member->marital_status ?? '') == 'UnMarried' ? 'selected' : '' }}>UnMarried</option>
                                          <option value="single" {{ old('marital_status', $member->marital_status ?? '') == 'Single' ? 'selected' : '' }}>Single</option>
                                          <option value="widow/widower" {{ old('marital_status', $member->marital_status ?? '') == 'Widow/widower' ? 'selected' : '' }}>Widow/Widower</option>
                                          <option value="divorced" {{ old('marital_status', $member->marital_status ?? '') == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                      </select>
                                      
                                        
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Primary Mobile No <span class="requiredfield">*</span>
                                      </label>
                                      <div class="col-sm-7">
                                        <div class="mb-3">
                                          <input class="form-control" id="mobile_no" maxlength="10" name="mobile_no" type="text" autocomplete="off" pattern="[6-9]\d{9}" value = "{{$member->mobile_no}}" required>
                                          <div class="invalid-feedback"  id="mobile_error" style="display: none; color: red;">
                                            Please enter a valid 10-digit mobile number starting with 6-9.
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
     
                                  
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Alternate Mobile No </label>
                                      <div class="col-sm-7">
                                        <div class="mb-3">
                                          <input class="form-control" id="alternate_no" maxlength="15" name="alternate_no" type="number" autocomplete="off" value="{{$member->alternate_mobile_no}}">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Email Address</label>
                                      <div class="col-sm-7">
                                        <input class="form-control"  maxlength="100" name="email" type="email" autocomplete="off"  value = "{{$member->email}}">
                                        <div class="invalid-feedback">
                                          Please enter a valid email address.
                                      </div>
                                      </div>
                                    </div>
                                  </div>
                  
                  
                  
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Relative's Name</label>
                                      <div class="col-sm-7">
                                        <div class="input-group">
                                          <div class="input-group-addon padding-0" style="padding:0px;">
                                            <select id="relative_relation" name="relative_relation" style="height: 32px;background-color: #fff !important;">
                                              <option value="">Select</option>
                                              <option value="Father" {{ old('relative_relation', $member->relative_relation ?? '') == 'Father' ? 'selected' : '' }}>Father</option>
                                              <option value="Mother" {{ old('relative_relation', $member->relative_relation ?? '') == 'Mother' ? 'selected' : '' }}>Mother</option>
                                              <option value="Husband" {{ old('relative_relation', $member->relative_relation ?? '') == 'Husband' ? 'selected' : '' }}>Husband</option>
                                              <option value="Spouse" {{ old('relative_relation', $member->relative_relation ?? '') == 'Spouse' ? 'selected' : '' }}>Spouse</option>
                                          </select>
                                          
                                          </div>
                                          <input class="form-control"id="relative_name" maxlength="50" name="relative_name" type="text" autocomplete="off" value="{{$member->relative_name}}">
                                        </div>
                                        
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Mother's Name</label>
                                      <div class="col-sm-7">
                                        <input class="form-control"  id="mother_Name" maxlength="30" name="mother_Name" type="text"  autocomplete="off" value="{{$member->mother_name}}">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Religion</label>
                                      <div class="col-sm-7">
                                        <input class="form-control" id="religion" maxlength="20" name="religion" type="text" value="{{$member->religion}}" autocomplete="off">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Cast</label>
                                      <div class="col-sm-7">
                                        <input class="form-control" id="member_cast" maxlength="20" name="member_cast" type="text" value="{{$member->member_cast}}" autocomplete="off">
                                      </div>
                                    </div>
                                  </div>
                  
                               
                                  
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Agent Name <span class="requiredfield">*</span>
                                      </label>
                                      <div class="col-sm-7">
                                        <select class="form-control" id="agent_name" name="agent_name" required>
                                          <option value="" disabled selected>Select Agent</option>
                                          @foreach($employees as $employee)
                                            <option value="{{ $employee->employee_name }}">{{ $employee->employee_name }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  
                                    <div class="col-md-6">
                <div class="form-group">
                  <label class="col-sm-4 control-label">Class Name <span class="requiredfield">*</span>
                  </label>
                  <div class="col-sm-7">
                    <select class="form-control " id="class" name="class">
                      <option value="">select Class</option>
                      <?php foreach($Classes as $Class){ ?>
                          <option value="{{$Class['title']}}[ {{$Class['class_fee']}}">{{$Class['title']}} [ {{$Class['class_fee']}} ]</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
                                
                                  <div class="clearfix"></div>
                                  <h4><strong>GPS Location:</strong></h4>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="col-sm-4 control-label">Latitude</label>
                                          <div class="col-sm-7">
                                              <input class="form-control" id="latitude" maxlength="50" name="latitude" type="text" value="{{$member->latitude}}" autocomplete="off">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="col-sm-4 control-label">Longitude</label>
                                          <div class="col-sm-7">
                                              <input class="form-control" id="longitude" maxlength="50" name="longitude" type="text" value="{{$member->longitude}}" autocomplete="off">
                                          </div>
                                      </div>
                                  </div>
                  
                                  <div class="clearfix"></div>
                                  <h4>
                                    <strong>KYC Information:</strong>
                                  </h4>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">AADHAR No</label>
                                      <div class="col-sm-7">
                                        <input class="form-control" id="adhar_card_no" maxlength="12" name="adhar_card_no" type="text" autocomplete="off" value="{{$member->adhar_card_no}}" required>
                                        <span class="field-validation-valid" data-valmsg-for="AadharNo" data-valmsg-replace="true"></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">PAN</label>
                                      <div class="col-sm-7">
                                        <input class="form-control" id="pan" maxlength="10" name="pan" onkeyup="this.value = this.value.toUpperCase();" type="text" value="{{$member->pan}}" autocomplete="off" required>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Voter ID No</label>
                                      <div class="col-sm-7">
                                        <input class="form-control" id="voter_id_no" maxlength="30" name="voter_id_no" type="text" value="{{$member->voter_id_no}}" autocomplete="off">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Ration Card No</label>
                                      <div class="col-sm-7">
                                        <input class="form-control" id="ration_card_no" maxlength="30" name="ration_card_no" type="text" value="{{$member->ration_card_no}}" autocomplete="off">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Driving License No</label>
                                      <div class="col-sm-7">
                                        <input class="form-control" id="driving_license_no" maxlength="30" name="driving_license_no" type="text" value="{{$member->driving_license_no}}" autocomplete="off">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Passport No</label>
                                      <div class="col-sm-7">
                                        <input class="form-control" id="passport_no" maxlength="30" name="passport_no" type="text" value="{{$member->passport_no}}" autocomplete="off">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                  
                                  <div class="col-md-6">
                                  <h4><strong>Share Allocation:</strong> 
                                  <div class="form-group">
                                      <label class="col-sm-4 control-label">No of Share</label>
                                      <div class="col-sm-7">
                                          <input class="form-control" name="allocate_share_no_of_share" id="allocate_share_no_of_share" type="text">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-4 control-label">Pay Mode </label>
                                      <div class="col-sm-7">
                                          <select class="form-control" name="allocate_share_payment_mode" id="allocate_share_payment_mode">
                                          <option value=""></option>
                                          <option selected="selected" value="Cash">Cash</option>
                                          <option value="Cheque">Cheque</option>
                                          <option value="Online Transfer">Online Transfer</option>
                                          </select>
                                      </div>
                                  </div>
                                
                  
                                  <div id="AllocateShareMemberCreation_OnlineDetailDiv" class="displaynone">
                                      <div class="form-group">
                                          <label class="col-sm-4 control-label">Reference No.<span class="requiredfield">*</span></label>
                                          <div class="col-sm-7">
                                              <input class="form-control" maxlength="50" name="allocate_share_ref_no" type="text">
                                          </div>
                                      </div>
                                  </div>
                  
                                
                              </div>
                  
                              <div class="col-md-6">
                                      <h4><strong>MemberShip Fees: </strong></h4>
                  
                                      <div class="form-group">
                                          <label class="col-sm-4 control-label">MemberShip Fee</label>
                                          <div class="col-sm-7">
                                              <input class="form-control" name="member_ship_fees_amount" id = "member_ship_fees_amount" type="text">
                                          </div>
                                      </div>
                  
                  
                                      <div class="form-group">
                                          <label class="col-sm-4 control-label">Pay Mode</label>
                                          <div class="col-sm-7">
                                              <select class="form-control" name="member_ship_payment_mode" id="member_ship_payment_mode">
                                              <option value=""></option>
                                              <option selected="selected" value="Cash">Cash</option>
                                              <option value="Cheque">Cheque</option>
                                              <option value="Online Transfer">Online Transfer</option>
                                              </select>
                                          </div>
                                      </div>
                  
                                   
                  
                                      <div id="MemberShipFees_OnlineDetailDiv" class="displaynone">
                                          <div class="form-group">
                                              <label class="col-sm-4 control-label">Reference No.<span class="requiredfield">*</span></label>
                                              <div class="col-sm-7">
                                                  <input class="form-control" name="member_ship_ref_no" type="text">
                                              </div>
                                          </div>
                                      </div>
                  
                                     
                                  </div>
                  
                  
                                
                               
                  
                                </div>
                              </div>
                              <div class="box-footer">
                                <div class="col-xs-12 text-center ">
                                  <div class="form-group">
                                     <input type="submit" value="Update" class="btn btn-flat btn-success"/>
                                    <a class="btn btn-flat btn-danger" href="{{route('admin.customer.index')}}">Cancel</a>
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
                          
        </div>
    </div>
</div>
</div>
  </div>
  <script>
      
       document.getElementById("mobile_no").addEventListener("input", function () {
  let mobileInput = this.value.trim();
  let errorDiv = document.getElementById("mobile_error");

  // Remove non-numeric characters
  this.value = this.value.replace(/\D/g, '');

  // Mobile number validation: Exactly 10 digits & starts with 6-9
  let mobilePattern = /^[6-9]\d{9}$/;

  if (!mobilePattern.test(this.value)) {
    this.classList.add("is-invalid");
    errorDiv.style.display = "block";
    errorDiv.innerText = "Please enter a valid 10-digit mobile number starting with 6-9.";
  } else {
    this.classList.remove("is-invalid");
    errorDiv.style.display = "none";
  }
});
  </script>
</section>
