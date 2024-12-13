
<section class="content-header">
    <h1>
        Update Agent/Advisor
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.agents.view',array('id' => $row['unique_code']))}}">Agent/Advisor List</a></li>
        <li class="active">Agent/Advisor View</li>
        
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
    <input type="hidden" name="update_id" id="update_id" value="{{$row['unique_code']}}" />
           <div class="box-body">
             
              <div class="form-horizontal">
           
           
            <input id="ProfilePicPath" name="ProfilePicPath" type="hidden" value="" autocomplete="off">
            <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Agent Code</label>
                            <div class="col-sm-7">
                                <input class="form-control" id="agent_code" maxlength="100" name="agent_code" type="text" value="{{$row['agent_code']}}">
                                
                            </div>
                        </div>
                    </div>

                <div class="clearfix"></div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Associate Customer</label>
                        <div class="col-sm-7">
                             <select id="associate_customer_id" name="associate_customer_id" class="form-control" required onchange="get_MemberInfo()">
                                <option value="">Select Customer</option>
                                @foreach($Members as $key => $Member)
                                    <option <?php if($row['associate_customer_id'] == $Member['id']) { echo "selected"; } ?> value="{{$Member['id']}}">{{$Member['name']}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-sm-4 control-label">Date of Joining<span class="requiredfield">*</span></label>
                          <div class="col-sm-7">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input class="form-control" id="join_date" name="join_date" type="date" value="{{$row['join_date']}}">
                                </div>
                              </div>
                      </div>
                  </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Gender </label>
                            <div class="col-sm-7">
                                <select class="form-control"  id="gender" name="gender">
                                <option value="">Select Gender</option>
                                <option <?php if($row['gender'] == 'male') { echo "selected"; } ?> value="male">Male</option>
                                <option <?php if($row['gender'] == 'female') { echo "selected"; } ?> value="female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>

                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-sm-4 control-label">Agent's Name</label>
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
                                <input class="form-control" id="name" maxlength="50" name="name" type="text" autocomplete="off" value="{{$row['name']}}">
                              </div>
                          </div>
                      </div>
                  </div>

      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Agent Rank</label>
              <div class="col-sm-7">
                   <select class="form-control" id="agent_rank_id" name="agent_rank_id"> 
                    <option value="">--Select Agent Rank--</option>
                    @foreach ($agentRanks as $key => $agentRank)
                      <option <?php if($agentRank->id == $row['agent_rank_id']) { echo "selected"; } ?> value="{{$agentRank->id}}">{{$agentRank->title}}</option>
                    @endforeach
                    </select>
              
              </div>
          </div>
      </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Up line Agent</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" id="up_line_agent_id" name="up_line_agent_id">
                                          <option value="">--Select Upline Agent--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Address1</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="address_first" maxlength="100" name="address_first" type="text" value="{{$row['address_first']}}">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Address2</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="address_second" maxlength="100" name="address_second" type="text" value="{{$row['address_second']}}">
                                       
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">State <span class="requiredfield">*</span></label>
                                    <div class="col-sm-7">
                                        <select class="form-control" id="state_id" name="state_id" tabindex="-1" aria-hidden="true" onchange="getCity_ByState()">
                                            <option value="">Select State</option>
                                            @foreach ($states as $key => $state)
                                              <option <?php if($row['state_id'] == $state['id']) { echo "selected"; } ?> value="{{$state['id']}}">{{$state['title']}}</option>  
                                            @endforeach
                                            
                                          </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">District <span class="requiredfield">*</span></label>
                                    <div class="col-sm-7">
                                      <select class="form-control"  id="city_id" name="city_id" tabindex="-1" aria-hidden="true">
                                      <option>Select City</option>
                                      @foreach($cities as $key => $city)
                                      <option <?php if($row['city_id'] == $city['id']) { echo "selected"; } ?> value="{{$city['id']}}">{{$city['title']}}</option>  
                                    @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">PIN Code</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="pincode" maxlength="6" name="pincode" type="text" value="{{$row['pincode']}}">
                                    </div>
                                </div>
                            </div>

<div class="col-md-6">
    <div class="form-group">
        <label class="col-sm-4 control-label">Date of Birth</label>
        <div class="col-sm-7">
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input class="form-control" name="dob" id="dob" type="date" value="{{$row['dob']}}">

            </div>
        </div>
    </div>
</div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label class="col-sm-4 control-label">Blood Group </label>
                      <div class="col-sm-7">
                          <select class="form-control " id="blood_group" name="blood_group">
                            <option value="">Select Blood Group</option>
                            <option <?php if($row['blood_group'] == 'A+') { echo "selected"; } ?>  value="A+">A+</option>
                            <option <?php if($row['blood_group'] == 'A-') { echo "selected"; } ?> value="A-">A-</option>
                            <option <?php if($row['blood_group'] == 'B+') { echo "selected"; } ?> value="B+">B+</option>
                            <option <?php if($row['blood_group'] == 'B-') { echo "selected"; } ?> value="B-">B-</option>
                            <option <?php if($row['blood_group'] == 'O+') { echo "selected"; } ?> value="O+">O+</option>
                            <option <?php if($row['blood_group'] == 'O-') { echo "selected"; } ?> value="O-">O-</option>
                            <option <?php if($row['blood_group'] == 'AB+') { echo "selected"; } ?> value="AB+">AB+</option>
                            <option <?php if($row['blood_group'] == 'AB-') { echo "selected"; } ?>value="AB-">AB-</option>
                            </select>
                      </div>
                  </div>
              </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Occupation</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" value="{{$row['occupation']}}" id="occupation" maxlength="30" name="occupation" type="text" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Mobile No</label>
                                    <div class="col-sm-7">
                                        <div class="input-group date">
                                            <div class="input-group-addon">+91</div>
                                            <input class="form-control" value="{{$row['mobile']}}" id="mobile" maxlength="10" name="mobile" type="number">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Email Address</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="email"  value="{{$row['email']}}" name="email" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">AADHAR No</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="aadhar_no"  value="{{$row['aadhar_no']}}" maxlength="12" name="aadhar_no" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">PAN</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="pan" value="{{$row['pan']}}"  maxlength="10" name="pan" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Father's Name</label>
                                    <div class="col-sm-7">
                                        <input class="form-control"id="father_name"  value="{{$row['father_name']}}" maxlength="100" name="father_name" type="text">
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Spouse Name</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="spouse_name"  value="{{$row['spouse_name']}}" maxlength="100" name="spouse_name" type="text" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Designation</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="designation"  value="{{$row['designation']}}" maxlength="50" name="designation" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">IFS Code</label>
                                    <div class="col-sm-7">
                                        <input class="form-control"id="ifsc_code" value="{{$row['ifsc_code']}}"  maxlength="40" name="ifsc_code"  type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Bank Name</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="bank_name" value="{{$row['bank_name']}}"  maxlength="40" name="bank_name" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Account Type </label>
                                    <div class="col-sm-7">
                                        <select class="form-control "id="account_type" name="account_type">
                                          <option value="">Select Account Type</option>
                                          <option <?php if($row['account_type'] == 'saving') { echo "selected"; } ?>  value="saving">Saving</option>
                                          <option <?php if($row['account_type'] == 'current') { echo "selected"; } ?> value="current">Current</option>
                                          </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Account Number</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="account_no" maxlength="20" name="account_no" type="text" value="{{$row['account_no']}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Is Active</label>
                                    <div class="col-sm-7 checkbox">
                                        <select class="form-control" data-trigger name="status" id="status">
                                              <option <?php if($row['status'] == 'active') { echo "selected"; } ?> value="active">Active</option>
                                              <option <?php if($row['status'] == 'inactive') { echo "selected"; } ?> value="inactive">Inactive</option>
                                          </select>
                                    </div>
                                </div>
                            </div>

<div class="col-sm-6">
<div class="form-group">
<label class="col-sm-4 control-label">Image Upload</label>
    <div class="col-sm-7 checkbox">
         <input class="form-control " type="file" name="profile_img"  id="formFile" onchange="readURLImage(this,'image_preview')" >
        
        @if($row['profile_img'] != '')
            <img id="image_preview" src="{{config('constants.PROFILE_IMG').$row['profile_img']}}" class="figure-img img-fluid rounded mt-1 img-thumbnail"  />
        @else
            <img id="image_preview" src="{{config('constants.DEFAULT_IMAGE')}}" class="figure-img img-fluid rounded mt-1 img-thumbnail"  />
        @endif
        

    </div>
</div>
</div>

                              

                        </div>
                    </div>


            </div>
            <div class="box-footer">
              <div class="col-xs-12 text-center ">
                <div class="form-group">
                   <input type="button" onclick="update_row()" value="Save" class="btn btn-flat btn-success"/>
                  <a class="btn btn-flat btn-danger" href="{{route('admin.agents.view',array('id' => $row['unique_code']))}}">Cancel</a>
                </div>
              </div>
            </div> 

             </form>
                            
          </div>
      </div>
  </div>
</div>
</section>
