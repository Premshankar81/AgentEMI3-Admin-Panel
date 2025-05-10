<section class="content-header">
   <h1>FD Account Scheme</h1>
   <ol class="breadcrumb">
      <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      
      <li><a href="{{route('admin.fixedDepositScheme.index')}}">FD Account Scheme List</a></li>
      <li class="active">FD Account Scheme</li>
   </ol>
</section>
<form id="update_form" method="post" name="update_form" >
   {{csrf_field()}}
   <input type="hidden" name="update_id" id="update_id" value="{{$row['id']}}"/>
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
                        <input class="form-control" id="scheme_code" maxlength="20" name="scheme_code" type="text" value="{{$row['scheme_code']}}">
                        
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Name<span class="requiredfield">*</span></label>
                     <div class="col-sm-8">
                        <input class="form-control" id="name" maxlength="50" name="name" type="text" value="{{$row['name']}}">
                     
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Min. RD Amount</label>
                     <div class="col-sm-8">
                        <div class="input-group ">
                           <input class="form-control" value="{{$row['min_fd_amount']}}" id="min_fd_amount" name="min_fd_amount" type="text">
                           <div class="input-group-addon">
                              ₹
                           </div>
                        </div>
                       
                     </div>
                  </div>
               </div>
               
                <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Max. RD Amount</label>
                     <div class="col-sm-8">
                        <div class="input-group ">
                           <input class="form-control" value="{{$row['max_fd_amount']}}" id="max_fd_amount" name="max_fd_amount" type="text">
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
                           <input class="form-control" value="{{$row['interest_rate']}}" id="interest_rate" name="interest_rate" type="text">
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
                                 <option <?php if($row['fd_frequency'] == 'monthly') { echo "selected"; } ?> value="monthly">Monthly</option>
                                 <option <?php if($row['fd_frequency'] == 'days') { echo "selected"; } ?> value="days">Days</option>
                                 <option <?php if($row['fd_frequency'] == 'yearly') { echo "selected"; } ?> value="yearly">yearly</option>
                              </select>
                           </div>
                           <input class="form-control" data-val="true"  id="fd_tenure" name="fd_tenure" type="text" value="{{$row['fd_tenure']}}"  >
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
                           <option  <?php if($row['interest_compounding'] == 'monthly') { echo "selected"; } ?> value="monthly">Monthly</option>
                           <option  <?php if($row['interest_compounding'] == 'quarterly') { echo "selected"; } ?> value="quarterly">Quarterly</option>
                           <option  <?php if($row['interest_compounding'] == 'half_yearly') { echo "selected"; } ?> value="half_yearly">Half Yearly</option>
                           <option  <?php if($row['interest_compounding'] == 'yearly') { echo "selected"; } ?> value="yearly">Yearly</option>
                           <option  <?php if($row['interest_compounding'] == 'no_compounding') { echo "selected"; } ?> value="no_compounding">No Compounding</option>
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
                                 <option <?php if($row['cancellation_charge'] == 'per') { echo "selected"; } ?> value="per">(%)</option>
                                 <option <?php if($row['cancellation_charge'] == 'fixed') { echo "selected"; } ?> value="fixed">Fixed</option>
                              </select>
                           </div>
                           <input class="form-control" id="cancellation_charge_value" name="cancellation_charge_value" type="text" value="{{$row['cancellation_charge_value']}}">
                        </div>
                     </div>
                  </div>
               </div>
               
               
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Collector Commission Rate</label>
                     <div class="col-sm-8">
                        <input class="form-control" id="Collector_commission_rate" name="Collector_commission_rate" type="text" value="{{$row['Collector_commission_rate']}}">
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Remarks</label>
                     <div class="col-sm-8">
                        <input class="form-control" value="{{$row['remarks']}}" id="remarks" name="remarks" type="text">
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Status</label>
                     <div class="col-sm-8">
                        <select class="form-control required" id="status" name="status">
                           <option value="">Select</option>
                           <option  <?php if($row['status'] == 'active') { echo "selected"; } ?> value="active">Active</option>
                           <option  <?php if($row['status'] == 'inactive') { echo "selected"; } ?> value="inactive">Inactive</option>
                        </select>
                     </div>
                  </div>
               </div>
              
               <div class="clearfix"></div>
               
            </div>
         </div>
         <div class="box-footer">
            <div class="col-xs-12 text-center">
               <div class="form-group">
                  <button  type="button" onclick="update_row()" class="btn btn-flat btn-success">SAVE</button>
                  <a class="btn btn-flat btn-danger" href="{{route('admin.fixedDepositScheme.index')}}">Cancel</a>
               </div>
            </div>
         </div>
      </div>
   </section>
</form>