<section class="content-header">
   <h1>
      Business Loan Disbursement
   </h1>
   <ol class="breadcrumb">
      <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{route('admin.businessLoanApproved.index')}}">Disbursement Application List</a></li>
      <li class="active">Business Loan Disbursement</li>
   </ol>
</section>
<style type="text/css">
   .displaynone {
   display: none!important;
   }
</style>
<form id="update_form_disbursement" method="post" name="update_form_disbursement" >
{{csrf_field()}}
<input type="hidden" name="update_id" id="update_id" value="{{$row['uuid']}}" />

<input type="hidden" name="update_id" id="update_id" value="{{$row['uuid']}}" />
 <input type="hidden" name="customer_id" value="{{$row['customer_id']}}" />
 <input type="hidden" name="account_id" value="{{$row['id']}}" />
<section class="content">
   <div class="row">
      <div class="col-md-6">
         <div class="box box-solid">
            <div class="box-header">
            </div>
            <div class="box-body">
               <div class="form-horizontal">
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Disburse Date <span class="requiredfield">*</span></label>
                     <div class="col-sm-7">
                        <div class="input-group date">
                           <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                           </div>
                           <input class="form-control" id="disburse_date" name="disburse_date" type="date"  autocomplete="off">
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-4 control-label">First EMI Date <span class="requiredfield">*</span></label>
                     <div class="col-sm-7">
                        <div class="input-group date">
                           <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                           </div>
                           <input class="form-control" id="first_emi_date" name="first_emi_date" type="date" autocomplete="off" value="{{$row->first_emi_date}}">
                        </div>
                     </div>
                  </div>
                  <hr>
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Loan Amount</label>
                     <div class="col-sm-7">
                        <input class="form-control required numeric" id="ApprvedAmount" name="apprved_amount" readonly="readonly" type="text" value="{{$row->loan_amount}}" autocomplete="off">
                     </div>
                  </div>
                  <div class="form-group" style="margin-bottom: 0px;">
                     <label class="col-sm-4 control-label">Pre-EMI Interest</label>
                     <div class="col-sm-7">
                        <input class="form-control numeric" id="PreEMIInterest" name="pre_emi_interest" type="text" value="0" autocomplete="off">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-4 control-label"></label>
                     <div class="col-sm-7 checkbox" style="padding-top:0px;">
                        <input checked="checked" class="checkbox" id="PreEMIInterestSeprately" name="PreEMIInterestSeprately" style="margin-left:0px;min-height:24px;" type="checkbox" value="true" autocomplete="off">
                        <input name="PreEMIInterestSeprately" type="hidden" value="false" autocomplete="off">
                        <span style="padding-left:20px;color:green;">Collect Pre-EMI Interest Separately</span>    
                     </div>
                  </div>
                  <?php
                  $processing_fees_amount = $row->Loanscheme->processing_fees_value;
                  if($row->Loanscheme->processing_fees == 'per'){
                        $processing_fees_per = $row->Loanscheme->processing_fees_value;
                        $processing_fees_amount =  ($row->loan_amount * $processing_fees_per ) / 100;
                  }
                 ?>
                  
                  
                  <div class="form-group" style="margin-bottom: 0px;">
                     <label class="col-sm-4 control-label">Processing Fees</label>
                     <div class="col-sm-7">
                        <table style="width:100%;">
                           <thead>
                              <tr>
                                 <th>Amount</th>
                                 <th>CGST</th>
                                 <th>SGST</th>
                                 <th>Total</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td><input class="form-control" value="<?= $processing_fees_amount ?>" id="ProcessingFees" name="processing_fees" type="text"></td>
                                 <td><input class="form-control" id="ProcessingFeesCGST" value="0" name="processing_fees_cgst" readonly="readonly" type="text"></td>
                                 <td><input class="form-control"id="ProcessingFeesSGST" value="0" name="processing_fees_sgst" readonly="readonly" type="text"></td>
                                 <td><input class="form-control" value="<?= $processing_fees_amount ?>" id="ProcessingFeesTotal" value="0" name="processing_fees_total"  type="text"></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div> 
                  <div class="form-group">
                     <label class="col-sm-4 control-label"></label>
                     <div class="col-sm-7 checkbox" style="padding-top:0px;">
                        <input checked="checked" class="checkbox" id="ProcessingFeesSeprately" name="ProcessingFeesSeprately" style="margin-left:0px;min-height:24px;" type="checkbox" value="true" autocomplete="off"><input name="ProcessingFeesSeprately" type="hidden" value="false" autocomplete="off">
                        <span style="padding-left:20px;color:green;">Collect Processing Fee Separately</span>
                     </div>
                  </div>
                  
                  <?php
                  $stamp_duty_amount = $row->Loanscheme->stamp_duty_charge_value;
                  if($row->Loanscheme->stamp_duty_charge == 'per'){
                        $stamp_duty_per = $row->Loanscheme->stamp_duty_charge_value;
                        $stamp_duty_amount =  ($row->loan_amount * $processing_fees_per ) / 100;
                  }
                   ?>
                   
                  <div class="form-group" style="margin-bottom: 0px;">
                     <label class="col-sm-4 control-label">Stamp Duty Charges</label>
                     <div class="col-sm-7">
                        <table style="width:100%;">
                           <thead>
                              <tr>
                                 <th>Amount</th>
                                 <th>CGST</th>
                                 <th>SGST</th>
                                 <th>Total</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td><input class="form-control" value="<?= $stamp_duty_amount  ?>" id="StampDuty" name="stamp_duty" type="text" ></td>
                                 <td><input class="form-control" id="StampDutyCGST" value="0" name="StampDutyCGST" readonly="readonly" type="text"></td>
                                 <td><input class="form-control" id="StampDutySGST" value="0" name="StampDutySGST" readonly="readonly" type="text"></td>
                                 <td><input class="form-control" value="<?= $stamp_duty_amount  ?>" id="StampDutyTotal" value="0" name="stamp_duty_total"  type="text"></td>
                              </tr>
                           </tbody>
                        </table>
                        <span class="field-validation-valid" data-valmsg-for="StampDuty" data-valmsg-replace="true"></span>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-4 control-label"></label>
                     <div class="col-sm-7 checkbox" style="padding-top:0px;">
                        <input checked="checked" class="checkbox"id="StampDutySeprately" name="StampDutySeprately" style="margin-left:0px;min-height:24px;" type="checkbox" value="true" autocomplete="off"><input name="StampDutySeprately" type="hidden" value="false" autocomplete="off">
                        <span style="padding-left:20px;color:green;">Collect Stamp Duty Separately</span>
                     </div>
                  </div>
                  <div class="form-group" style="margin-bottom: 0px;">
                     <label class="col-sm-4 control-label">Deduct Advance Amount</label>
                     <div class="col-sm-7">
                        <input class="form-control" id="AdvanceAmount" name="advance_amount" type="text">
                     </div>
                  </div>
                  <h4><strong>Net Disbursement amount:</strong></h4>
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Net Disburse Amount</label>
                     <div class="col-sm-7">
                        <input class="form-control" id="DisbursesAmount" name="disburses_amount"  value="{{$row->loan_amount}}" readonly="readonly" type="text">
                     </div>
                  </div>
                  <h5><strong>Payment Mode-1:</strong></h5>
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Disburse Amount</label>
                     <div class="col-sm-7">
                        <input class="form-control" id="DisbursesAmount1" name="disburses_amount"  value="{{$row->loan_amount}}" type="text">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Pay Mode <span class="requiredfield">*</span></label>
                     <div class="col-sm-7">
                        <select class="form-control  required" id="PaymentMode" name="payment_mode">
                           <option value=""></option>
                           <option selected="selected" value="cash">Cash</option>
                           <option value="cheque">Cheque</option>
                           <option value="online_transfer">Online Transfer</option>
                           <option value="by_saving_account">By Saving Account</option>
                        </select>
                        <span class="field-validation-valid" data-valmsg-for="PaymentMode" data-valmsg-replace="true"></span>
                     </div>
                  </div>
                  <div id="CurrencyDenominationDiv" class="">
                     <div class="form-group">
                        <label class="col-sm-4 control-label"><span class="requiredfield"></span></label>
                        <div class="col-sm-7">
                           <a href="#" data-toggle="modal" data-target="#modal-currencydenomination">
                           Currency Denomination detail
                           </a>
                        </div>
                     </div>
                  </div>
                  <div id="ChequeDetailDiv" class="displaynone">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Cheque No.<span class="requiredfield">*</span></label>
                        <div class="col-sm-2">
                           <input class="form-control" id="cheque_no" maxlength="6" name="cheque_no" type="text">
                        </div>
                        <label class="col-sm-2 control-label">Cheque Date <span class="requiredfield">*</span></label>
                        <div class="col-sm-3">
                            <input class="form-control"  id="cheque_date" name="cheque_date" type="date">
                        </div>
                     </div>
                  </div>
                  <div id="OnlineDetailDiv" class="displaynone">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">IFSC Code</label>
                        <div class="col-sm-2">
                           <input class="form-control" id="OTIFSCCode" maxlength="15" name="OTIFSCCode" type="text">
                        </div>
                        <label class="col-sm-2 control-label">Account No.</label>
                        <div class="col-sm-3">
                           <input class="form-control stringint" id="OTAccountNo" maxlength="20" name="OTAccountNo" type="text">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Account Holder</label>
                        <div class="col-sm-7">
                           <input class="form-control" id="OTAccountHolderName" maxlength="50" name="OTAccountHolderName" type="text">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Bank Name</label>
                        <div class="col-sm-7">
                           <select class="form-control "id="bank_id" name="bank_id">
                              <option value="">Select Bank</option>
                              @foreach ($banks as $key => $bank)
                              <option value="{{$bank['id']}}">{{$bank['title']}}</option>
                              @endforeach
                             </select>
                           <span class="field-validation-valid" data-valmsg-for="OTBankName" data-valmsg-replace="true"></span>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Reference No.<span class="requiredfield">*</span></label>
                        <div class="col-sm-7">
                           <input class="form-control" id="reference_no" maxlength="75" name="reference_no" type="text">
                        </div>
                     </div>
                  </div>
                  <div id="bankaccountdiv" class="displaynone">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Bank Account<span class="requiredfield">*</span></label>
                        <div class="col-sm-7">
                          <select class="form-control" id="bank_account_ledger_id" name="bank_account_ledger_id"> <option value="">--Select Bank Account--</option>
                          @foreach ($Ledgers as $key => $Ledger)
                          <option value="{{$Ledger->id}}">{{$Ledger->title}}</option>
                          @endforeach
                          </select>
                        </div>
                     </div>
                  </div>
                  <div id="SavingAccountlDiv" class="displaynone">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Saving Account No.<span class="requiredfield">*</span></label>
                        <div class="col-sm-7">
                           <select class="form-control required " data-val="true" data-val-required="The SavingAccountId field is required." id="SavingAccountId" name="SavingAccountId">
                            
                              <option value="">Select Saving Account</option>
                              @foreach($SavingAccounts as $key => $SavingAccount)
                                <option <?php if($SavingAccount['id']==$row->link_saving_account_id) { echo "selected"; }  ?>  value="{{$SavingAccount['id']}}">{{$SavingAccount['customer']['name']}} [{{$SavingAccount['account_no']}}] ₹ {{$SavingAccount['available_balance']}}</option>    
                              @endforeach
                              
                           </select>
                        </div>
                     </div>
                  </div>
                  <h5><strong>Payment Mode-2:</strong></h5>
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Disburse Amount</label>
                     <div class="col-sm-7">
                        <input class="form-control numeric " data-val="true" data-val-number="The field DisbursesAmount2 must be a number." id="DisbursesAmount2" name="DisbursesAmount2" type="text" value="" autocomplete="off">
                        <span class="field-validation-valid" data-valmsg-for="DisbursesAmount2" data-valmsg-replace="true"></span>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Pay Mode </label>
                     <div class="col-sm-7">
                        <select class="form-control  " id="PaymentMode2" name="PaymentMode2">
                           <option value=""></option>
                           <option value="Cash">Cash</option>
                           <option value="Cheque">Cheque</option>
                           <option value="Online Transfer">Online Transfer</option>
                           <option value="By Saving Account">By Saving Account</option>
                        </select>
                        <span class="field-validation-valid" data-valmsg-for="PaymentMode2" data-valmsg-replace="true"></span>
                     </div>
                  </div>
                  <div id="ChequeDetailDiv2" class="displaynone">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Cheque No.</label>
                        <div class="col-sm-2">
                           <input class="form-control stringint " id="ChequeNo2" name="ChequeNo2" type="text" value="" autocomplete="off">
                           <span class="field-validation-valid" data-valmsg-for="ChequeNo2" data-valmsg-replace="true"></span>
                        </div>
                        <label class="col-sm-2 control-label">Cheque Date </label>
                        <div class="col-sm-3">
                           <div class="input-group date">
                              <div class="input-group-addon">
                                 <i class="fa fa-calendar"></i>
                              </div>
                              <input class="form-control datepicker" data-val="true" data-val-date="The field ChequeDate2 must be a date." id="ChequeDate2" name="ChequeDate2" type="text" value="" autocomplete="off">
                           </div>
                           <span class="field-validation-valid" data-valmsg-for="ChequeDate2" data-valmsg-replace="true"></span>
                        </div>
                     </div>
                  </div>
                  <div id="OnlineDetailDiv2" class="displaynone">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">IFSC Code</label>
                        <div class="col-sm-2">
                           <input class="form-control" id="OTIFSCCode2" maxlength="15" name="OTIFSCCode2" type="text" value="" autocomplete="off">
                           <span class="field-validation-valid" data-valmsg-for="OTIFSCCode2" data-valmsg-replace="true"></span>
                        </div>
                        <label class="col-sm-2 control-label">Account No.</label>
                        <div class="col-sm-3">
                           <input class="form-control stringint" id="OTAccountNo2" maxlength="20" name="OTAccountNo2" type="text" value="" autocomplete="off">
                           <span class="field-validation-valid" data-valmsg-for="OTAccountNo2" data-valmsg-replace="true"></span>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Account Holder</label>
                        <div class="col-sm-7">
                           <input class="form-control" id="OTAccountHolderName2" maxlength="50" name="OTAccountHolderName2" type="text" value="" autocomplete="off">
                           <span class="field-validation-valid" data-valmsg-for="OTAccountHolderName2" data-valmsg-replace="true"></span>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Bank Name</label>
                        <div class="col-sm-7">
                           <select class="form-control required" id="OTBankName2" name="OTBankName2">
                              <option value=""></option>
                              <option value="Allahabad Bank">Allahabad Bank</option>
                           </select>
                           <span class="field-validation-valid" data-valmsg-for="OTBankName2" data-valmsg-replace="true"></span>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Reference No.<span class="requiredfield">*</span></label>
                        <div class="col-sm-7">
                           <input class="form-control required stringint " id="TransactionRefNo2" maxlength="50" name="TransactionRefNo2" type="text" value="" autocomplete="off">
                           <span class="field-validation-valid" data-valmsg-for="TransactionRefNo2" data-valmsg-replace="true"></span>
                        </div>
                     </div>
                  </div>
                  <div id="bankaccountdiv2" class="displaynone">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Bank Account</label>
                        <div class="col-sm-7">
                           <select class="form-control " id="BankAccountLedgerId2" name="BankAccountLedgerId2">
                              <option value="">--Select Bank Account--</option>
                              <option value="03023e76-c7c6-49d6-84f7-020ec49ccd5d">My Ledget 04 DR 1</option>
                              <option value="d2edb2a9-e5a0-4dd2-988b-1ac73ee10188">Akash Ramchiary</option>
                              <option value="7d8f4335-6d34-4d93-86a4-1fa27c244ad2">Bank A/c</option>
                              <option value="96931294-ed81-46c1-b7cf-528e92556a34">NN 101 Ledger DR</option>
                              <option value="3d436cce-a1ad-457c-9ee3-5578732778a9">Uco bank</option>
                              <option value="56a5b9e2-c431-4caf-b4e4-5cbc3fd4d0e4">HDFC</option>
                              <option value="cf7f189f-3882-44fc-acdf-6109c409bd6a">SARVESH PATEL SALARY</option>
                              <option value="1b0ca2a9-12ac-4ba5-8f9e-69ebf3769ba5">HDFC bank</option>
                              <option value="a67f44a6-192e-4b48-929c-717878d5e0ab">NN 101 Ledger CR</option>
                              <option value="4c924f93-c7fc-47c3-993b-8a20bbcc5ec3">My Ledger</option>
                              <option value="365ee292-e116-4047-a69b-907a842df029">INDUSIND BANK</option>
                              <option value="02266b42-8dad-43f8-8a84-91fa123c0156">Munawwar</option>
                              <option value="92c0e9a7-4d8a-482c-a548-932d9c7c70fa">NN Ledget DR</option>
                              <option value="b209266b-d4ee-4625-877a-a5e4ff7923de">NIKITA KAMBLE</option>
                              <option value="602169f3-9be8-4124-9fff-b9c7072a5227">UTKARSH BANK ACCOUNT</option>
                              <option value="4fa4a010-97a7-4c30-bfa5-cc1a9aed367f">sdfsdff</option>
                           </select>
                           <span class="field-validation-valid" data-valmsg-for="BankAccountLedgerId2" data-valmsg-replace="true"></span>
                        </div>
                     </div>
                  </div>
                  <div id="SavingAccountlDiv2" class="displaynone">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Saving Account No.</label>
                        <div class="col-sm-7">
                           <select class="form-control  " data-val="true" data-val-required="The SavingAccountId2 field is required." id="SavingAccountId2" name="SavingAccountId2">
                              <option value=""></option>
                           </select>
                           <span class="field-validation-valid" data-valmsg-for="SavingAccountId2" data-valmsg-replace="true"></span>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Remarks</label>
                     <div class="col-sm-7">
                        <input class="form-control " data-val="true" data-val-regex="Special characters are not allowed." data-val-regex-pattern="^[-, ()&amp;./A-Za-z0-9]*$" id="DisburseRemarks" name="DisburseRemarks" type="text" value="" autocomplete="off">
                        <span class="field-validation-valid" data-valmsg-for="DisburseRemarks" data-valmsg-replace="true"></span>
                     </div>
                  </div>
               </div>
               <div class="box-footer">
                  <div class="col-xs-12 text-center">
                     <div class="form-group">
                        <button type="button" onclick="update_disbursement()" class="btn btn-flat btn-success">DISBURSE</button>
                        <a class="btn btn-flat btn-danger" href="{{route('admin.businessLoan.manage',array('id' => $row['uuid']))}}">Cancel</a>
                     </div>
                  </div> 
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="box box-default box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Application Details</h3>
            </div>
            <div class="box-body">
               <table class="table table-details" id="ApplicationInfo">
                  <tbody>
                     <tr>
                        <td class="ft-600">Application No.</td>
                        <td>{{$row->account_no}}</td>
                     </tr>
                     <tr>
                        <td class="ft-600">Application Date</td>
                        <td>{{Helper::getFromDate($row->application_date)}}</td>
                     </tr>
                     <tr>
                        <td class="ft-600">Name</td>
                        <td><a href="{{route('admin.customer.edit',array('id' => @$row['customer']['customer_id']))}}" target="_blank"> {{@$row->customer->customer_code}} - {{@$row['customer']['name']}}</a></td>
                     </tr>
                     <tr>
                        <td class="ft-600">Scheme</td>
                        <td><a href="{{route('admin.loanScheme.view',array('id' => $row->Loanscheme->unique_code))}}" target="_blank"> {{@$row->Loanscheme->scheme_code}} - {{@$row->Loanscheme->name}} </a></td>
                     </tr>
                     <tr>
                        <td class="ft-600">Amount Requested</td>
                        <td>₹ <?= number_format(@$row->loan_amount_requested) ?></td>
                     </tr>
                     <tr>
                        <td class="ft-600">Approved Amount</td>
                        <td>₹ <?= number_format(@$row->loan_amount) ?></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="box box-default box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">EMI Chart</h3>
            </div>
            <div class="box-body">
               <table class="table table-hover" id="EMIInfo">
                  <thead>
                     <tr>
                        <th>Sr No</th>
                        <th>Date</th>
                        <th>Due Date</th>
                        <th class="text-right">EMI</th>
                        <th class="text-right">Principal</th>
                        <th class="text-right">Interest</th>
                        <th class="text-right">Other Charge</th>
                        <th class="text-right">Outstanding</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($EMI_rows as $index=>$row)
                     <tr>
                        <td>{{$index+1}}</td>
                        <td>{{Helper::getFromDate($row['emi_date'])}}</td>
                        <td>{{Helper::getFromDate($row['due_date'])}}</td>
                        <td>{{@$row['emi']}}</td>
                        <td>{{@$row['principal']}}</td>
                        <td>{{@$row['interest']}}</td>
                        <td style="text-align: right;">0</td>
                        <td>{{@$row['outstanding']}}</td>
                     </tr>
                    @endforeach 
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
</form>