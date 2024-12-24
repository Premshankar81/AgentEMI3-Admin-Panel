<section class="content-header">
    <h1>
        Agent/Advisor
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.agents.index')}}">Agents/Advisors</a></li>
        <li class="active">Agents/Advisor</li>
    </ol>
</section>
<section class="content">
<!-- Default box -->

 <form id="add_form" method="post" name="add_form" >
    {{csrf_field()}}
<div class="box box-solid">
    <div class="box-header">
    </div>
    <div class="box-body">
        <div class="form-horizontal">
           
           
            <input id="ProfilePicPath" name="ProfilePicPath" type="hidden" value="" autocomplete="off">
            <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Agent Code</label>
                            <div class="col-sm-7">
                                <input class="form-control" id="agent_code" maxlength="100" name="agent_code" type="text" >
                                
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
                                    <option data-closing_balance="{{$Member['closing_balance']}}"  value="{{$Member['id']}}">{{$Member['name']}}</option>    
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
                                    <input class="form-control" id="join_date" name="join_date" type="date">
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
                                <option value="male">Male</option>
                                <option value="female">Female</option>
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
                                              <option value="mr.">Mr.</option>
                                              <option value="ms.">Ms.</option>
                                              <option value="mrs.">Mrs.</option>
                                              <option value="master">Master</option>
                                              <option value="shri">Shri</option>
                                              <option value="smt.">Smt.</option>
                                              <option value="dr.">Dr.</option>
                                            </select>
                                          </div>
                                          <input class="form-control" id="name" maxlength="50" name="name" type="text" autocomplete="off">
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
                                            <option value="{{$agentRank->id}}">{{$agentRank->title}}</option>
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
                                        <input class="form-control" id="address_first" maxlength="100" name="address_first" type="text" value="" autocomplete="off">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Address2</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="address_second" maxlength="100" name="address_second" type="text" >
                                       
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
                                              <option value="{{$state['id']}}">{{$state['title']}}</option>  
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
                                      
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">PIN Code</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="pincode" maxlength="6" name="pincode" type="text">
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
                                            <input class="form-control" name="dob" type="date" >

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
                                          <option value="A+">A+</option>
                                          <option value="A-">A-</option>
                                          <option value="B+">B+</option>
                                          <option value="B-">B-</option>
                                          <option value="O+">O+</option>
                                          <option value="O-">O-</option>
                                          <option value="AB+">AB+</option>
                                          <option value="AB-">AB-</option>
                                          </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Occupation</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="occupation" maxlength="30" name="occupation" type="text" value="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Mobile No</label>
                                    <div class="col-sm-7">
                                        <div class="input-group date">
                                            <div class="input-group-addon">+91</div>
                                            <input class="form-control" id="mobile" maxlength="10" name="mobile" type="number">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Email Address</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="email" name="email" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">AADHAR No</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="aadhar_no" maxlength="12" name="aadhar_no" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">PAN</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="pan" maxlength="10" name="pan" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Father's Name</label>
                                    <div class="col-sm-7">
                                        <input class="form-control"id="father_name" maxlength="100" name="father_name" type="text">
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Spouse Name</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="spouse_name" maxlength="100" name="spouse_name" type="text" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Designation</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="designation" maxlength="50" name="designation" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">IFS Code</label>
                                    <div class="col-sm-7">
                                        <input class="form-control"id="ifsc_code" maxlength="40" name="ifsc_code"  type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Bank Name</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="bank_name" maxlength="40" name="bank_name" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Account Type </label>
                                    <div class="col-sm-7">
                                        <select class="form-control "id="account_type" name="account_type">
                                          <option value="">Select Account Type</option>
                                          <option value="saving">Saving</option>
                                          <option value="current">Current</option>
                                          </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Account Number</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="account_no" maxlength="20" name="account_no" type="text">
                                    </div>
                                </div>
                            </div>

                           <div class="col-sm-6">
<div class="form-group">
<label class="col-sm-4 control-label">Image Upload</label>
    <div class="col-sm-7 checkbox">
         <input class="form-control " type="file" name="profile_img"  id="formFile" onchange="readURLImage(this,'image_preview')" >
         <img id="image_preview" src="{{config('constants.DEFAULT_IMAGE')}}" class="figure-img img-fluid rounded mt-1 img-thumbnail"  />
        

    </div>
</div>
</div>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <div class="col-xs-12 text-center">
                        <div class="form-group">
                            <button type="submit" class="btn btn-flat btn-success">SAVE</button>
                            <a class="btn btn-flat btn-danger" href="{{route('admin.agents.index')}}">Cancel</a>
                        </div>
                    </div>
                </div>

            </div>
</form>

        </section>