<section class="content-header">
  <h1> Promoter/Director 
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="\Home\Index">
        <i class="fa fa-dashboard"></i> Dashboard </a>
    </li>
    <li>
      <a href="{{route('admin.director_promoters.index')}}">Promoter/Director</a>
    </li>
    <li class="active">Promoter/Director</li>
  </ol>
</section>
<section class="content">
  <form id="add_form" method="POST" name="add_form" >
    {{csrf_field()}}
  <div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
       
        <div class="tab-content">
          <div class="tab-pane active" id="memberinfo">
           
            <div class="box-body">
              <div class="form-horizontal">

                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Is Director</label>
                        <div class="col-sm-7 checkbox">
                            <input class="checkbox" id="is_director" name="is_director" type="checkbox" value="yes" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Is Promoter</label>
                        <div class="col-sm-7 checkbox">
                            <input class="checkbox" id="is_promoters" name="is_promoters" type="checkbox" value="yes" autocomplete="off">
                        </div>
                    </div>
                </div>
                
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Enrollment Date <span class="requiredfield">*</span></label>
                    <div class="col-sm-7">
                      <div class="mb-3">
                            <input type="date" id="joining_date" name="joining_date"  class="form-control" required />
                        </div>
                    </div>
                  </div>
                </div>

                

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Promoter/Director's Name</label>
                    <div class="col-sm-7">
                      <div class="input-group">
                        <div class="input-group-addon padding-0" style="padding:0px;">
                          <select  id="prifix_name" name="prifix_name" style="height: 32px;background-color: #fff !important;">
                            <option value=""></option>
                            <option value="mr.">Mr.</option>
                            <option value="ms.">Ms.</option>
                            <option value="mrs.">Mrs.</option>
                            <option value="master">Master</option>
                            <option value="shri">Shri</option>
                            <option value="smt.">Smt.</option>
                            <option value="dr.">Dr.</option>
                          </select>
                        </div>
                        <input class="form-control"id="name" maxlength="50" name="name" type="text" autocomplete="off">
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
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="transgender">Transgender</option>
                      </select>
                    </div>
                  </div>
                </div>
                
               
                
                
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Date of Birth</label>
                    <div class="col-sm-7">
                        <div class="mb-3">
                            <input type="date" id="dob" name="dob"  class="form-control" required />
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Age</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="age" maxlength="100" name="age" type="text" value="" autocomplete="off">
                      <span class="field-validation-valid" data-valmsg-for="Age" data-valmsg-replace="true"></span>
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
                        <option value="married">Married</option>
                        <option value="unMarried">UnMarried</option>
                        <option value="single">Single</option>
                        <option value="widow/widower">Widow/Widower</option>
                        <option value="divorced">Divorced</option>
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
                        <input class="form-control" id="mobile" maxlength="10" name="mobile" type="number" autocomplete="off">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Alternate Mobile No </label>
                    <div class="col-sm-7">
                      <div class="mb-3">
                        <input class="form-control" id="alternate_mobile" maxlength="15" name="alternate_mobile" type="number" autocomplete="off">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Email Address</label>
                    <div class="col-sm-7">
                      <input class="form-control"  maxlength="100" name="email" type="text" autocomplete="off">
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
                            <option value="Father">Father</option>
                            <option value="Mother">Mother</option>
                            <option value="Husband">Husband</option>
                            <option value="Spouse">Spouse</option>
                          </select>
                        </div>
                        <input class="form-control"id="relative_name" maxlength="50" name="relative_name" type="text" autocomplete="off">
                      </div>
                      
                    </div>
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Mother's Name</label>
                    <div class="col-sm-7">
                      <input class="form-control"  id="mother_Name" maxlength="30" name="mother_Name" type="text"  autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Religion</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="religion" maxlength="20" name="religion" type="text" value="" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Cast</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="member_cast" maxlength="20" name="member_cast" type="text" value="" autocomplete="off">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">DIN</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="din" maxlength="20" name="din" type="text" value="" autocomplete="off">
                    </div>
                  </div>
                </div>

                  <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Appointment Date <span class="requiredfield">*</span></label>
                    <div class="col-sm-7">
                      <div class="mb-3">
                            <input type="date" id="appointment_date" name="appointment_date"  class="form-control" required />
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
                            <option value="{{$Classe['id']}}">{{$Classe['title']}}</option>
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
                            <input class="form-control" id="latitude" maxlength="50" name="latitude" type="text" value="" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Longitude</label>
                        <div class="col-sm-7">
                            <input class="form-control" id="longitude" maxlength="50" name="longitude" type="text" value="" autocomplete="off">
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
                      <input class="form-control" id="aadharcard_no" maxlength="12" name="aadharcard_no" type="text" autocomplete="off">
                      <span class="field-validation-valid" data-valmsg-for="AadharNo" data-valmsg-replace="true"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">PAN</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="pan" maxlength="10" name="pan" onkeyup="this.value = this.value.toUpperCase();" type="text"  autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Voter ID No</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="voter_id_no" maxlength="30" name="voter_id_no" type="text" value="" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Ration Card No</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="ration_card_no" maxlength="30" name="ration_card_no" type="text" value="" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Driving License No</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="driving_license_no" maxlength="30" name="driving_license_no" type="text" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Passport No</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="passport_no" maxlength="30" name="passport_no" type="text" value="" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
              
             

              </div>
            </div>
            <div class="box-footer">
              <div class="col-xs-12 text-center ">
                <div class="form-group">
                   <input type="submit" value="Save" class="btn btn-flat btn-success"/>
                  <a class="btn btn-flat btn-danger" href="{{route('admin.director_promoters.index')}}">Cancel</a>
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
</section>