
<section class="content-header">
    <h1>
        {{$data['page_title']}}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.saving_account.index')}}">{{$data['page_title']}}</a></li>
        <li class="active">{{$data['page_title']}}</li>
    </ol>
</section>
@if($row['status'] == 'pending')
<div class="col-md-12" style="padding-bottom:10px;margin-top:20px ">
        <div class="alert alert-warning alert-dismissible margin-top-10 margin-bottom-0">
            <h4><i class="icon fa fa-ban"></i> ALERT PENDING FOR APPROVAL!</h4>
            <p class="ft-16">This saving account is pending for approval &nbsp; <a class="btn btn-danger" href="{{route('admin.businessLoan.approve-manage',array('id' => $row['uuid']))}}">Let's Do It!</a></p>
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
            <label class="col-sm-4 control-label">Agent's Name <span class="requiredfield">*</span></label>
            <div class="col-sm-7">
                <select id="agent_id" name="agent_id" class="form-control selectpicker" >
                  <option value="">Select Agent's Name </option>
                   <option value="">Select Agent's Name </option>
                   @foreach($agents as $key => $agent)
                      <option <?php if($agent['id']==$row->agent_id) { echo "selected"; }  ?> value="{{$agent['id']}}">{{$agent['name']}}-{{$agent['agent_code']}}</option>    
                   @endforeach
              </select>
            </div>
        </div>

          <div class="form-group">
              <label class="col-sm-4">Co-Applicant's Name</label>
              <div class="col-sm-7">
                   <select id="co_applicant_member_id" name="co_applicant_member_id" class="form-control selectpicker">
                      <option value="">Select Joint A/c Holder </option>
                      @foreach($Members as $key => $Member)
                        <option <?php if($Member['id']==$row->co_applicant_member_id) { echo "selected"; }  ?> data-closing_balance="{{$Member['closing_balance']}}"  value="{{$Member['id']}}">{{$Member['name']}}</option>    
                      @endforeach
                  </select>
              </div>
          </div>

           <div class="form-group">
              <label class="col-sm-4">Scheme <span class="requiredfield">*</span></label>
              <div class="col-sm-7">
                  <select id="scheme_id" name="scheme_id" class="form-control selectpicker" onchange="get_schemeDetails()">
                  <option value="">Select Minor's Name </option>
                  @foreach($loan_schemes as $key => $scheme)
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
            <label class="col-sm-4 control-label">EMI Payout<span class="requiredfield">*</span></label>
            <div class="col-sm-7">
                 <select class="form-control" id="emi_payout" name="emi_payout" required>
                   <option value="">Select</option>
   <option <?php if($row->emi_payout == 'daily') { echo "selected"; }  ?> value="daily">Daily</option>
   <option <?php if($row->emi_payout == 'weekly') { echo "selected"; }  ?> value="weekly">Weekly</option>
   <option <?php if($row->emi_payout == 'bi_weekly') { echo "selected"; }  ?> value="bi_weekly">Bi_Weekly</option>
   <option <?php if($row->emi_payout == 'monthly') { echo "selected"; }  ?> value="monthly">Monthly</option>
   <option <?php if($row->emi_payout == 'quarterly') { echo "selected"; }  ?> value="quarterly">Quarterly</option>
   <option <?php if($row->emi_payout == 'half_yearly') { echo "selected"; }  ?> value="half_yearly">Half Yearly</option>
   <option <?php if($row->emi_payout == 'yearly') { echo "selected"; }  ?> value="yearly">Yearly</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label" id="TenureCaption">Tenure (No of EMIs)<span class="requiredfield">*</span></label>
            <div class="col-sm-7">
                <input class="form-control" id="tenure" name="tenure" type="text" value="{{$row->tenure}}">
            
            </div>
        </div>


     


    </div>
