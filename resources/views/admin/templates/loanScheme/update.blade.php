<section class="content-header">
   <h1>{{$data['page_title']}}</h1>
   <ol class="breadcrumb">
      <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{route('admin.loanScheme.index')}}">{{$data['page_title']}} List</a></li>
      <li class="active">{{$data['page_title']}}</li>
   </ol>
</section>
<form id="update_form" method="post" name="update_form" >
   {{csrf_field()}}
   <input type="hidden" name="update_id" id="update_id" value="{{$row['unique_code']}}" />
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
                     <label class="col-sm-4 control-label">Min Amount</label>
                     <div class="col-sm-8">
                        <div class="input-group ">
                           <input class="form-control" value="{{$row['min_amount']}}" id="min_amount" name="min_amount" type="text">
                           <div class="input-group-addon">
                              ₹
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Max Amount</label>
                     <div class="col-sm-8">
                        <div class="input-group ">
                           <input class="form-control" value="{{$row['max_amount']}}" id="max_amount" name="max_amount" type="text">
                           <div class="input-group-addon">
                              ₹
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

                <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Annual Interest Rate <span class="requiredfield">*</span></label>
                     <div class="col-sm-8">
                         <input class="form-control" id="interest_rate" name="interest_rate" type="text" value="{{$row['interest_rate']}}">
                     </div>
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Pre Closure Charges</label>
                     <div class="col-sm-8">
                        <div class="input-group">
                           <div class="input-group-addon padding-0" style="padding:0px;">
                              <select class=" bg-white no-border" id="pre_closure_charges" name="pre_closure_charges" style="height: 32px;background-color: #fff !important;">
                                 <option value=""></option>
                                 <option <?php if($row['pre_closure_charges'] == 'per') { echo "selected"; } ?> value="per">(%)</option>
                                 <option <?php if($row['pre_closure_charges'] == 'fixed') { echo "selected"; } ?> value="fixed">Fixed</option>
                              </select>
                           </div>
                           <input class="form-control" id="pre_closure_charges_value" name="pre_closure_charges_value" type="text" value="{{$row['pre_closure_charges_value']}}">
                        </div>
                     </div>
                  </div>
               </div>

                 <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Processing Fees</label>
                     <div class="col-sm-8">
                        <div class="input-group">
                           <div class="input-group-addon padding-0" style="padding:0px;">
                              <select class=" bg-white no-border" id="processing_fees" name="processing_fees" style="height: 32px;background-color: #fff !important;">
                                 <option value=""></option>
                                 <option <?php if($row['processing_fees'] == 'per') { echo "selected"; } ?> value="per">(%)</option>
                                 <option <?php if($row['processing_fees'] == 'fixed') { echo "selected"; } ?> value="fixed">Fixed</option>
                              </select>
                           </div>
                           <input class="form-control" id="processing_fees_value" name="processing_fees_value" type="text" value="{{$row['processing_fees_value']}}">
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
                                  <option <?php if($row['collection_charge'] == 'per') { echo "selected"; } ?> value="per">(%)</option>
                                 <option <?php if($row['collection_charge'] == 'fixed') { echo "selected"; } ?> value="fixed">Fixed</option>
                              </select>
                           </div>
                           <input class="form-control"id="collection_charge_value" name="collection_charge_value" type="text" value="{{$row['collection_charge_value']}}">
                        </div>
                        
                     </div>
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Stamp Duty Charge</label>
                     <div class="col-sm-8">
                        <div class="input-group">
                           <div class="input-group-addon padding-0" style="padding:0px;">
                              <select class=" bg-white no-border" id="stamp_duty_charge" name="stamp_duty_charge" style="height: 32px;background-color: #fff !important;">
                                 <option value=""></option>
                                 <option <?php if($row['stamp_duty_charge'] == 'per') { echo "selected"; } ?> value="per">(%)</option>
                                 <option <?php if($row['stamp_duty_charge'] == 'fixed') { echo "selected"; } ?> value="fixed">Fixed</option>
                              </select>
                           </div>
                           <input class="form-control" id="stamp_duty_charge_value" name="stamp_duty_charge_value" type="text" value="{{$row['stamp_duty_charge_value']}}">
                        </div>
                     </div>
                  </div>
               </div>

                <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">EMI Type <span class="requiredfield">*</span></label>
                     <div class="col-sm-8">
                        <select class="form-control required" id="emi_type" name="emi_type">
                           <option value="">Select EMI Type</option>
                              <option <?php if($row['emi_type'] == 'reducing') { echo "selected"; } ?>  value="reducing">Reducing EMI</option>
                              <option <?php if($row['emi_type'] == 'flat') { echo "selected"; } ?>  value="flat">Flat EMI</option>
                        </select>
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
                                 <option <?php if($row['collection_charge'] == 'per') { echo "selected"; } ?> value="per">(%)</option>
                                 <option <?php if($row['collection_charge'] == 'fixed') { echo "selected"; } ?> value="fixed">Fixed</option>
                              </select>
                           </div>
                           <input class="form-control" id="collection_charge_value" name="collection_charge_value" type="text" value="{{$row['collection_charge_value']}}">
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
                           <select class="form-control" data-trigger name="status" id="update_status">
                             <option <?php if($row['status'] == 'active') { echo "selected"; } ?> value="active">Active</option>
                             <option <?php if($row['status'] == 'inactive') { echo "selected"; } ?> value="inactive">Inactive</option>
                         </select>
                       </div>
                   </div>
               </div>
               
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">EMI Credit Period</label>
                     <div class="col-sm-8">
                        <input class="form-control" id="emi_credit_period" name="emi_credit_period" type="text" value="{{$row['emi_credit_period']}}">
                     </div>
                  </div>
               </div>
              
               <div class="clearfix"></div>
               <h4><strong>Penalty Chart Rule:</strong></h4>
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Penalty Type<span class="requiredfield">*</span></label>
                     <div class="col-sm-8">
                        <select class="form-control required" id="penalty_type" name="penalty_type">
                           <option value="">Select</option>
                           <option <?php if($row['penalty_type'] == 'increasing') { echo "selected"; } ?> value="increasing">Increasing</option>
                           <option <?php if($row['penalty_type'] == 'flat') { echo "selected"; } ?> value="flat">Flat</option>
                        </select>
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

                              @if(@$PenaltyCharts)
                              @foreach($PenaltyCharts as $key=>$PenaltyChart)
                                  <tr class="item-row" >
                                    <td><input value="{{$key+1}}" class="form-control"  readonly="readonly" type="text"></td>
                                    <td>
                                       <input value="{{$PenaltyChart->id}}"  class="form-control" name="penalty_id[]" type="hidden">
                                       <input value="{{$PenaltyChart->from_days}}" class="form-control" id="from_days" name="update_from_days[]" type="text"></td>
                                    <td><input value="{{$PenaltyChart->to_days}}" class="form-control" id="to_days" name="update_to_days[]" type="text"></td>
                                    <td>
                                       <select class="form-control" id="calculation_type" name="update_calculation_type[]">
                                          <option value="">Select Calculation type</option>
                                          <option <?php if($PenaltyChart['calculation_type'] == 'flat_amount') { echo "selected"; } ?> value="flat_amount">Flat Amount</option>
                                          <option <?php if($PenaltyChart['calculation_type'] == 'flat_amountper_day') { echo "selected"; } ?> value="flat_amountper_day">Flat Amount Per Day</option>
                                          <option <?php if($PenaltyChart['calculation_type'] == 'interest_rate_annual') { echo "selected"; } ?> value="interest_rate_annual">Interest Rate Annual</option>
                                          <option <?php if($PenaltyChart['calculation_type'] == 'interest_rate_flat') { echo "selected"; } ?> value="interest_rate_flat">Interest Rate Flat</option>
                                       </select>
                                    </td>
                                    <td><input value="{{$PenaltyChart->parameter}}" class="form-control" id="parameter" name="update_parameter[]" type="text"></td>
                                    <td valign="middle">
                                       <a onClick="delete_panelty_row({{$PenaltyChart['id']}})" class="delete-row deleterow" href="javaScript:void(0)"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                 </tr>
                              @endforeach
                              @endif
                              
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
                  <button type="button" onclick="update_row()" class="btn btn-flat btn-success">SAVE</button>
                  <a class="btn btn-flat btn-danger" href="{{route('admin.loanScheme.index')}}">Cancel</a>
               </div>
            </div>
         </div>
      </div>
   </section>
</form>