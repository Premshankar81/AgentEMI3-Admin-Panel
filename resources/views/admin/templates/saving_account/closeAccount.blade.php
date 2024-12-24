<section class="content-header">
    <h1>
        CLOSE ACCOUNT - <small>[ {{$row->account_no}} ]</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.saving_account.manage',array('id' => $row['uuid']))}}">Saving Account -{{$row->account_no}}</a></li>
        <li class="active">Close Account</li>
        
    </ol>
</section>

<section class="content">
            <div class="box box-solid">
                <div class="box-header">
                </div>
                <div class="box-body">

                <form id="add_closeAmount_form" method="POST" name="add_closeAmount_form" autocomplete="off" >
                {{csrf_field()}}

                  <input type="hidden" name="update_id" id="update_id" value="{{$row['uuid']}}" />
                     <input type="hidden" name="customer_id" value="{{$row['customer_id']}}" />
                     <input type="hidden" name="account_id" value="{{$row['id']}}" />
                     
                    
                    <div class="col-md-6">
                    

                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Close Date <span class="requiredfield">*</span></label>
                                <div class="col-sm-7">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input class="form-control" data-val="true" id="transation_date" name="transation_date" type="date">
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Account Balance<span class="requiredfield">*</span></label>
                                <div class="col-sm-7">
                                    <input class="form-control" id="AccountBalance" name="account_balance" readonly="readonly" type="number" value="{{$row->available_balance}}">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Interest Occured<span class="requiredfield">*</span></label>
                                <div class="col-sm-7">
                                    <input class="form-control" id="InterestOccured" name="interest_cccured" type="text">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Net Release Amount<span class="requiredfield">*</span></label>
                                <div class="col-sm-7">
                                    <input class="form-control"id="NetAmountRelease" name="net_amount_release" readonly="readonly" type="text" value="{{$row->available_balance}}">
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

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Remarks</label>
                                <div class="col-sm-7">
                                    <input class="form-control " id="remarks" name="remarks" type="text" value="" autocomplete="off">
                                    <span class="field-validation-valid" data-valmsg-for="Remarks" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                        </div>
                

                    </div>

 <div class="col-md-6">
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
<span style="font-family: arial; font-size: 12px; color: gray;"> </span> <br />
<span style="font-family: arial; font-size: 12px; color: gray;"> -,</span> <br />
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
    <div class="box-footer">
        <div class="col-xs-12 text-center">
            <div class="form-group">
                <button type="submit" class="btn btn-flat btn-success">SAVE</button>
                <a href="{{route('admin.saving_account.manage',array('id' => $row['uuid']))}}" class="btn btn-flat btn-danger"> Cancel </a>
            </div>
        </div>
    </div>

    </form>

    </div>
    </section>