</div>
  <div class="col-md-6">
      <div class="form-horizontal">
         
         

          
     <div class="form-group">
        <label class="col-sm-4 control-label">Security Type<span class="requiredfield">*</span></label>
        <div class="col-sm-7">
            <select class="form-control" id="security_type" name="security_type">
              <option value="">select Security Type</option>
              <option <?php if($row->security_type == 'loan_against_cheque') { echo "selected"; }  ?> value="loan_against_cheque">Loan against Cheque</option>
              <option <?php if($row->security_type == 'loan_against_gold') { echo "selected"; }  ?> value="loan_against_gold">Loan against Gold</option>
              <option <?php if($row->security_type == 'others') { echo "selected"; }  ?> value="others">Others</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Reference No</label>
        <div class="col-sm-7">
            <input class="form-control" id="reference_no" name="reference_no" type="text" value="{{$row->reference_no}}" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Amount of loan Requested</label>
        <div class="col-sm-7">
            <input class="form-control" id="loan_amount_requested" name="loan_amount_requested" type="text" value="{{$row->loan_amount_requested}}" >
        </div>
    </div>


    <div class="form-group">
     <label class="col-sm-4 control-label">Collection Charge</label>
     <div class="col-sm-7">
        <div class="input-group">
           <div class="input-group-addon padding-0" style="padding:0px;">
              <select class=" bg-white no-border" id="collection_charge" name="collection_charge" style="height: 32px;background-color: #fff !important;">
                 <option value=""></option>
                <option <?php if($row['collection_charge'] == 'per') { echo "selected"; } ?> value="per">(%)</option>
                <option <?php if($row['collection_charge'] == 'fixed') { echo "selected"; } ?> value="fixed">Fixed</option>
              </select>
           </div>
           <input class="form-control"id="collection_charge_value" name="collection_charge_value" type="text" value="{{$row->collection_charge_value}}">
        </div>
        
     </div>
  </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Nature of Business</label>
        <div class="col-sm-7">
            <input class="form-control" id="nature_of_business" name="nature_of_business" type="text" value="{{$row->nature_of_business}}">
        </div>
    </div>

     <div class="form-group">
        <label class="col-sm-4 control-label">Purpose Of Loan</label>
        <div class="col-sm-7">
            <input class="form-control" id="purpose_of_loan" name="purpose_of_loan" type="text" value="{{$row->purpose_of_loan}}">
        </div>
    </div>

    <div class="form-group">
          <label class="col-sm-4">First Guaranter's Name</label>
          <div class="col-sm-7">
               <select id="guaranter_first" name="guaranter_first" class="form-control selectpicker">
                  <option value="">Select Guaranter's Name </option>
                  @foreach($Members as $key => $Member)
                    <option <?php if($Member['id']==$row->guaranter_first) { echo "selected"; }  ?> value="{{$Member['id']}}">{{$Member['name']}}</option>    
                  @endforeach
              </select>
          </div>
      </div>

      <div class="form-group">
          <label class="col-sm-4">Second Guaranter's Name</label>
          <div class="col-sm-7">
               <select id="guaranter_second" name="guaranter_second" class="form-control selectpicker">
                  <option value="">Select Guaranter's Name </option>
                  @foreach($Members as $key => $Member)
                    <option <?php if($Member['id']==$row->guaranter_second) { echo "selected"; }  ?> value="{{$Member['id']}}">{{$Member['name']}}</option>    
                  @endforeach
              </select>
          </div>
      </div>

       <div class="form-group">
            <label class="col-sm-4 control-label">Witness1's Name</label>
            <div class="col-sm-7">
                <input class="form-control" id="name_of_witness_first" name="name_of_witness_first" type="text"  value="{{$row->name_of_witness_first}}">
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-4 control-label">Witness1's Address</label>
            <div class="col-sm-7">
                <input class="form-control" id="name_of_witness_first_address" name="name_of_witness_first_address" type="text" value="{{$row->name_of_witness_first_address}}" >
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-4 control-label">Witness2's Name</label>
            <div class="col-sm-7">
                <input class="form-control" id="name_of_witness_second" name="name_of_witness_second" type="text"  value="{{$row->name_of_witness_second}}">
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-4 control-label">Witness2's Address</label>
            <div class="col-sm-7">
                <input class="form-control" id="name_of_witness_second_address" name="name_of_witness_second_address" type="text"  value="{{$row->name_of_witness_second_address}}">
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
                      <a class="btn btn-flat btn-danger" href="{{route('admin.businessLoan.index')}}">Cancel</a>
                    </div>
                  </div>
                </div> 

             </form>
                            
          </div>
      </div>
  </div>
</div>
</section>
