
<section class="content-header">
    <h1>
        RD Application
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.saving_account.index')}}">RD Application</a></li>
        <li class="active">RD Application Update</li>
    </ol>
</section>
@if($row['status'] == 'pending')
<div class="col-md-12" style="padding-bottom:10px;margin-top:20px ">
        <div class="alert alert-warning alert-dismissible margin-top-10 margin-bottom-0">
            <h4><i class="icon fa fa-ban"></i> ALERT PENDING FOR APPROVAL!</h4>
            <p class="ft-16">This saving account is pending for approval &nbsp; <a class="btn btn-danger" href="{{route('admin.fixedDeposit.approve-manage',array('id' => $row['uuid']))}}">Let's Do It!</a></p>
        </div>
  </div>
  @endif

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
  
  <div class="tab-content">
      <div class="tab-pane active" id="memberinfo">
   <form id="update_form" method="post" name="update_form" >
    {{csrf_field()}}
    <input type="hidden" name="update_id" id="update_id" value="{{$row['uuid']}}" />
          
            <div class="box-body">
                    <div class="form-horizontal">
                      
      <div class="col-md-6">
        <div class="form-horizontal">


          <div class="form-group">
              <label class="col-sm-4">Application Date.<span class="requiredfield">*</span></label>
              <div class="col-sm-7">
                  <input class="form-control" id="application_date" name="application_date" type="date" value="{{$row->application_date}}">
              </div>
          </div>

            <div class="form-group">
                <label class="col-sm-4">Customer's Name <span class="requiredfield">*</span></label>
                <div class="col-sm-7">
                    <select id="customer_id" name="customer_id" class="form-control" required onchange="get_MemberInfo()">
                        <option value="">Select Customer</option>
                        @foreach($Members as $key => $Member)
                            <option <?php if($Member['id']==$row->customer_id) { echo "selected"; }  ?>  value="{{$Member['id']}}">{{$Member['name']}}</option>    
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
                        <option <?php if($Member['id']==$row->joint_customer_id) { echo "selected"; }  ?> data-closing_balance="{{$Member['closing_balance']}}"  value="{{$Member['id']}}">{{$Member['name']}}</option>    
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
                        <option <?php if($Member['id']==$row->minor_id) { echo "selected"; }  ?> value="{{$Member['id']}}">{{$Member['name']}}</option>    
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
                      <option <?php if($agent['id']==$row->agent_id) { echo "selected"; }  ?> value="{{$agent['id']}}">{{$agent['name']}}-{{$agent['agent_code']}}</option>    
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
                  <option value="">Select Minor's Name </option>
                  @foreach($fd_schemes as $key => $scheme)
                      <option <?php if($scheme['id']==$row->scheme_id) { echo "selected"; }  ?> value="{{$scheme['id']}}">{{$scheme['name']}}-{{$scheme['scheme_code']}}</option>    
                  @endforeach
              </select>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-4 control-label">School Info</label>
              <div class="col-sm-7">
                 <div id="schemedetail" style="border:1px solid #ccc;padding: 6px 12px;height:110px;"></div>
              </div>
          </div>

           <div class="form-group">
              <label class="col-sm-4 control-label">FD Amount <span class="requiredfield">*</span></label>
              <div class="col-sm-7">
                  <input class="form-control" name="fd_amount" type="text" id="fd_amount" value="{{$row['fd_amount']}}">
              </div>
          </div>

          <div class="form-group">
                 <label class="col-sm-4 control-label">RD Tenure <span class="requiredfield">*</span></label>
                 <div class="col-sm-7">
                     <div class="input-group">
                         <div class="input-group-addon padding-0" style="padding:0px;">
                          <select class=" bg-white no-border required" id="fd_frequency" name="fd_frequency" style="height: 32px;background-color: #fff !important;">
                           <option value="">FD frequency</option>
                           
                            <option <?php if($row['fd_frequency'] == 'yearly') { echo "selected"; } ?> value="yearly">Yearly</option>
                            <option <?php if($row['fd_frequency'] == 'monthly') { echo "selected"; } ?> value="monthly">Monthly</option>
                            <option <?php if($row['fd_frequency'] == 'days') { echo "selected"; } ?> value="days">Days</option>
                           </select>
                         </div>
                         <input class="form-control" id="fd_tenure" name="fd_tenure" type="text" value="{{$row['fd_tenure']}}">

                     </div>
                 </div>
             </div>

          <div class="form-group">
              <label class="col-sm-4 control-label">Pay Mode <span class="requiredfield">*</span></label>
              <div class="col-sm-7">
                <select class="form-control" id="PaymentMode" name="payment_mode">
                    <option <?php if($scheme['payment_mode']=='cash') { echo "selected"; }  ?> value="cash">Cash</option>
                    <option <?php if($scheme['payment_mode']=='cheque') { echo "selected"; }  ?> value="Cheque">Cheque</option>
                    <option <?php if($scheme['payment_mode']=='online_transfer') { echo "selected"; }  ?> value="Online Transfer">Online Transfer</option>
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
                <label class="col-sm-4 control-label">Bank Name<span class="requiredfield">*</span></label>
                <div class="col-sm-7">
                    <select class="form-control "id="Bank_name" name="Bank_name"><option value=""></option>
                      <option value="AB Bank Ltd">AB Bank Ltd</option>
                      <option value="Yes Bank Ltd">Yes Bank Ltd</option>
                      </select>
                    <span class="field-validation-valid" data-valmsg-for="BankName" data-valmsg-replace="true"></span>
                </div>
            </div>

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
                <label class="col-sm-4 control-label">Reference No.<span class="requiredfield">*</span></label>
                <div class="col-sm-7">
                    <input class="form-control" id="transaction_ref_no" maxlength="75" name="transaction_ref_no" type="text">
                </div>
            </div>
        </div>

        <div id="bankaccountdiv" class="displaynone">
            <div class="form-group">
                <label class="col-sm-4 control-label">Bank Account<span class="requiredfield">*</span></label>
                <div class="col-sm-7">
                    <select class="form-control" id="bank_account_ledger_id" name="bank_account_ledger_id"><option value="">--Select Bank Account--</option>
                      <option value="03023e76-c7c6-49d6-84f7-020ec49ccd5d">My Ledget 04 DR 1</option>
                      <option value="d2edb2a9-e5a0-4dd2-988b-1ac73ee10188">Akash Ramchiary</option>
                      </select>
                    <span class="field-validation-valid" data-valmsg-for="BankAccountLedgerId" data-valmsg-replace="true"></span>
                </div>
            </div>
        </div>


        </div>
    </div>  

      </div>
  </div>

                <div class="box-footer">
                  <div class="col-xs-12 text-center ">
                    <div class="form-group">
                       <input type="button" onclick="update_row()" value="Save" class="btn btn-flat btn-success"/>
                      <a class="btn btn-flat btn-danger" href="{{route('admin.fixedDeposit.index')}}">Cancel</a>
                    </div>
                  </div>
                </div> 

             </form>
                            
          </div>
      </div>
  </div>
</div>
</section>
