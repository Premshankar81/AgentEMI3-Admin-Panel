<section class="content-header">
   <h1>
      Recurring Deposit Calculator
   </h1>
</section>
<section class="content">
   <div class="box box-solid">
      <div class="box-header"></div>
      <div class="box-body">
 
              <form action="{{ route('admin.rd_calculator.report') }}" id="add_form" method="get" name="add_form" >
    {{csrf_field()}}
           
            <div class="col-md-12">
               <div class="form-horizontal">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Open Date <span class="requiredfield">*</span></label>
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
                     <label class="col-sm-4 control-label">RD Amount<span class="requiredfield">*</span></label>
                     <div class="col-sm-7">
                        <input class="form-control" id="rd_amount" name="rd_amount" type="number" required>
                     </div>
                  </div>
               
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Interest Rate<span class="requiredfield">*</span></label>
                     <div class="col-sm-7">
                        <input class="form-control" id="interest_rate" name="interest_rate" type="text" required>
                     </div>
                  </div>
                  <div class="form-group ">
                     <label class="col-sm-4 control-label">RD Credit Period<span class="requiredfield">*</span></label>
                     <div class="col-sm-7">
                         <input class="form-control" id="rd_credit_period" name="rd_credit_period" type="number" value="10">
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-4 control-label">RD Frequency <span class="requiredfield">*</span></label>
                     <div class="col-sm-7">
                        <select class="form-control" id="rd_frequency" name="rd_frequency" required>
                           <option value="">Select</option>
                           <option value="monthly">Monthly</option>
                           <option value="yearly">Yearly</option>
                        </select>
                     </div>
                  </div> 
                  <div class="form-group">
                     <label class="col-sm-4 control-label">RD Tenure <span class="requiredfield">*</span></label>
                     <div class="col-sm-7">
                       
                           <input class="form-control"  id="rd_tenure" name="rd_tenure" type="number"   required>
               
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