<section class="content-header">
  <h1> Nominee Detail </h1>
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
    <li class="active">Member Nominee Detail</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class=""><a href="">Basic Detail</a></li>
          <li class=""><a href="{{ route('admin.customer.address',array('id' => $memberId)) }}">Address</a></li>
          <li class=""><a href="{{ route('admin.customer.bankDetail',array('id' => $memberId)) }}">Bank Detail</a></li>
          <li class=""><a href="{{ route('admin.customer.professionDetail',array('id' => $memberId)) }}">Employement Detail</a></li>
          <li class=""><a href="{{ route('admin.customer.electricBillDetail',array('id' => $memberId)) }}">Electricity Bill Detail</a></li>
          <li class="active"><a href="#" data-toggle="tab" aria-expanded="true">Nominee </a></li>
           <li class="">
            <a href="#" style="color:lightgray;cursor:initial;">Upload Documents</a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="memberinfo">
            <div class="box-body">
              
               <form id="update_form_memberinfo" method="POST" name="update_form_memberinfo" action="{{ route('admin.customer.mMemberNominee_update') }}">
              {{csrf_field()}}
              <input type="hidden" name="member_id" id="member_id" value="{{$memberId}}" />

              <div id="items_ui">
              
        
                  
                
                <div id="member_nominee_forimagerow"  class="box-body item-row" style="border-bottom: solid 1px rgba(0, 0, 0, 0.2);">
                  <div class="form-horizontal">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Name <span class="requiredfield">*</span>
                        </label>
                        <div class="col-sm-7">
                          <input class="form-control required"  id="nominee_name" name="nominee_name[]" type="text" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Relation <span class="requiredfield">*</span>
                        </label>
                        <div class="col-sm-7">
                          <select class="form-control required" id="nominee_relation" name="nominee_relation[]" required>
                            <option value="">Select Relation</option>
                            <option value="brother">Brother</option>
                            <option value="brother_in_law">Brother in Law</option>
                            <option value="brother_wife">Brother wife</option>
                            <option value="daughter">Daughter</option>
                            <option value="father">Father</option>
                            <option  value="grand_son">Grand Son</option>
                            <option  value="grand_daughter">Grand Daughter</option>
                            <option  value="husband">Husband</option>
                            <option  value="mother">Mother</option>
                            <option  value="niece">Niece</option>
                            <option  value="nephew">Nephew</option>
                            <option  value="sister">Sister</option>
                            <option  value="sister_in_law">Sister in Law</option>
                            <option  value="son">Son</option>
                            <option  value="spouse">Spouse</option>
                            <option  value="wife">Wife</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">D.O.B. </label>
                          <div class="col-sm-7">
                            
                            <input class="form-control" name="nominee_dob[]" type="date" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Age</label>
                        <div class="col-sm-7">
                          <input class="form-control age" id="nominee_age" maxlength="20" name="nominee_age[]" type="number" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Mobile No</label>
                        <div class="col-sm-7">
                          <input class="form-control" id="nominee_mobile" maxlength="10" name="nominee_mobile[]" type="number" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Address <span class="requiredfield">*</span>
                        </label>
                        <div class="col-sm-7">
                          <input class="form-control required" id="nominee_address" name="nominee_address[]" type="text" required>
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
                          <input class="form-control" id="nominee_aadhar_no" maxlength="12" name="nominee_aadhar_no[]" type="number" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">PAN</label>
                        <div class="col-sm-7">
                          <input class="form-control"  id="nominee_pan" maxlength="10" name="nominee_pan[]" onkeyup="this.value = this.value.toUpperCase();" type="text" required>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Voter ID No</label>
                        <div class="col-sm-7">
                          <input class="form-control"  id="nominee_voter_id" maxlength="30" name="nominee_voter_id[]" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Ration Card No</label>
                        <div class="col-sm-7">
                          <input class="form-control"  id="nominee_ration_card" maxlength="30" name="nominee_ration_card[]" type="text">
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <a class="delete-row deleterow"  id="warrantyclosebuttonimage"  href="javaScript:void(0)">
                        <i class="fa fa-trash-o"></i> Remove Nominee </a>
                    </div>
                  </div>
                </div>

                <div class="box-body item-row" style="border-bottom: solid 1px rgba(0, 0, 0, 0.2);">
                  <div class="form-horizontal">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Name <span class="requiredfield">*</span>
                        </label>
                        <div class="col-sm-7">
                          <input class="form-control required"  id="nominee_name" name="nominee_name[]" type="text" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Relation <span class="requiredfield">*</span>
                        </label>
                        <div class="col-sm-7">
                          <select class="form-control required" id="nominee_relation" name="nominee_relation[]" required>
                            <option value="">Select Relation</option>
                            <option value="brother">Brother</option>
                            <option value="brother_in_law">Brother in Law</option>
                            <option value="brother_wife">Brother wife</option>
                            <option value="daughter">Daughter</option>
                            <option value="father">Father</option>
                            <option value="grand_son">Grand Son</option>
                            <option value="grand_daughter">Grand Daughter</option>
                            <option value="husband">Husband</option>
                            <option value="mother">Mother</option>
                            <option value="niece">Niece</option>
                            <option value="nephew">Nephew</option>
                            <option value="sister">Sister</option>
                            <option value="sister_in_law">Sister in Law</option>
                            <option value="son">Son</option>
                            <option value="spouse">Spouse</option>
                            <option value="wife">Wife</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">D.O.B. </label>
                          <div class="col-sm-7">
                            
                            <input class="form-control" name="nominee_dob[]" type="date" value="" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Age</label>
                        <div class="col-sm-7">
                          <input class="form-control age" id="nominee_age" maxlength="20" name="nominee_age[]" type="number" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Mobile No</label>
                        <div class="col-sm-7">
                          <input class="form-control" id="nominee_mobile" maxlength="10" name="nominee_mobile[]" type="number" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Address <span class="requiredfield">*</span>
                        </label>
                        <div class="col-sm-7">
                          <input class="form-control required" id="nominee_address" maxlength="150" name="nominee_address[]" type="text" required>
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
                          <input class="form-control" id="nominee_aadhar_no" maxlength="12" name="nominee_aadhar_no[]" type="text" value="" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">PAN</label>
                        <div class="col-sm-7">
                          <input class="form-control" id="nominee_pan" maxlength="10" name="nominee_pan[]" onkeyup="this.value = this.value.toUpperCase();" type="text" required>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Voter ID No</label>
                        <div class="col-sm-7">
                          <input class="form-control" id="nominee_voter_id" maxlength="30" name="nominee_voter_id[]" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Ration Card No</label>
                        <div class="col-sm-7">
                          <input class="form-control" id="nominee_ration_card" maxlength="30" name="nominee_ration_card[]" type="text">
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <a class="delete-row deleterow"href="javaScript:void(0)">
                        <i class="fa fa-trash-o"></i> Remove Nominee </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <div class="col-xs-12 text-center">
                  <div class="form-group">
                    <input type="submit"  class="btn btn-flat btn-success"  value="Save" />
                    <a class="btn btn-flat btn-danger" href="#">Cancel</a>
                  </div>
                </div>
              </div>
            </form>




              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td style="width:22%;">
                      <a id="addrow" onclick="add_more_member_nominee();" ref="javascript:void(0);" class="btn btn-flat btn-success">
                        <i class="fa fa-plus-circle"></i> &nbsp;Add More Nominee </a>
                    </td>
                  </tr>
                </tbody>
              </table>
              
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>