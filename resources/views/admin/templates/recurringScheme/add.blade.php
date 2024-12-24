<section class="content-header">
   <h1>RD Account Scheme</h1>
   <ol class="breadcrumb">
      <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{route('admin.recurringScheme.index')}}">RD Account Scheme List</a></li>
      <li class="active">RD Account Scheme</li>
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
                     <label class="col-sm-4 control-label">Min. RD Amount</label>
                     <div class="col-sm-8">
                        <div class="input-group ">
                           <input class="form-control" id="min_rd_amount" name="min_rd_amount" type="text">
                           <div class="input-group-addon">
                              ₹
                           </div>
                        </div>
                       
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">RD Frequency <span class="requiredfield">*</span></label>
                     <div class="col-sm-8">
                        <select class="form-control required" id="rd_frequency" name="rd_frequency">
                           <option value="">Select</option>
                           <option value="daily">Daily</option>
                           <option value="10_days">10-Days</option>
                           <option value="14_days">14-Days</option>
                           <option value="28_days">28-Days</option>
                           <option value="weekly">Weekly</option>
                           <option value="bi_weekly">Bi_Weekly</option>
                           <option value="monthly">Monthly</option>
                           <option value="quarterly">Quarterly</option>
                           <option value="half_yearly">Half Yearly</option>
                           <option value="yearly">Yearly</option>
                        </select>
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
                     <label class="col-sm-4 control-label">RD Tenure <span class="requiredfield">*</span></label>
                     <div class="col-sm-8">
                        <div class="input-group">
                           <div class="input-group-addon padding-0" style="padding:0px;">
                              <input class=" bg-white no-border required " id="rd_frequency_text" name="rd_frequency_text" style="padding-left:15px;height: 32px;background-color: #fff !important;" type="text" >
                           </div>
                           <input class="form-control numeric required" id="rd_tenure" name="rd_tenure" type="text" value="" autocomplete="off">
                        </div>
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
                     <label class="col-sm-4 control-label">Collection Charge</label>
                     <div class="col-sm-8">
                        <div class="input-group">
                           <div class="input-group-addon padding-0" style="padding:0px;">
                              <select class=" bg-white no-border" id="collection_charge" name="collection_charge" style="height: 32px;background-color: #fff !important;">
                                 <option value=""></option>
                                 <option value="per">(%)</option>
                                 <option value="fixed">Fixed</option>
                              </select>
                           </div>
                           <input class="form-control"id="collection_charge_value" name="collection_charge_value" type="text">
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
               <h4><strong>Penalty Chart Rule:</strong></h4>
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Penalty Type<span class="requiredfield">*</span></label>
                     <div class="col-sm-8">
                        <select class="form-control required" id="PenaltyType" name="PenaltyType">
                           <option value="">Select</option>
                           <option selected="selected" value="increasing">Increasing</option>
                           <option value="flat">Flat</option>
                        </select>
                        <span class="field-validation-valid" data-valmsg-for="PenaltyType" data-valmsg-replace="true"></span>
                     </div>
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <div class="table-responsive" style="padding-left: 15px;padding-right:15px;">
                        <p style="color:red;">Only add details for Late Payment, No rules required for installment paid within due date </p>
                        <table class="table table-bordered" id="PenaltyruleTable">
                           <thead style="background-color:lightgray;color:black;">
                              <tr>
                                 <th>Sr No</th>
                                 <th>From Days</th>
                                 <th>To Days</th>
                                 <th>Calculation Type</th>
                                 <th>Parameter</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody id="items_ui">
                              <tr class="item-row" >
                                 <td><input class="form-control" name="number[]" readonly="readonly" type="text"></td>
                                 <td><input class="form-control" id="from_days" name="from_days[]" type="text"></td>
                                 <td><input class="form-control" id="to_days" name="to_days[]" type="text"></td>
                                 <td>
                                    <select class="form-control" id="calculation_type" name="calculation_type[]">
                                       <option value="">Select Calculation type</option>
                                       <option value="flat_amount">Flat Amount</option>
                                       <option value="flat_amountper_day">Flat Amount Per Day</option>
                                       <option value="interest_rate_annual">Interest Rate Annual</option>
                                       <option value="interest_rate_flat">Interest Rate Flat</option>
                                    </select>
                                 </td>
                                 <td><input class="form-control" id="parameter" name="parameter[]" type="text"></td>
                                 <td valign="middle">
                                    <a class="delete-row deleterow" href="javaScript:void(0)"><i class="fa fa-trash-o"></i></a>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <a id="addrow" onclick="addPenaltyRow();" ref="javascript:void(0);" class="btn btn-default bg-green"><i class="fa fa-plus-circle green"></i> New Rule</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="box-footer">
            <div class="col-xs-12 text-center">
               <div class="form-group">
                  <button type="submit" class="btn btn-flat btn-success">SAVE</button>
                  <a class="btn btn-flat btn-danger" href="{{route('admin.recurringScheme.index')}}">Cancel</a>
               </div>
            </div>
         </div>
      </div>
   </section>
</form>