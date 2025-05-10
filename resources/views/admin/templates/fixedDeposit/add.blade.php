<section class="content-header">
    <h1>{{$data['page_title']}}</h1>
    <ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
    <li><a href="{{route('admin.fixedDeposit.index')}}">{{$data['page_title']}} List</a></li>
        <li class="active">{{$data['page_title']}}</li>
        
    </ol>
</section>

<section class="content">
  <form id="add_form" method="POST" name="add_form" autocomplete="off" >
    {{csrf_field()}}
  <div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
       
        <div class="tab-content">
          <div class="tab-pane active" id="memberinfo">
           
<div class="box-body">
   

    <div class="col-md-6">
        <div class="form-horizontal">


          <div class="form-group">
              <label class="col-sm-4">Application Date.<span class="requiredfield">*</span></label>
              <div class="col-sm-7">
                  <input class="form-control" id="application_date" name="application_date" type="date">
              </div>
          </div>

            <div class="form-group">
                <label class="col-sm-4">Customer's Name <span class="requiredfield">*</span></label>
                <div class="col-sm-7">
                    <select id="customer_id" name="customer_id" class="form-control" required onchange="get_MemberInfo()">
                        <option value="">Select Customer</option>
                        @foreach($Members as $key => $Member)
                            <option data-closing_balance="{{$Member['closing_balance']}}"  value="{{$Member['id']}}">{{$Member['name']}}</option>    
                        @endforeach
                    </select>
                </div>
            </div>

          <div class="form-group">
              <label class="col-sm-4 control-label">Customer Info</label>
              <div class="col-sm-7">
                 <div id="memberdetail" style="border:1px solid #ccc;padding: 6px 12px;height:110px;">
                                    </div>
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-4">Joint A/c Holder (If any)</label>
              <div class="col-sm-7">
                   <select id="joint_customer_id" name="joint_customer_id" class="form-control selectpicker">
                      <option value="">Select Joint A/c Holder </option>
                      @foreach($Members as $key => $Member)
                        <option data-closing_balance="{{$Member['closing_balance']}}"  value="{{$Member['id']}}">{{$Member['name']}}</option>    
                      @endforeach
                  </select>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-4">Minor's Name</label>
              <div class="col-sm-7">
                   <select id="minor_id" name="minor_id" class="form-control selectpicker" required >
                    <option value="">Select Minor's Name </option>
                    @foreach($Members as $key => $Member)
                        <option data-closing_balance="{{$Member['closing_balance']}}"  value="{{$Member['id']}}">{{$Member['name']}}</option>    
                    @endforeach
                </select>
              </div>
          </div>

        <div class="form-group">
            <label class="col-sm-4 control-label">Agent's Name <span class="requiredfield">*</span></label>
            <div class="col-sm-7">
                <select id="agent_id" name="agent_id" class="form-control selectpicker" >
                  <option value="">Select Agent's Name </option>
                  @foreach($agents as $key => $agent)
                      <option  value="{{$agent['id']}}">{{$agent['name']}}-{{$agent['agent_code']}}</option>    
                  @endforeach
              </select>
            </div>
        </div>


    </div>
</div>
  <div class="col-md-6">
      <div class="form-horizontal">

          <div class="form-group">
              <label class="col-sm-4">Scheme <span class="requiredfield">*</span></label>
              <div class="col-sm-7">
                  <select id="scheme_id" name="scheme_id" class="form-control selectpicker" onchange="get_schemeDetails()">
                  <option value="">Select Scheme </option>
                  @foreach($fd_schemes as $key => $scheme)
                      <option  value="{{$scheme['id']}}">{{$scheme['name']}}-{{$scheme['scheme_code']}}</option>    
                  @endforeach
              </select>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-4 control-label">School Info</label>
              <div class="col-sm-7">
                 <div id="schemedetail" style="border:1px solid #ccc;padding: 6px 12px;height:110px;">
                                    </div>
              </div>
          </div>

          <div class="form-group">
                <label class="col-sm-4 control-label">Maturity Instruction<span class="requiredfield">*</span></label>
                <div class="col-sm-7">
                    <select class="form-control" id="maturity_instruction" name="maturity_instruction">
                        <option value="">Select Maturity Instruction</option>
                        <option value="auto_renew">Auto Renew</option>
                        <option value="redeem_principal">Redeem Principal</option>
                        <option value="dont_renew">Don't Renew</option>
                    </select>
                </div>
            </div>

          

          <div class="form-group">
                 <label class="col-sm-4 control-label">FD Tenure <span class="requiredfield">*</span></label>
                 <div class="col-sm-7">
                     <div class="input-group">
                         <div class="input-group-addon padding-0" style="padding:0px;">
                          <select class=" bg-white no-border required" id="fd_frequency" name="fd_frequency" style="height: 32px;background-color: #fff !important;">
                            <option value="">Select FD frequency</option>
                            
                            <option value="yearly">Yearly</option>
                            <option value="monthly">Monthly</option>
                            <option value="days">Days</option>
                            <option value="no_compounding">No Compounding</option>
                           </select>
                         </div>
                         <input class="form-control" id="fd_tenure" name="fd_tenure" type="text">
                     </div>
                 </div>
             </div>

             <div class="form-group">
                  <label class="col-sm-4 control-label">FD Amount <span class="requiredfield">*</span></label>
                  <div class="col-sm-7">
                      <input class="form-control" name="fd_amount" type="text" id="fd_amount" autocomplete="off">
                      <input class="form-control" name="interest_rate" type="hidden" id="interest_rate" autocomplete="off">
                      
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
        </div>
    </div>  
</div>
            

<div class="box-footer">
  <div class="col-xs-12 text-center ">
    <div class="form-group">
       <input type="submit" value="Save" class="btn btn-flat btn-success"/>
      <a class="btn btn-flat btn-danger" href="{{route('admin.fixedDeposit.index')}}">Cancel</a>
    </div>
  </div>
</div>


      </div>
      <div class="tab-pane" id="timeline"></div>
    </div>
  </div>
</div>
</div>
</form>
</section>