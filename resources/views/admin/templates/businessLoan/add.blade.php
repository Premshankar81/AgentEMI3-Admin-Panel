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
                  <input class="form-control" id="application_date" name="application_date" type="date" required>
              </div>
          </div>

            <div class="form-group">
                <label class="col-sm-4">Customer's Name <span class="requiredfield">*</span></label>
                <div class="col-sm-7">
                    <input class="form-control" id="customer_name" name="customer_name" type="text" >
                </div>
            </div>

          <div class="form-group">
              <label class="col-sm-4 control-label">Address</label>
              <div class="col-sm-7">
                <textarea class="form-control" rows="4" id="customer_address" name="customer_address" required></textarea>
              </div>
          </div>

        <div class="form-group">
            <label class="col-sm-4 control-label">Agent's Name <span class="requiredfield">*</span></label>
            <div class="col-sm-7">
                <select class="form-control" id="employee_name" name="employee_name">
                    <option value="" disabled selected>Select Employee</option>
                    @foreach($employees as $employee)
                      <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                    @endforeach
                  </select>
            </div>
        </div>

          <div class="form-group">
              <label class="col-sm-4">Co-Applicant's Name</label>
              <div class="col-sm-7">
                   <select id="co_applicant_member_id" name="co_applicant_member_id" class="form-control selectpicker">
                      <option value="">Select Co-Applicant's Name </option>
                      @foreach($Members as $key => $Member)
                        <option data-closing_balance="{{$Member['closing_balance']}}"  value="{{$Member['id']}}">{{$Member['name']}}</option>    
                      @endforeach
                  </select>
              </div>
          </div>

           <div class="form-group">
              <label class="col-sm-4">Loan Scheme <span class="requiredfield">*</span></label>
              <input type="hidden" name="annual_interest_rate" id="annual_interest_rate" >
              <div class="col-sm-7">
                  <select id="scheme_id" name="scheme_id" class="form-control selectpicker" required onchange="get_schemeDetails()">
                  <option value="">Select Loan Scheme </option>
                  @foreach($loan_schemes as $key => $scheme)
                      <option  value="{{$scheme['id']}}">{{$scheme['name']}}-{{$scheme['scheme_code']}}</option>    
                  @endforeach
              </select>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-4 control-label">Scheme Info</label>
              <div class="col-sm-7">
                <textarea class="form-control" rows="4" id="scheme_info" name="scheme_info" required></textarea>
              </div>
          </div>

       

        <div class="form-group">
            <label class="col-sm-4 control-label">EMI Payout<span class="requiredfield">*</span></label>
            <div class="col-sm-7">
                 <select class="form-control" id="emi_payout" name="emi_payout" required>
                       <option value="">Select</option>
                       <option value="daily">Daily</option>
                       <option value="weekly">Weekly</option>
                       <option value="bi_weekly">Bi_Weekly</option>
                       <option value="monthly">Monthly</option>
                       <option value="quarterly">Quarterly</option>
                       <option value="half_yearly">Half Yearly</option>
                       <option value="yearly">Yearly</option>
                    </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label" id="TenureCaption">Tenure (No of EMIs)<span class="requiredfield">*</span></label>
            <div class="col-sm-7">
                <input class="form-control" id="tenure" name="tenure" type="number" required>
            
            </div>
        </div>


    </div>
</div>
  <div class="col-md-6">
      <div class="form-horizontal">

         


    <div class="form-group">
            <label class="col-sm-4 control-label">Security Type<span class="requiredfield">*</span></label>
            <div class="col-sm-7">
                <select class="form-control" id="security_type" name="security_type" required>
                    <option value="">select Security Type</option>
                    <option value="loan_against_cheque">Loan against Cheque</option>
                    <option value="loan_against_gold">Loan against Gold</option>
                    <option value="others">Others</option>
                    </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label">Reference No</label>
            <div class="col-sm-7">
                <input class="form-control" id="reference_no" name="reference_no" type="text" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label">Amount of loan Requested</label>
            <div class="col-sm-7">
                <input class="form-control" id="loan_amount_requested" name="loan_amount_requested" type="number" >
            </div>
        </div>

         <div class="form-group">
             <label class="col-sm-4 control-label">Collection Charge</label>
             <div class="col-sm-7">
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

        <div class="form-group">
            <label class="col-sm-4 control-label">Nature of Business</label>
            <div class="col-sm-7">
                <input class="form-control" id="nature_of_business" name="nature_of_business" type="text" >
            </div>
        </div>

         <div class="form-group">
            <label class="col-sm-4 control-label">Purpose Of Loan</label>
            <div class="col-sm-7">
                <input class="form-control" id="purpose_of_loan" name="purpose_of_loan" type="text" >
            </div>
        </div>

         <div class="form-group">
              <label class="col-sm-4">First Guaranter's Name</label>
              <div class="col-sm-7">
                <input class="form-control" id="guaranter_first_name" name="guaranter_first_name" type="text" >
            </div>
          </div>

          <div class="form-group">
              <label class="col-sm-4">Second Guaranter's Name</label>
              <div class="col-sm-7">
                <input class="form-control" id="guaranter_second_name" name="guaranter_second_name" type="text" >    
              </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label">Witness1's Name</label>
            <div class="col-sm-7">
                <input class="form-control" id="name_of_witness_first" name="name_of_witness_first" type="text" >
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-4 control-label">Witness1's Address</label>
            <div class="col-sm-7">
                <input class="form-control" id="name_of_witness_first_address" name="name_of_witness_first_address" type="text" >
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-4 control-label">Witness2's Name</label>
            <div class="col-sm-7">
                <input class="form-control" id="name_of_witness_second" name="name_of_witness_second" type="text" >
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-4 control-label">Witness2's Address</label>
            <div class="col-sm-7">
                <input class="form-control" id="name_of_witness_second_address" name="name_of_witness_second_address" type="text" >
            </div>
        </div>



       
        </div>
    </div>  
</div>
            

<div class="box-footer">
  <div class="col-xs-12 text-center ">
    <div class="form-group">
       <input type="submit" value="Save" class="btn btn-flat btn-success"/>
      <a class="btn btn-flat btn-danger" href="{{route('admin.businessLoan.index')}}">Cancel</a>
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