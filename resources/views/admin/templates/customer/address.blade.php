<section class="content-header">
  <h1> Address Detail <small>[{{$row['residense_type']}}]</small>
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
      <a href="{{route('admin.customer.edit',array('id' => $row['customer_id']))}}">Customer View</a>
    </li>
    <li class="active">Address Detail</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      
    <form id="update_form_address" method="post" name="update_form_address" >
    {{csrf_field()}}
    <input type="hidden" name="update_id" id="update_id" value="{{$row['customer_id']}}" />

      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="">
            <a href="{{ route('admin.customer.manage',array('id' => $row['customer_id'])) }}">Basic Detail</a>
          </li>
          <li class="active"><a href="{{ route('admin.customer.address',array('id' => $row['customer_id'])) }}" data-toggle="tab" aria-expanded="true">Address</a></li>
          <li class=""><a href="{{ route('admin.customer.bankDetail',array('id' => $row['customer_id'])) }}">Bank Detail</a></li>
          <li class=""><a href="{{ route('admin.customer.professionDetail',array('id' => $row['customer_id'])) }}">Employement Detail</a></li>
          <li class=""><a href="{{ route('admin.customer.electricBillDetail',array('id' => $row['customer_id'])) }}">Electricity Bill Detail</a></li>
          <li class=""><a href="{{ route('admin.customer.mMemberNominee',array('id' => $row['customer_id'])) }}">Nominee </a></li>
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
                      <select class="form-control required" id="residense_type" name="residense_type">
                        <option value="">Select Resident Status</option>
                        <option <?php if($row['residense_type'] == 'resident') { echo "selected"; } ?> value="resident">Resident</option>
                        <option <?php if($row['residense_type'] == 'non_resident') { echo "selected"; } ?> value="non_resident">Non-Resident</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Duration of stay at present address</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="stability" maxlength="20" name="stability" type="text" autocomplete="off" value="{{$row['stability']}}">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <h4>Present Address:</h4>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Residence Type <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <select class="form-control  required" id="present_residence_type" name="present_residence_type">
                        <option value="">Select Residence Type</option>
                        <option <?php if($row['present_residence_type'] == 'owned') { echo "selected"; } ?> value="owned">Owned</option>
                        <option <?php if($row['present_residence_type'] == 'rented') { echo "selected"; } ?> value="rented">Rented</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Address1 <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <input class="form-control required" id="present_address1" maxlength="100" name="present_address1" type="text" autocomplete="off" value="{{$row['present_address1']}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Address2/Landmark</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="present_address2" maxlength="100" name="present_address2" type="text"  autocomplete="off" value="{{$row['present_address2']}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Ward </label>
                    <div class="col-sm-7">
                      <input class="form-control" id="present_ward" maxlength="100" name="present_ward" type="text" value="{{$row['present_ward']}}" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Area</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="present_area" maxlength="100" value="{{$row['present_area']}}" name="present_area" type="text" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">State <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <select class="form-control" id="present_state_id" name="present_state_id" tabindex="-1" aria-hidden="true" onchange="present_getCity_ByState()">
                        <option value="">Select State</option>
                        @foreach ($states as $key => $state)
                          <option <?php if($row['present_state_id'] == $state['id']) { echo "selected"; } ?> value="{{$state['id']}}">{{$state['title']}}</option>  
                        @endforeach
                        
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">City <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <select class="form-control"  id="present_city_id" name="present_city_id" tabindex="-1" aria-hidden="true">
                        <option>Select City</option>
                        @foreach($present_cities as $key => $present_city)
                          <option <?php if($row['present_city_id'] == $present_city['id']) { echo "selected"; } ?> value="{{$present_city['id']}}">{{$present_city['title']}}</option>  
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">PIN Code <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <input class="form-control"  id="present_pin_code" value="{{$row['present_pin_code']}}" maxlength="6" name="present_pin_code" type="text" autocomplete="off">
                     
                    </div>
                  </div>
                </div>


                <div class="col-md-6">
                  <h4>Permanent Address: &nbsp; <a class="btn btn-primary btn-xs" onclick="CopyAddress();">Copy present address</a>
                  </h4>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Residence Type <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <select class="form-control  required" id="permanent_residence_type" name="permanent_residence_type">
                        <option value=""></option>
                        <option <?php if($row['permanent_residence_type'] == 'owned') { echo "selected"; } ?> value="owned">Owned</option>
                        <option <?php if($row['permanent_residence_type'] == 'rented') { echo "selected"; } ?> value="rented">Rented</option>
                      </select>
                     
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Address1 <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <input class="form-control" id="permanent_address1" value="{{$row['permanent_address1']}}" maxlength="100" name="permanent_address1" type="text" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Address2/Landmark</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="permanent_address2" value="{{$row['permanent_address2']}}" maxlength="100" name="permanent_address2" type="text" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Ward </label>
                    <div class="col-sm-7">
                      <input class="form-control" id="permanent_ward" value="{{$row['permanent_ward']}}" maxlength="100" name="permanent_ward" type="text" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Area</label>
                    <div class="col-sm-7">
                      <input class="form-control" id="permanent_area" value="{{$row['permanent_area']}}" maxlength="100" name="permanent_area" type="text" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">State <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <select class="form-control" id="permanent_state_id" name="permanent_state_id" tabindex="-1" aria-hidden="true" onchange="permanent_getCity_ByState()">
                        <option value="">Select State</option>
                        @foreach ($states as $key => $state)
                          <option <?php if($row['permanent_state_id'] == $state['id']) { echo "selected"; } ?> value="{{$state['id']}}">{{$state['title']}}</option>  
                        @endforeach
                      </select>
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">City <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <select class="form-control"  id="permanent_city_id" name="permanent_city_id">
                         <option>Select City</option>
                         @foreach($permanent_cities as $key => $permanent_city)
                          <option <?php if($row['permanent_city_id'] == $permanent_city['id']) { echo "selected"; } ?> value="{{$permanent_city['id']}}">{{$permanent_city['title']}}</option>  
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">PIN Code <span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                      <input class="form-control required" data-val="true" value="{{$row['permanent_pin_code']}}" id="permanent_pin_code" maxlength="6" name="permanent_pin_code" type="text"  autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <div class="col-xs-12 text-center ">
                <div class="form-group">
                  <button type="button" onclick="update_address()"  class="btn btn-flat btn-success">SAVE</button>
                  <a class="btn btn-flat btn-danger" href="{{route('admin.customer.edit',array('id' => $row['customer_id']))}}">Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>



    </div>
  </div>
</section>