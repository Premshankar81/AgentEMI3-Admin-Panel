<section class="content-header">
    <h1>
        Set LIEN Amount - <small>[ {{$row->account_no}} ]</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.saving_account.manage',array('id' => $row['uuid']))}}">Saving Accounts - {{$row->account_no}} </a></li>
        <li class="active">Set LIEN Amount</li>
        
    </ol>
</section>

<section class="content padding-top-0">
    <div class="row">
        <form id="update_lien_amount_form" method="post" name="update_lien_amount_form" >
        {{csrf_field()}}
        <input type="hidden" name="update_id" id="update_id" value="{{$row['uuid']}}" />

        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header">
                </div>
                <div class="box-body">

                    <p>The Lien Amount is the Lock Amount. You can puts a lock on the amount, and the amount gets frozen. The account holders can’t withdraw the locked amount unless the bank removes the lien or lock.</p>
                    <br>
                    <div class="form-horizontal">

                        <div class="form-group">
                            <label class="col-sm-4 control-label">LIEN Amount<span class="requiredfield">*</span></label>
                            <div class="col-sm-7">
                                <input class="form-control" id="lien_amount" name="lien_amount" type="number" value="{{$row->lien_amount}}">
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
            </div>

        </div>
    </form>

       <div class="col-md-6">
         <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
            <div class="info-box-content">
               <span class="info-box-text  text-center" id="NetBalaneCaption">Available Balance</span>
               <span class="info-box-text text-center">₹</span>
               <span class="info-box-number  text-center" style="font-size:18px;" id="NetBalane">{{$row['available_balance']}} CR.</span>
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
</section>