
<section class="content-header">
    <h1>
        Director Promoters
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.director_promoters.index')}}">Director Promoters List</a></li>
        <li class="active">Director Promoters View</li>
        
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
  
  <div class="tab-content">
      <div class="tab-pane active" id="memberinfo">
   <form id="update_form" method="post" name="update_form" >
    {{csrf_field()}}
    <input type="hidden" name="update_id" id="update_id" value="{{$row['customer_id']}}" />
           <div class="box-body">
              <div class="form-horizontal">

                  <div class="col-sm-4">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Is Director</label>
                        <div class="col-sm-7 checkbox">
                            <input <?php if($row['is_director'] == 'yes') { echo "checked"; } ?> class="checkbox" id="is_director" name="is_director" type="checkbox" value="yes" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Is Promoter</label>
                        <div class="col-sm-7 checkbox">
                            <input <?php if($row['is_promoters'] == 'yes') { echo "checked"; } ?> class="checkbox" id="is_promoters" name="is_promoters" type="checkbox" value="yes" autocomplete="off">
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Enrollment Date <span class="requiredfield">*</span></label>
                    <div class="col-sm-7">
                      <div class="mb-3">
                            <input type="date" id="joining_date" name="joining_date" value="{{$row['joining_date']}}"  class="form-control" required />
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Customer's Name {{$row->prifix_name}}</label>
                    <div class="col-sm-7">
                      <div class="input-group">
                        <div class="input-group-addon padding-0" style="padding:0px;">
                          <select  id="prifix_name" name="prifix_name" style="height: 32px;background-color: #fff !important;">
                            <option value=""></option>
                            <option <?php if($row['prifix_name'] == 'mr.') { echo "selected"; } ?> value="mr.">Mr.</option>
                            <option <?php if($row['prifix_name'] == 'ms.') { echo "selected"; } ?> value="ms.">Ms.</option>
                            <option <?php if($row['prifix_name'] == 'mrs.') { echo "selected"; } ?> value="mrs.">Mrs.</option>
                            <option <?php if($row['prifix_name'] == 'master.') { echo "selected"; } ?> value="master">Master</option>
                            <option <?php if($row['prifix_name'] == 'shri.') { echo "selected"; } ?> value="shri">Shri</option>
                            <option <?php if($row['prifix_name'] == 'smt.') { echo "selected"; } ?> value="smt.">Smt.</option>
                            <option <?php if($row['prifix_name'] == 'dr.') { echo "selected"; } ?> value="dr.">Dr.</option>
                          </select>
                        </div>
                        <input class="form-control"id="name" maxlength="50" name="name" value="{{$row['name']}}" type="text" autocomplete="off">
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
                        <option <?php if($row['gender'] == 'male') { echo "selected"; } ?> value="male">Male</option>
                        <option <?php if($row['gender'] == 'female') { echo "selected"; } ?> value="female">Female</option>
                        <option <?php if($row['gender'] == 'transgender') { echo "selected"; } ?> value="transgender">Transgender</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Date of Birth</label>
                    <div class="col-sm-7">
                        <div class="mb-3">
                            <input type="date" id="dob" name="dob"  class="form-control" value="{{$row['dob']}}" />
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Age</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="age" maxlength="100" name="age" type="text" value="{{$row['age']}}" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Marital Status <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <select class="form-control" id="marital_status" name="marital_status">
                        <option value="">select Marital Status</option>
                        <option <?php if($row['marital_status'] == 'married') { echo "selected"; } ?> value="married">Married</option>
                        <option <?php if($row['marital_status'] == 'unMarried') { echo "selected"; } ?> value="unMarried">UnMarried</option>
                        <option <?php if($row['marital_status'] == 'single') { echo "selected"; } ?> value="single">Single</option>
                        <option <?php if($row['marital_status'] == 'widow/widower') { echo "selected"; } ?> value="widow/widower">Widow/Widower</option>
                        <option <?php if($row['marital_status'] == 'divorced') { echo "selected"; } ?> value="divorced">Divorced</option>
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
                        <input class="form-control" id="mobile" maxlength="10" name="mobile" type="number" value="{{$row['mobile']}}" autocomplete="off">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Alternate Mobile No </label>
                    <div class="col-sm-7">
                      <div class="mb-3">
                        <input class="form-control" value="{{$row['alternate_mobile']}}" id="alternate_mobile" maxlength="15" name="alternate_mobile" type="number" autocomplete="off">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Email Address</label>
                    <div class="col-sm-7">
                      <input class="form-control"  maxlength="100" name="email" type="text" value="{{$row['email']}}" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Relative's Name</label>
                    <div class="col-sm-7">
                      <div class="input-group">
                        <div class="input-group-addon padding-0" style="padding:0px;">
                          <select  id="relative_relation" name="relative_relation" style="height: 32px;background-color: #fff !important;">
                            <option value="">Select</option>
                            <option <?php if($row['relative_relation'] == 'Father') { echo "selected"; } ?> value="Father">Father</option>
                            <option <?php if($row['relative_relation'] == 'Mother') { echo "selected"; } ?> value="Mother">Mother</option>
                            <option <?php if($row['relative_relation'] == 'Husband') { echo "selected"; } ?> value="Husband">Husband</option>
                            <option <?php if($row['relative_relation'] == 'Spouse') { echo "selected"; } ?> value="Spouse">Spouse</option>
                          </select>
                        </div>
                        <input class="form-control"id="relative_name" maxlength="50" name="relative_name" type="text" autocomplete="off" value="{{$row['relative_name']}}">
                      </div>
                      
                    </div>
                  </div>
                </div>
               
               <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Mother's Name</label>
                    <div class="col-sm-7">
                      <input class="form-control"  id="mother_Name" maxlength="30" name="mother_Name" type="text"  autocomplete="off" value="{{$row['mother_Name']}}">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Religion</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="religion" maxlength="20" name="religion" type="text" autocomplete="off" value="{{$row['religion']}}">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Cast</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="member_cast" maxlength="20" name="member_cast" type="text" autocomplete="off"  value="{{$row['member_cast']}}">
                    </div>
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">DIN</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="din" maxlength="20" name="din" type="text" autocomplete="off" value="{{$row['din']}}">
                    </div>
                  </div>
                </div>

                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Appointment Date <span class="requiredfield">*</span></label>
                    <div class="col-sm-7">
                      <div class="mb-3">
                            <input type="date" id="appointment_date" name="appointment_date"  class="form-control" value="{{$row['appointment_date']}}" required />
                        </div>
                    </div>
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Class <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <select class="form-control" id="class_id" name="class_id">
                        <option value="">Select Class</option>
                        <?php foreach($Classes as $key=>$Classe){ ?>
                            <option <?php if($Classe['id'] == $row['class_id']) { echo "selected"; } ?> value="{{$Classe['id']}}">{{$Classe['title']}}</option>
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
                            <input class="form-control" id="latitude" maxlength="50" name="latitude" type="text"  autocomplete="off" value="{{$row['latitude']}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Longitude</label>
                        <div class="col-sm-7">
                            <input class="form-control" id="longitude" maxlength="50" name="longitude" type="text" autocomplete="off" value="{{$row['longitude']}}">
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
                      <input class="form-control" id="aadharcard_no" maxlength="12" name="aadharcard_no" type="text" autocomplete="off" value="{{$row['aadharcard_no']}}">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">PAN</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="pan" maxlength="10" name="pan" onkeyup="this.value = this.value.toUpperCase();" type="text"  autocomplete="off" value="{{$row['pan']}}">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Voter ID No</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="voter_id_no" maxlength="30" name="voter_id_no" type="text" autocomplete="off" value="{{$row['voter_id_no']}}">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Ration Card No</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="ration_card_no" maxlength="30" name="ration_card_no" type="text"  autocomplete="off" value="{{$row['ration_card_no']}}">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Driving License No</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="driving_license_no" maxlength="30" name="driving_license_no" type="text" autocomplete="off" value="{{$row['driving_license_no']}}">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Passport No</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="passport_no" maxlength="30" name="passport_no" type="text" value="{{$row['passport_no']}}"  autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
              
             

              </div>
            </div>
            <div class="box-footer">
              <div class="col-xs-12 text-center ">
                <div class="form-group">
                   <input type="button" onclick="update_row()" value="Save" class="btn btn-flat btn-success"/>
                  <a class="btn btn-flat btn-danger" href="{{route('admin.director_promoters.index')}}">Cancel</a>
                </div>
              </div>
            </div> 

             </form>
                            
          </div>
      </div>
  </div>
</div>
</section>
