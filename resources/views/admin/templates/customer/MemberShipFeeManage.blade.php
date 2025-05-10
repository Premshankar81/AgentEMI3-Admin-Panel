<section class="content-header">
    <h1>
        {{$data['page_title']}}
        <small>[Basic Information]</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.customer.index')}}">Customer List</a></li>
        <li><a href="{{route('admin.customer.edit',array('id' => $row['customer_id']))}}">Customer View</a></li>
        <li class="active"> {{$data['page_title']}}</li>
        
    </ol>
</section>


        <section class="content">
            <div class="box box-solid">
                <div class="box-header">
                </div>
                <form id="add_member_ship" method="post" name="add_member_ship" >
                {{csrf_field()}}
                <div class="box-body">
                    <div class="form-horizontal">
                        <input type="hidden" name="customer_id" id="customer_id" value="{{$row['id']}}" />

                        <div class="col-md-6">

                            
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Transaction Date <span class="requiredfield">*</span></label>
                                    <div class="col-sm-7">
                                        <input class="form-control datepicker required" data-val="true" data-val-date="The field TranasctionDate must be a date." id="transation_date" name="transation_date" type="date" value="" autocomplete="off">
                                    </div>
                                </div>
                            
                            <div class="form-group">
                                <label class="col-sm-4 control-label">MemberShip Fee</label>
                                <div class="col-sm-7">
                                    <input class="form-control numeric" data-val="true" data-val-number="The field Amount must be a number." id="amount" name="amount" type="text" value="" autocomplete="off">
                                    <span class="field-validation-valid" data-valmsg-for="Amount" data-valmsg-replace="true"></span>
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
                            <div id="CurrencyDenominationDiv" class="displaynone">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label"><span class="requiredfield"></span></label>
                                    <div class="col-sm-7">
                                        <a href="#" data-toggle="modal" data-target="#modal-MemberShipFees_currencydenomination">
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
                        </div>
                    </div>
                </div>
            

                <div class="box-footer">
                    <div class="col-xs-12 text-center ">
                        <div class="form-group">
                            <input type="submit" class="btn btn-flat btn-success" value="Save" autocomplete="off">
                            <a class="btn btn-flat btn-danger" href="{{ route('admin.templates.customer.MemberShipFeeDetail',array('id' => $row['customer_id']))}}">Cancel</a>
                        </div>
                    </div>
                </div>

                </form>

            </div>
        </section>