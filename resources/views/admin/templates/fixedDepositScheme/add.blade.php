<section class="content-header">
   <h1>FD Account Scheme</h1>
   <ol class="breadcrumb">
       
       
      <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{route('admin.fixedDepositScheme.index')}}">FD Account Scheme List</a></li>
      <li class="active">FD Account Scheme</li>
   </ol>
</section>
<form id="add_form" method="post" name="add_form" >
   {{csrf_field()}}
   <section class="content">
      <div class="box box-solid">
         <div class="box-header">
         </div>
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
                        <input class="form-control" id="name" maxlength="50" name="name" type="text" >
                     
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Min. FD Amount</label>
                     <div class="col-sm-8">
                        <div class="input-group ">
                           <input class="form-control" id="min_fd_amount" name="min_fd_amount" type="text">
                           <div class="input-group-addon">
                              ₹
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Max. FD Amount</label>
                     <div class="col-sm-8">
                        <div class="input-group ">
                           <input class="form-control" id="max_fd_amount" name="max_fd_amount" type="text">
                           <div class="input-group-addon">
                              ₹
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            
                <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Interest Rate <span class="requiredfield">*</span></label>
                     <div class="col-sm-8">
                        <div class="input-group ">
                           <input class="form-control" id="interest_rate" name="interest_rate" type="text">
                           <div class="input-group-addon">%</div>
                        </div>
                     </div>
                  </div>
               </div>
               
                <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">FD Tenure</label>
                     <div class="col-sm-8">
                        <div class="input-group">
                           <div class="input-group-addon padding-0" style="padding:0px;">
                              <select class=" bg-white no-border" id="fd_frequency" name="fd_frequency" style="height: 32px;background-color: #fff !important;">
                                 <option value=""></option>
                                 <option value="yearly">yearly</option>
                                 <option value="monthly">Monthly</option>
                                 <option value="days">Days</option>
                              </select>
                           </div>
                           <input class="form-control" data-val="true" data-val-number="The field CancellationCharge must be a number." id="fd_tenure" name="fd_tenure" type="text" >
                        </div>
                     </div>
                  </div>
               </div>
               
               
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Interest Comp.<span class="requiredfield">*</span></label>
                     <div class="col-sm-8">
                        <select class="form-control required" id="interest_compounding" name="interest_compounding">
                           <option value="">Select</option>
                           <option value="monthly">Monthly</option>
                           <option value="quarterly">Quarterly</option>
                           <option value="half_yearly">Half Yearly</option>
                           <option value="yearly">Yearly</option>
                           <option value="no_compounding">No Compounding</option>
                        </select>
                     </div>
                  </div>
               </div>
               
             
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Cancellation Charge</label>
                     <div class="col-sm-8">
                        <div class="input-group">
                           <div class="input-group-addon padding-0" style="padding:0px;">
                              <select class=" bg-white no-border" id="cancellation_charge" name="cancellation_charge" style="height: 32px;background-color: #fff !important;">
                                 <option value=""></option>
                                 <option value="per">(%)</option>
                                 <option value="fixed">Fixed</option>
                              </select>
                           </div>
                           <input class="form-control numeric" data-val="true" data-val-number="The field CancellationCharge must be a number." id="cancellation_charge_value" name="cancellation_charge_value" type="text" value="" autocomplete="off">
                        </div>
                     </div>
                  </div>
               </div>
               
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Collector Commission Rate</label>
                     <div class="col-sm-8">
                        <input class="form-control" id="Collector_commission_rate" name="Collector_commission_rate" type="text" >
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Remarks</label>
                     <div class="col-sm-8">
                        <input class="form-control" id="remarks" name="remarks" type="text">
                     </div>
                  </div>
               </div>
              
               <div class="clearfix"></div>
              
            </div>
         </div>
         <div class="box-footer">
            <div class="col-xs-12 text-center">
               <div class="form-group">
                  <button type="submit" class="btn btn-flat btn-success">SAVE</button>
                  <a class="btn btn-flat btn-danger" href="{{route('admin.fixedDepositScheme.index')}}">Cancel</a>
               </div>
            </div>
         </div>
      </div>
   </section>
</form>