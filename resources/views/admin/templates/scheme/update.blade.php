
<section class="content-header">
    <h1>
        Saving Account Scheme Update
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.scheme.index')}}">Saving Account Scheme</a></li>
        <li class="active">Director Promoters Update</li>
        
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
    <input type="hidden" name="update_id" id="update_id" value="{{$row['uuid']}}" />
          
            <div class="box-body">
                    <div class="form-horizontal">
                      
      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Scheme Code<span class="requiredfield">*</span></label>
              <div class="col-sm-8">
                  <input class="form-control" id="scheme_code" maxlength="20" name="scheme_code" type="text" value="{{$row->scheme_code}}">
                  
              </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Name<span class="requiredfield">*</span></label>
              <div class="col-sm-8">
                  <input class="form-control" id="name" maxlength="50" name="name" type="text" value="{{$row->name}}">
              </div>
          </div>
      </div>

      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Interest Payout<span class="requiredfield">*</span></label>
              <div class="col-sm-8">
                  <select class="form-control" id="interest_payout" name="interest_payout">
                    <option value="">Select</option>
                    <option <?php if($row['interest_payout'] == 'monthly') { echo "selected"; } ?> value="monthly">Monthly</option>
                    <option <?php if($row['interest_payout'] == 'half_monthly') { echo "selected"; } ?> value="half_monthly">Half-Monthly</option>
                    <option <?php if($row['interest_payout'] == 'quarterly') { echo "selected"; } ?> value="quarterly">Quarterly</option>
                    <option <?php if($row['interest_payout'] == 'half_yearly') { echo "selected"; } ?> value="half_yearly">Half Yearly</option>
                    <option <?php if($row['interest_payout'] == 'yearly') { echo "selected"; } ?> value="yearly">Yearly</option>
                    <option <?php if($row['interest_payout'] == 'wob') { echo "selected"; } ?> value="wob">WOB</option>
                    </select>
              </div>
          </div>
      </div>

      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Interest Rate<span class="requiredfield">*</span></label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="interest_rate" name="interest_rate" type="text" value="{{$row->interest_rate}}">
              </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Minimum Balance</label>
              <div class="col-sm-8">
                  <input type="number" class="form-control" id="minimum_balance" name="minimum_balance" type="text" value="{{$row->minimum_balance}}">
              </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Collector Commission Rate</label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="collector_commission" name="collector_commission" type="text" value="{{$row->collector_commission}}">
              </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Daily NEFT Limit</label>
              <div class="col-sm-8">
                   <input type="number" class="form-control" id="daily_neft_limit" name="daily_neft_limit" type="text" value="{{$row->daily_neft_limit}}">
              </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Daily Scan-Pay Limit</label>
              <div class="col-sm-8">
                  <input type="number" class="form-control" id="scan_pay_limit" name="scan_pay_limit" type="text" value="{{$row->scan_pay_limit}}">
              </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Remarks</label>
              <div class="col-sm-8">
                   <input type="text" class="form-control" id="remarks" name="remarks" type="text" value="{{$row->remarks}}">
              </div>
          </div>
      </div>

      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Status</label>
              <div class="col-sm-8">
                  <select class="form-control" data-trigger name="status" id="update_status">
                    <option <?php if($row['status'] == 'active') { echo "selected"; } ?> value="active">Active</option>
                    <option <?php if($row['status'] == 'inactive') { echo "selected"; } ?> value="inactive">Inactive</option>
                </select>
              </div>
          </div>
      </div>
      
      </div>
  </div>

            <div class="box-footer">
              <div class="col-xs-12 text-center ">
                <div class="form-group">
                   <input type="button" onclick="update_row()" value="Save" class="btn btn-flat btn-success"/>
                  <a class="btn btn-flat btn-danger" href="{{route('admin.scheme.index')}}">Cancel</a>
                </div>
              </div>
            </div> 

             </form>
                            
          </div>
      </div>
  </div>
</div>
</section>
