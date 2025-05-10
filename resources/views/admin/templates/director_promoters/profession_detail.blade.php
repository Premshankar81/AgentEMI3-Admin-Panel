<section class="content-header">
  <h1> Employement Detail </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('admin.customer.index')}}">Director/Promoters List</a></li>
    <li><a href="{{route('admin.director_promoters.view',array('id' => $row['customer_id']))}}">Director/Promoters View</a></li>
    <li class="active">Employement Detail</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="nav-tabs-custom">
       
    <form id="update_form_professionDetail" method="post" name="update_form_professionDetail" >
    {{csrf_field()}}
    <input type="hidden" name="update_id" id="update_id" value="{{$row['customer_id']}}" />
        <div class="tab-content">
          <div class="tab-pane active" id="memberinfo">
            <div class="box-body">
              <div class="form-horizontal">
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Occupation</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="cust_prof_occupation" maxlength="30" name="cust_prof_occupation" type="text" autocomplete="off" value="{{$row['cust_prof_occupation']}}">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Employement Type <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <select class="form-control " id="cust_prof_type" name="cust_prof_type">
                        <option value="">Select Employement Type</option>
                        <option <?php if($row['cust_prof_type'] == 'house_wife') { echo "selected"; } ?> value="house_wife">House-Wife</option>
                        <option <?php if($row['cust_prof_type'] == 'retired') { echo "selected"; } ?> value="retired">Retired</option>
                        <option <?php if($row['cust_prof_type'] == 'salaried') { echo "selected"; } ?> value="salaried">Salaried</option>
                        <option  <?php if($row['cust_prof_type'] == 'self_employed_professional') { echo "selected"; } ?> value="self_employed_professional">Self Employed Professional</option>
                        <option <?php if($row['cust_prof_type'] == 'self_employed') { echo "selected"; } ?> value="self_employed">Self-Employed</option>
                        <option <?php if($row['cust_prof_type'] == 'student') { echo "selected"; } ?> value="student">Student</option>
                        <option <?php if($row['cust_prof_type'] == 'not_employed') { echo "selected"; } ?> value="not_employed">Not-Employed</option>
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
                      <input class="form-control" id="cust_prof_business" maxlength="50" value="{{$row['cust_prof_business']}}" name="cust_prof_business" type="text" value="" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Address1</label>
                    <div class="col-sm-7">
                      <input class="form-control " id="cust_prof_address1" maxlength="100" value="{{$row['cust_prof_address1']}}" name="cust_prof_address1" type="text" autocomplete="off">
                      
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Address2</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="cust_prof_address2" maxlength="100" value="{{$row['cust_prof_address2']}}" name="cust_prof_address2" type="text" value="" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">State </label>
                    <div class="col-sm-7">
                      <select class="form-control" id="cust_prof_state_id" name="cust_prof_state_id" tabindex="-1" aria-hidden="true" onchange="cust_prof_getCity_ByState()">
                        <option value="">Select State</option>
                        @foreach ($states as $key => $state)
                          <option <?php if($row['cust_prof_state_id'] == $state['id']) { echo "selected"; } ?> value="{{$state['id']}}">{{$state['title']}}</option>  
                        @endforeach
                        
                      </select>
                     
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">District</label>
                    <div class="col-sm-7">
                      <select class="form-control"  id="cust_prof_city_id" name="cust_prof_city_id" tabindex="-1" aria-hidden="true">
                        <option>Select City</option>
                        @foreach($cities as $key => $present_city)
                          <option <?php if($row['cust_prof_city_id'] == $present_city['id']) { echo "selected"; } ?> value="{{$present_city['id']}}">{{$present_city['title']}}</option>  
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">PIN Code</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="cust_prof_pin_code" maxlength="6" value="{{$row['cust_prof_pin_code']}}"  name="cust_prof_pin_code" type="text" value="" autocomplete="off">
                    </div>
                  </div>
                </div>
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Monthly Income (Net)</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="cust_prof_monthly_income" value="{{$row['cust_prof_monthly_income']}}" maxlength="30" name="cust_prof_monthly_income" type="text" value="" autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <div class="col-xs-12 text-center ">
                <div class="form-group">
                  <button type="button" onclick="update_professionDetail()" class="btn btn-flat btn-success">SAVE</button>
                  <a class="btn btn-flat btn-danger" href="{{route('admin.director_promoters.view',array('id' => $row['customer_id']))}}">Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </form>


      </div>
    </div>
  </div>
</section>