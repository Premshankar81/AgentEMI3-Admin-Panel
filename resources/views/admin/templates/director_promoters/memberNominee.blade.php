
<section class="content-header">
  <h1> Member Nominee detail <small>[{{$row['residense_type']}}]</small>
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{route('admin.dashboard')}}">
        <i class="fa fa-dashboard"></i> Dashboard </a>
    </li>
    <li>
      <a href="{{route('admin.director_promoters.index')}}">Director/Promoters List</a>
    </li>
    <li>
      <a href="{{route('admin.director_promoters.view',array('id' => $row['customer_id']))}}">Director/Promoters View</a>
    </li>
    <li class="active">Member Nominee detail</li>
  </ol>
</section>


<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content">
          <div class="tab-pane active" id="memberinfo">
            <div class="box-body">
              
               <form id="update_form_memberinfo" method="post" name="update_form_memberinfo" >
              {{csrf_field()}}
              <input type="hidden" name="update_id" id="update_id" value="{{$row['customer_id']}}" />

              <div id="items_ui">
              
              <?php if(json_decode($row['member_nominee'])  > 0 ){ ?>
                <?php foreach (json_decode($row['member_nominee']) as $key => $nominee): ?>
                  
                
                <div id="member_nominee_forimagerow"  class="box-body item-row" style="border-bottom: solid 1px rgba(0, 0, 0, 0.2);">
                  <div class="form-horizontal">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Name <span class="requiredfield">*</span>
                        </label>
                        <div class="col-sm-7">
                          <input class="form-control required"  id="nominee_name" name="nominee_name[]" type="text" value="<?= $nominee->nominee_name ?>">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Relation <span class="requiredfield">*</span>
                        </label>
                        <div class="col-sm-7">
                          <select class="form-control required" id="nominee_relation" name="nominee_relation[]">
                            <option value="">Select Relation</option>
                            <option <?php if($nominee->nominee_relation == 'brother') { echo 'selected'; } ?> value="brother">Brother</option>
                            <option <?php if($nominee->nominee_relation == 'brother_in_law') { echo 'selected'; } ?> value="brother_in_law">Brother in Law</option>
                            <option <?php if($nominee->nominee_relation == 'brother_wife') { echo 'selected'; } ?>value="brother_wife">Brother wife</option>
                            <option <?php if($nominee->nominee_relation == 'daughter') { echo 'selected'; } ?> value="daughter">Daughter</option>
                            <option <?php if($nominee->nominee_relation == 'father') { echo 'selected'; } ?> value="father">Father</option>
                            <option <?php if($nominee->nominee_relation == 'grand_son') { echo 'selected'; } ?> value="grand_son">Grand Son</option>
                            <option <?php if($nominee->nominee_relation == 'grand_daughter') { echo 'selected'; } ?> value="grand_daughter">Grand Daughter</option>
                            <option <?php if($nominee->nominee_relation == 'husband') { echo 'selected'; } ?> value="husband">Husband</option>
                            <option <?php if($nominee->nominee_relation == 'mother') { echo 'selected'; } ?> value="mother">Mother</option>
                            <option <?php if($nominee->nominee_relation == 'niece') { echo 'selected'; } ?> value="niece">Niece</option>
                            <option <?php if($nominee->nominee_relation == 'nephew') { echo 'selected'; } ?> value="nephew">Nephew</option>
                            <option <?php if($nominee->nominee_relation == 'sister') { echo 'selected'; } ?> value="sister">Sister</option>
                            <option <?php if($nominee->nominee_relation == 'sister_in_law') { echo 'selected'; } ?> value="sister_in_law">Sister in Law</option>
                            <option <?php if($nominee->nominee_relation == 'son') { echo 'selected'; } ?> value="son">Son</option>
                            <option <?php if($nominee->nominee_relation == 'spouse') { echo 'selected'; } ?> value="spouse">Spouse</option>
                            <option <?php if($nominee->nominee_relation == 'wife') { echo 'selected'; } ?> value="wife">Wife</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">D.O.B. </label>
                          <div class="col-sm-7">
                            
                            <input class="form-control" name="nominee_dob[]" type="date" value="<?= $nominee->nominee_dob ?>">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Age</label>
                        <div class="col-sm-7">
                          <input class="form-control age" id="nominee_age" maxlength="20" name="nominee_age[]" type="number" value="<?= $nominee->nominee_age ?>">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Mobile No</label>
                        <div class="col-sm-7">
                          <input class="form-control" id="nominee_mobile" maxlength="10" name="nominee_mobile[]" type="number" value="<?= $nominee->nominee_mobile ?>">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Address <span class="requiredfield">*</span>
                        </label>
                        <div class="col-sm-7">
                          <input class="form-control required" id="nominee_address" name="nominee_address[]" type="text" value="<?= $nominee->nominee_address ?>">
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
                          <input class="form-control" id="nominee_aadhar_no" maxlength="12" name="nominee_aadhar_no[]" type="text" value="<?= $nominee->nominee_aadhar_no ?>">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">PAN</label>
                        <div class="col-sm-7">
                          <input class="form-control" value="<?= $nominee->nominee_pan ?>" id="nominee_pan" maxlength="10" name="nominee_pan[]" onkeyup="this.value = this.value.toUpperCase();" type="text">
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Voter ID No</label>
                        <div class="col-sm-7">
                          <input class="form-control" value="<?= $nominee->nominee_voter_id ?>" id="nominee_voter_id" maxlength="30" name="nominee_voter_id[]" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Ration Card No</label>
                        <div class="col-sm-7">
                          <input class="form-control"  value="<?= $nominee->nominee_ration_card ?>" id="nominee_ration_card" maxlength="30" name="nominee_ration_card[]" type="text">
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <a class="delete-row deleterow"  id="warrantyclosebuttonimage"  href="javaScript:void(0)">
                        <i class="fa fa-trash-o"></i> Remove Nominee </a>
                    </div>
                  </div>
                </div>
                <?php endforeach ?>
              <?php }else{ ?>

                <div class="box-body item-row" style="border-bottom: solid 1px rgba(0, 0, 0, 0.2);">
                  <div class="form-horizontal">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Name <span class="requiredfield">*</span>
                        </label>
                        <div class="col-sm-7">
                          <input class="form-control required"  id="nominee_name" name="nominee_name[]" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Relation <span class="requiredfield">*</span>
                        </label>
                        <div class="col-sm-7">
                          <select class="form-control required" id="nominee_relation" name="nominee_relation[]">
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
                            
                            <input class="form-control" name="nominee_dob[]" type="date" value="">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Age</label>
                        <div class="col-sm-7">
                          <input class="form-control age" id="nominee_age" maxlength="20" name="nominee_age[]" type="number">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Mobile No</label>
                        <div class="col-sm-7">
                          <input class="form-control" id="nominee_mobile" maxlength="10" name="nominee_mobile[]" type="number">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Address <span class="requiredfield">*</span>
                        </label>
                        <div class="col-sm-7">
                          <input class="form-control required" id="nominee_address" maxlength="150" name="nominee_address[]" type="text">
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
                          <input class="form-control" id="nominee_aadhar_no" maxlength="12" name="nominee_aadhar_no[]" type="text" value="">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">PAN</label>
                        <div class="col-sm-7">
                          <input class="form-control" id="nominee_pan" maxlength="10" name="nominee_pan[]" onkeyup="this.value = this.value.toUpperCase();" type="text">
                          
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

              <?php } ?>




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
            <div class="box-footer">
              <div class="col-xs-12 text-center">
                <div class="form-group">
                  <button type="button" onclick="update_memberNominee()" class="btn btn-flat btn-success">SAVE</button>
                  <a class="btn btn-flat btn-danger" href="{{route('admin.director_promoters.view',array('id' => $row['customer_id']))}}">Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>