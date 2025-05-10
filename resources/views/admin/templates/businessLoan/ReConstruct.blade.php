<section class="content-header">
  <h1> Re-Construct EMI
 - <small>[ {{$row['account_no']}} ]</small> <input id="returnUrl" name="returnUrl" type="hidden" value="" autocomplete="off">
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
    <li><a href="{{route('admin.businessLoan.manage',array('id' => $row['uuid']))}}">Loan Account- {{$row['account_no']}}</a></li>
    <li class="active">Re-Construct EMI
</li>
  </ol>
</section>


<section class="content">
  <div class="row">
   
    <div class="col-md-6">
      <div class="box box-solid">
        <div class="box-header"></div>
        <div class="box-body">
          <div class="col-md-12">
           <form id="add_ReConstruct_form" method="POST" name="add_ReConstruct_form" autocomplete="off" >
            {{csrf_field()}}
             <input type="hidden" name="update_id" id="update_id" value="{{$row['uuid']}}" />
             <input type="hidden" name="customer_id" value="{{$row['customer_id']}}" />
             <input type="hidden" name="account_id" value="{{$row['id']}}" />
             <input type="hidden" name="back_url" value="{{route('admin.businessLoan.manage',array('id' => $row['uuid']))}}" />
             
            <div class="form-horizontal">
              
              <div class="form-group">
                <label class="col-sm-4 control-label">Date <span class="requiredfield">*</span></label>
                <div class="col-sm-7">
                    <input class="form-control" id="application_date" name="opening_date" type="date" value="<?= date('Y-m-d') ?>">
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-4 control-label">Balance as on date</label>
                <div class="col-sm-7">
                  <input class="form-control" id="DueAmount" name="loan_amount" readonly="readonly" type="text" value="{{$PendingEMI_Amount}}" >
                  
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Interest due but not debited</label>
                <div class="col-sm-7">
                  <input class="form-control" id="InterestOccured" name="other_charges" type="text" value="0">
                </div>
              </div>
            
                <div class="form-group">
                <label class="col-sm-4 control-label">Penalty Charge</label>
                <div class="col-sm-7">
                  <input class="form-control" id="PenaltyCharge" name="penalty_charge"  type="text" value="0">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Penalty waive off</label>
                <div class="col-sm-7">
                  <input class="form-control" id="PenaltyChargeWaveoff" name="penalty_chargeWave_off" type="text" value="0">
                </div>
              </div>
                
              
              <div class="form-group">
                <label class="col-sm-4 control-label">Total balance</label>
                <div class="col-sm-7">
                  <input class="form-control" id="TotalAmount" name="loan_amount" readonly="readonly" type="text" value="{{$PendingEMI_Amount}}">
                </div>
              </div>
              
                <div class="form-group">
                <label class="col-sm-4 control-label">First EMI Date</label>
                <div class="col-sm-7">
                    <input class="form-control" id="FirstEMIDate" name="opening_date" type="date" value="<?= date('Y-m-d') ?>">
                </div>
              </div>
              
               <div class="form-group">
                <label class="col-sm-4 control-label">Tenure(in Monthly)</label>
                <div class="col-sm-7">
                  <input class="form-control" id="loan_tenure" name="loan_tenure"  type="text" value="{{$row->tenure}}">
                </div>
              </div>
              
               <div class="form-group">
                <label class="col-sm-4 control-label">Annual Interest Rate(%)*</label>
                <div class="col-sm-7">
                  <input value="{{$row->annual_interest_rate}}" class="form-control" id="InterestRate" name="InterestRate" readonly="readonly" type="text">
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