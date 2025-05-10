<section class="content-header">
   <h1>
      {{$data['page_title']}}
   </h1>
</section>
<section class="content">
   <div class="box box-solid">
      <div class="box-header"></div>
      <div class="box-body">
 
         <form action="{{ route('admin.loan_calculator.report') }}" id="add_form" method="get" name="add_form" >
    {{csrf_field()}}
           
            <div class="col-md-12">
               <div class="form-horizontal">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Disburse Date <span class="requiredfield">*</span></label>
                     <div class="col-sm-7">
                        <div class="input-group date">
                           <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                           </div>
                           <input class="form-control" id="opening_date" name="opening_date" type="date" required> 
                        </div>
                     </div>
                  </div>
                   <div class="form-group">
                     <label class="col-sm-4 control-label" >EMI Payout <span class="requiredfield">*</span></label>
                     <div class="col-sm-7">
                        <select class="form-control" id="EMIPayout" name="emi_payout" required>
                           <option value="">Select</option>
                           <option value="daily">Daily</option>
                           <option value="weekly">Weekly</option>
                           <option value="bi_weekly">Bi_Weekly</option>
                           <option value="monthly">Monthly</option>
                           <option value="quarterly">Quarterly</option>
                           <option value="half_yearly">Half Yearly</option>
                           <option value="yearly">Yearly</option>
                        </select>
                     </div>
                  </div>

                   <div class="form-group">
                     <label class="col-sm-4 control-label" id="TenureCaption">Tenure (in Months) <span class="requiredfield">*</span></label>
                     <div class="col-sm-7">
                        
                           <input class="form-control"  id="loan_tenure" name="loan_tenure" type="text" value="12" autocomplete="off" required>
                     </div>
                  </div>

                  <div class="form-group ">
                    <label class="col-sm-4 control-label">EMI Credit Period<span class="requiredfield">*</span></label>
                    <div class="col-sm-7">
                        <input class="form-control" id="emi_credit_period" name="emi_credit_period" type="text" value="10">
                    </div>
                  </div>
                 
                  
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Interest Rate<span class="requiredfield">*</span></label>
                     <div class="col-sm-7">
                        <input class="form-control" id="interest_rate" name="interest_rate" type="text" required>
                     </div>
                  </div>

                   <div class="form-group">
                     <label class="col-sm-4 control-label">Loan Amount<span class="requiredfield">*</span></label>
                     <div class="col-sm-7">
                        <input class="form-control" id="loan_amount" name="loan_amount" type="number" required>
                     </div>
                  </div>

                  <div class="form-group">
                       <label class="col-sm-4 control-label">EMI Type <span class="requiredfield">*</span></label>
                       <div class="col-sm-7">
                           <select class="form-control" id="emi_type" name="emi_type">
                              <option value="">Select EMI Type</option>
                              <option selected="selected" value="reducing">Reducing EMI</option>
                              <option value="flat">Flat EMI</option>
                           </select>
                       </div>
                   </div>

                  <div class="form-group">
                     <div class="col-sm-4 control-label"></div>
                     <div class="col-sm-7">
                        <button type="submit" class="btn btn-flat btn-success">CALCULATE</button>
                        <a class="btn btn-flat btn-danger" href="/RecurringDeposit/ApplicationIndex">Cancel</a>
                     </div>
                  </div>
               </div>
            </div>
         </form>
        
      </div>
   </div>
</section>