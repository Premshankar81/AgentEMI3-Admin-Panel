<section class="content-header">
  <h1> DEPOSIT - <small>[ {{$row['account_no']}} ]</small> <input id="returnUrl" name="returnUrl" type="hidden" value="" autocomplete="off">
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
    <li><a href="{{route('admin.businessLoan.manage',array('id' => $row['uuid']))}}">Loan Account- {{$row['account_no']}}</a></li>
    <li class="active">Deposit Payment</li>
  </ol>
</section>


<section class="content">
  <div class="row">
   
    <div class="col-md-6">
      <div class="box box-solid">
        <div class="box-header"></div>
        <div class="box-body">
          <div class="col-md-12">
           <form id="add_deposit_form" method="POST" name="add_deposit_form" autocomplete="off" >
            {{csrf_field()}}
             <input type="hidden" name="update_id" id="update_id" value="{{$row['uuid']}}" />
             <input type="hidden" name="customer_id" value="{{$row['customer_id']}}" />
             <input type="hidden" name="account_id" value="{{$row['id']}}" />
             <input type="hidden" name="back_url" value="{{route('admin.businessLoan.manage',array('id' => $row['uuid']))}}" />
             
            <div class="form-horizontal">
              <div class="form-group">
                <label class="col-sm-4 control-label">Deposit Date <span class="requiredfield">*</span></label>
                <div class="col-sm-7">
                    <input class="form-control" id="deposit_date" name="deposit_date" type="date" value="<?= date('Y-m-d') ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Due EMI Amount &nbsp;
                
                <a href="#" data-toggle="modal" data-target="#modal_Due_EMI">
                    <i class="fa fa-gear"></i> &nbsp;&nbsp;Due EMIs
                </a>
                </label>
                <div class="col-sm-7">
                  <input class="form-control"id="due_amount" name="due_amount" readonly="readonly" type="text" value="{{$EMIAmount}}" >
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Due Other charges</label>
                <div class="col-sm-7">
                  <input class="form-control" id="other_charges" name="other_charges" readonly="readonly" type="text" value="0.00">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Advance Amount</label>
                <div class="col-sm-7">
                  <input class="form-control"id="advance_amount" name="advance_amount" readonly="readonly" type="text" value="{{$advanceAmount}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Amount to be deposit <span class="requiredfield">*</span>
                </label>
                <div class="col-sm-7">
                  <input class="form-control" id="AmountDeposit" name="amount_deposit" type="text" value="0">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Collection Charge <span class="requiredfield">*</span>
                </label>
                <div class="col-sm-7">
                  <input class="form-control" id="CollectionCharge" name="collection_charge" type="text" value="0.00">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Penalty Charge</label>
                <div class="col-sm-7">
                  <input class="form-control" id="PenaltyCharge" name="penalty_charge" readonly="readonly" type="text" value="<?= $penaltyCharges ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Penalty Charge waive off</label>
                <div class="col-sm-7">
                  <input class="form-control" id="PenaltyChargeWaveoff" name="penalty_chargeWave_off" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">TotalDeposit <span class="requiredfield">*</span>
                </label>
                <div class="col-sm-7">
                  <input class="form-control" id="TotalDeposit" name="total_deposit" readonly="readonly" type="text" value="0.00">
                </div>
              </div>

               <div class="form-group">
                  <label class="col-sm-4 control-label">Pay Mode <span class="requiredfield">*</span></label>
                  <div class="col-sm-7">
                    <select class="form-control" id="PaymentMode" name="payment_mode">
                        <option  value="cash">Cash</option>
                        <option value="cheque">Cheque</option>
                        <option value="online_transfer">Online Transfer</option>
                    </select>
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
                    <label class="col-sm-4 control-label">Bank Name<span class="requiredfield">*</span>
                    </label>
                    <div class="col-sm-7">
                        <select class="form-control "id="bank_id" name="bank_id">
                          <option value="">Select Bank</option>
                          @foreach ($banks as $key => $bank)
                          <option value="{{$bank['id']}}">{{$bank['title']}}</option>
                          @endforeach
                         </select>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4">Cheque No.<span class="requiredfield">*</span></label>
                    <div class="col-sm-2">
                      <input class="form-control" id="cheque_no" maxlength="6" name="cheque_no" type="text">
                    </div>
                    <label class="col-sm-2">Cheque Date <span class="requiredfield">*</span></label>
                    <div class="col-sm-3">
                        <input class="form-control"  id="cheque_date" name="cheque_date" type="date">
                    </div>
                </div>
            </div>

            <div id="OnlineDetailDiv" class="displaynone">
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
                        <span class="field-validation-valid" data-valmsg-for="BankAccountLedgerId" data-valmsg-replace="true"></span>
                    </div>
                </div>
            </div>

              <div id="SavingAccountlDiv" class="displaynone">
                <div class="form-group">
                  <label class="col-sm-4 control-label">Saving Account No. <span class="requiredfield">*</span>
                  </label>
                  <div class="col-sm-7">
                    <select class="form-control required " data-val="true" data-val-required="The SavingAccountId field is required." id="SavingAccountId" name="SavingAccountId">
                      <option value=""></option>
                    </select>
                    <span class="field-validation-valid" data-valmsg-for="SavingAccountId" data-valmsg-replace="true"></span>
                  </div>
                </div>
              </div>
            
              <div class="form-group">
                <label class="col-sm-4 control-label">Narration</label>
                <div class="col-sm-7">
                  <input class="form-control " id="Narration" maxlength="50" name="Narration" type="text" value="" autocomplete="off">
                  <span class="field-validation-valid" data-valmsg-for="Narration" data-valmsg-replace="true"></span>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <div class="col-xs-12 text-center">
                <div class="form-group">
                  <button type="submit" class="btn btn-flat btn-success">SAVE</button>
                  <a href="{{route('admin.businessLoan.manage',array('id' => $row['uuid']))}}" class="btn btn-flat btn-danger"> Cancel </a>
                </div>
              </div>
            </div>
            </form>
            
            
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="info-box">
        <span class="info-box-icon bg-green">
          <i class="fa fa-money"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text  text-center" id="NetBalaneCaption">Available Balance</span>
          <span class="info-box-text text-center"></span>
          <span class="info-box-number  text-center" style="font-size:18px;" id="NetBalane">
            ₹ <?= number_format($row->available_balance) ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="box box-default box-solid" id="memberdetail">
        <div class="box-header with-border">
          <h3 class="box-title">Member's Detail</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="box-body" style="min-height: 200px; display: block;">
               <div class="col-md-12" id="headaddressdiv">
                  <div class="form-group">
                     <div id="headaddress">
                        <span style="font-family: arial; font-size: 12px; font-weight: bold;">{{$row['customer']['name']}} [{{$row['customer']['customer_code']}}]</span><br />
                        <span style="font-family: arial; font-size: 12px; color: gray;"><i class="fa fa-phone"></i>&nbsp; {{$row['customer']['mobile']}} &nbsp;<i class="fa fa-envelope-o"></i> &nbsp; </span> <br />
                        <span style="font-family: arial; font-size: 12px; color: gray;"><i class="fa fa-map-marker"></i>&nbsp; {{$row['customer']['present_address1']}},</span><br />
                        <span style="font-family: arial; font-size: 12px; color: gray;">PAN - {{$row['customer']['pan']}}</span><br />
                        <span style="font-family: arial; font-size: 12px; color: gray;">Aadhar No - {{$row['customer']['aadharcard_no']}}</span><br />
                        <br />

                        
                         <table class="reporttable table" style="text-align: center;">
                           <tbody>
                              <tr>
                                 <td style="width:50%;">Photograph</td>
                                 <td style="width:50%;">Signature</td>
                              </tr>
                              <tr>
                                 <td>
                                  <img class="img" id="logoimg" src="" style="max-width:180px;cursor:zoom-in;">
                                  <?php if ($row['customer']['kyc_passport_photograph'] != ''): ?>
                                    <img src="{{config('constants.KYC_DOC')}}{{$row['customer']['kyc_passport_photograph']}}" style="width:100px;height:100px;">                                            
                                  <?php endif ?>
                                      
                                 </td>
                                 <td>
                                  <img class="img" id="logoimg" src="" style="max-width:180px;cursor:zoom-in;">
                                      <img src="{{config('constants.KYC_DOC')}}{{$row['customer']['kyc_signature']}}" style="width:100px;height:100px;">
                                 </td>
                              </tr>
                           </tbody>
                        </table>

                     </div>
                  </div>
               </div>
               <table class="table table-details" id="MemberInfo">
                  <tbody></tbody>
               </table>
            </div>
      </div>
    </div>
  </div>
</section>