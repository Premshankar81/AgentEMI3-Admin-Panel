<section class="content-header">
  <h1>
      Saving Account Scheme
  </h1>
  <ol class="breadcrumb">
      <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
      <li><a href="{{route('admin.scheme.index')}}">Saving Account Scheme List</a></li>
      <li class="active">Saving Account Scheme</li>
      
  </ol>
</section>

<section class="content">
  <form id="add_form" method="POST" name="add_form" autocomplete="off" >
    {{csrf_field()}}
  <div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
       
        <div class="tab-content">
          <div class="tab-pane active" id="memberinfo">
           
           <div class="box-body">
                    <div class="form-horizontal">
                      
      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Scheme Code<span class="requiredfield">*</span></label>
              <div class="col-sm-8">
                  <input class="form-control" id="scheme_code" maxlength="20" name="scheme_code" type="text">
                  
              </div>
          </div>
      </div>
      
      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Name<span class="requiredfield">*</span></label>
              <div class="col-sm-8">
                  <input class="form-control" id="name" maxlength="50" name="name" type="text">
              </div>
          </div>
      </div>

      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Interest Payout<span class="requiredfield">*</span></label>
              <div class="col-sm-8">
                  <select class="form-control" id="interest_payout" name="interest_payout">
                    <option value="">Select</option>
                    <option value="monthly">Monthly</option>
                    <option value="half_monthly">Half-Monthly</option>
                    <option value="quarterly">Quarterly</option>
                    <option value="half_yearly">Half Yearly</option>
                    <option value="yearly">Yearly</option>
                    <option value="wob">WOB</option>
                    </select>
              </div>
          </div>
      </div>

      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Interest Rate<span class="requiredfield">*</span></label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="interest_rate" name="interest_rate" type="text">
              </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Minimum Balance</label>
              <div class="col-sm-8">
                  <input type="number" class="form-control" id="minimum_balance" name="minimum_balance" type="text">
              </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Collector Commission Rate</label>
              <div class="col-sm-8">
                 <input type="number" class="form-control" id="collector_commission" name="collector_commission" type="text">
              </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Daily NEFT Limit</label>
              <div class="col-sm-8">
                   <input type="number" class="form-control" id="daily_neft_limit" name="daily_neft_limit" type="text">
              </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Daily Scan-Pay Limit</label>
              <div class="col-sm-8">
                  <input type="number" class="form-control" id="scan_pay_limit" name="scan_pay_limit" type="text">
              </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Remarks</label>
              <div class="col-sm-8">
                   <input type="text" class="form-control" id="remarks" name="remarks" type="text">
              </div>
          </div>
      </div>

          </div>
      </div>
            

            <div class="box-footer">
              <div class="col-xs-12 text-center ">
                <div class="form-group">
                   <input type="submit" value="Save" class="btn btn-flat btn-success"/>
                  <a class="btn btn-flat btn-danger" href="{{route('admin.scheme.index')}}">Cancel</a>
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