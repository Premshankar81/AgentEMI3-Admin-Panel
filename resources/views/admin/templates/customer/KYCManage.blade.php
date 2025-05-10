<section class="content-header">
  <h1> KYC Details - <small>Sonu Yadav[OMN1012444]</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.customer.index')}}">Customer List</a></li>
        <li><a href="{{route('admin.customer.edit',array('id' => $row['customer_id']))}}">Customer View</a></li>
    <li class="active">KYC Detail</li>
  </ol>
</section>
<section class="content">
  <div class="box box-solid">
    <div class="box-header"></div>
    <div class="box-body">
    
   <form id="update_form_KYCManage" method="post" name="update_form_KYCManage" >
  {{csrf_field()}}
  <input type="hidden" name="update_id" id="update_id" value="{{$row['customer_id']}}" />

      <div class="form-horizontal">
        <table class="table table-bordered">
          <tbody>
            <tr class="success">
              <td style="padding:5px; width:30%; font-weight:bold;" colspan="5">A. Proof of Identity (Any one of the following)</td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;">I</td>
              <td style="padding:5px; width:40%;">Passport</td>
              <td style="padding:5px; width:5%;">
                <input  <?php if($row['kyc_passport'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
              </td>
              <td style="padding:5px; width:20%;">
                <input type="file" name="kyc_passport" class="btn btn-success btn-xs documentupload">
              </td>
              <td style="padding:5px;width:30%;display: flex;">
                <?php if($row['kyc_passport'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_passport']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
            </td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;">II</td>
              <td style="padding:5px; width:70%;">Aadhaar Card (Front)</td>
              <td style="padding:5px; width:5%;">
                <input  <?php if($row['kyc_aadhaar_card_front'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
              </td>
              <td style="padding:5px; width:20%;">
                 <input type="file" name="kyc_aadhaar_card_front" class="btn btn-success btn-xs documentupload">
              </td>
              <td style="padding:5px;width:30%;display: flex;">
                 <?php if($row['kyc_aadhaar_card_front'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_aadhaar_card_front']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
            </td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;"></td>
              <td style="padding:5px; width:70%;">Aadhaar Card (Back)</td>
              <td style="padding:5px; width:5%;">
                 <input  <?php if($row['kyc_aadhaar_card_back'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
              </td>
              <td style="padding:5px; width:20%;">
                  <input type="file" name="kyc_aadhaar_card_back" class="btn btn-success btn-xs documentupload">
              </td>
             <td style="padding:5px;width:30%;display: flex;">
                <?php if($row['kyc_aadhaar_card_back'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_aadhaar_card_back']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
            </td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;">III</td>
              <td style="padding:5px; width:70%;">Income Tax PAN Card</td>
              <td style="padding:5px; width:5%;">
                 <input  <?php if($row['kyc_pan'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
              </td>
              <td style="padding:5px; width:20%;">
                 <input type="file" name="kyc_pan" class="btn btn-success btn-xs documentupload">
              </td>
              <td style="padding:5px;width:30%;display: flex;">
                <?php if($row['kyc_pan'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_pan']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
            </td>

            </tr>
            <tr>
              <td style="padding:5px; width:5%;">IV</td>
              <td style="padding:5px; width:70%;">Electoral Photo Identity Card (Voter Card)</td>
              <td style="padding:5px; width:5%;">
                  <input  <?php if($row['kyc_voter_card'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
              </td>
              <td style="padding:5px; width:20%;">
                <input type="file" name="kyc_voter_card" class="btn btn-success btn-xs documentupload">
              </td>
            <td style="padding:5px;width:30%;display: flex;">
               <?php if($row['kyc_voter_card'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_voter_card']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
            </td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;">V</td>
              <td style="padding:5px; width:70%;">Driving License</td>
              <td style="padding:5px; width:5%;">
                <input  <?php if($row['kyc_driving_license'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
              </td>
              <td style="padding:5px; width:20%;">
                  <input type="file" name="kyc_driving_license" class="btn btn-success btn-xs documentupload">
              </td>
              <td style="padding:5px;width:30%;display: flex;">
               <?php if($row['kyc_driving_license'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_driving_license']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
            </td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;">VI</td>
              <td style="padding:5px; width:70%;">Ration Card</td>
              <td style="padding:5px; width:5%;">
                <input  <?php if($row['kyc_ration_card'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
              </td>
              <td style="padding:5px; width:20%;">
                 <input type="file" name="kyc_ration_card" class="btn btn-success btn-xs documentupload">
              </td>
              <td style="padding:5px;width:30%;display: flex;">
               <?php if($row['kyc_ration_card'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_ration_card']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
            </td>
            </tr>
            <tr class="success">
              <td style="padding:5px; width:25%;font-weight:bold;" colspan="4">B. Proof of Address (Any one of the following)</td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;">I</td>
              <td style="padding:5px; width:70%;">Passport</td>
              <td style="padding:5px; width:5%;">
                <input  <?php if($row['kyc_address_passport'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
              </td>
              <td style="padding:5px; width:20%;">
               <input type="file" name="kyc_address_passport" class="btn btn-success btn-xs documentupload">
              </td>
               <td style="padding:5px;width:30%;display: flex;">
               <?php if($row['kyc_address_passport'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_address_passport']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
            </td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;">II</td>
              <td style="padding:5px; width:70%;">Aadhaar Card (Front)</td>
              <td style="padding:5px; width:5%;">
                  <input  <?php if($row['kyc_address_aadhaar_card_front'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
              </td>
              <td style="padding:5px; width:20%;">
               <input type="file" name="kyc_address_aadhaar_card_front" class="btn btn-success btn-xs documentupload">
              </td>
               <td style="padding:5px;width:30%;display: flex;">
               <?php if($row['kyc_address_aadhaar_card_front'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_address_aadhaar_card_front']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
                </td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;"></td>
              <td style="padding:5px; width:70%;">Aadhaar Card (Back)</td>
              <td style="padding:5px; width:5%;">
                 <input  <?php if($row['kyc_address_aadhaar_card_back'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
              </td>
               <td style="padding:5px; width:20%;">
               <input type="file" name="kyc_address_aadhaar_card_back" class="btn btn-success btn-xs documentupload">
              </td>
               <td style="padding:5px;width:30%;display: flex;">
               <?php if($row['kyc_address_aadhaar_card_front'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_address_aadhaar_card_back']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
                </td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;">III</td>
              <td style="padding:5px; width:70%;">Electoral Photo identity card (Voter card)</td>
              <td style="padding:5px; width:5%;">
                <input  <?php if($row['kyc_address_kyc_voter_card'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">

              </td>
               <td style="padding:5px; width:20%;">
               <input type="file" name="kyc_address_kyc_voter_card" class="btn btn-success btn-xs documentupload">
              </td>
               <td style="padding:5px;width:30%;display: flex;">
               <?php if($row['kyc_address_kyc_voter_card'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_address_kyc_voter_card']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
                </td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;">IV</td>
              <td style="padding:5px; width:70%;">Driving License</td>
              <td style="padding:5px; width:5%;">
                <input  <?php if($row['kyc_address_driving_license'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
                
              </td>
               <td style="padding:5px; width:20%;">
               <input type="file" name="kyc_address_driving_license" class="btn btn-success btn-xs documentupload">
              </td>
               <td style="padding:5px;width:30%;display: flex;">
               <?php if($row['kyc_address_driving_license'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_address_driving_license']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
                </td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;">V</td>
              <td style="padding:5px; width:70%;">Ration Card</td>
              <td style="padding:5px; width:5%;">
                <input  <?php if($row['kyc_address_ration_card'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
                
              </td>
               <td style="padding:5px; width:20%;">
               <input type="file" name="kyc_address_ration_card" class="btn btn-success btn-xs documentupload">
              </td>
               <td style="padding:5px;width:30%;display: flex;">
               <?php if($row['kyc_address_ration_card'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_address_ration_card']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
                </td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;">VI</td>
              <td style="padding:5px; width:70%;">Telephone Bill</td>
              <td style="padding:5px; width:5%;">
                <input  <?php if($row['kyc_address_telephone_bill'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
                
              </td>
               <td style="padding:5px; width:20%;">
               <input type="file" name="kyc_address_telephone_bill" class="btn btn-success btn-xs documentupload">
              </td>
               <td style="padding:5px;width:30%;display: flex;">
               <?php if($row['kyc_address_telephone_bill'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_address_telephone_bill']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
                </td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;">VII</td>
              <td style="padding:5px; width:70%;">Bank A/c Statement</td>
              <td style="padding:5px; width:5%;">
                <input  <?php if($row['kyc_address_bank_statement'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
              </td>
               <td style="padding:5px; width:20%;">
               <input type="file" name="kyc_address_bank_statement" class="btn btn-success btn-xs documentupload">
              </td>
               <td style="padding:5px;width:30%;display: flex;">
               <?php if($row['kyc_address_bank_statement'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_address_bank_statement']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
                </td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;">VIII</td>
              <td style="padding:5px; width:70%;">Electricity Bill</td>
              <td style="padding:5px; width:5%;">
                <input  <?php if($row['kyc_address_electricity_bill'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
              </td>
               <td style="padding:5px; width:20%;">
               <input type="file" name="kyc_address_electricity_bill" class="btn btn-success btn-xs documentupload">
              </td>
               <td style="padding:5px;width:30%;display: flex;">
               <?php if($row['kyc_address_electricity_bill'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_address_electricity_bill']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
                </td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;">IX</td>
              <td style="padding:5px; width:70%;">LPG Gas Connection registration</td>
              <td style="padding:5px; width:5%;">
                <input  <?php if($row['kyc_address_lpg_gas'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
              </td>
               <td style="padding:5px; width:20%;">
               <input type="file" name="kyc_address_lpg_gas" class="btn btn-success btn-xs documentupload">
              </td>
               <td style="padding:5px;width:30%;display: flex;">
               <?php if($row['kyc_address_lpg_gas'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_address_lpg_gas']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
                </td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;">X</td>
              <td style="padding:5px; width:70%;">Trade License</td>
               <td style="padding:5px; width:5%;">
                <input  <?php if($row['kyc_address_trade_license'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
              </td>
               <td style="padding:5px; width:20%;">
               <input type="file" name="kyc_address_trade_license" class="btn btn-success btn-xs documentupload">
              </td>
               <td style="padding:5px;width:30%;display: flex;">
               <?php if($row['kyc_address_trade_license'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_address_trade_license']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
                </td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;">XI</td>
              <td style="padding:5px; width:70%;">Other Government Id</td>
              <td style="padding:5px; width:5%;">
                <input  <?php if($row['kyc_address_other_government_id'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
              </td>
               <td style="padding:5px; width:20%;">
               <input type="file" name="kyc_address_other_government_id" class="btn btn-success btn-xs documentupload">
              </td>
               <td style="padding:5px;width:30%;display: flex;">
               <?php if($row['kyc_address_other_government_id'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_address_other_government_id']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
                </td>
            </tr>
            <tr class="success">
              <td style="padding:5px; width:25%; font-weight:bold;" colspan="4">C. Other Documents</td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;">I</td>
              <td style="padding:5px; width:70%;">Passport Photograph</td>
               <td style="padding:5px; width:5%;">
                <input  <?php if($row['kyc_passport_photograph'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
              </td>
               <td style="padding:5px; width:20%;">
               <input type="file" name="kyc_passport_photograph" class="btn btn-success btn-xs documentupload">
              </td>
               <td style="padding:5px;width:30%;display: flex;">
               <?php if($row['kyc_passport_photograph'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_passport_photograph']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
                </td>
            </tr>
            <tr>
              <td style="padding:5px; width:5%;">II</td>
              <td style="padding:5px; width:70%;">Signature</td>
              <td style="padding:5px; width:5%;">
                <input  <?php if($row['kyc_signature'] != '') { echo "checked"; } ?> class="checkbox" data-val="true" type="checkbox" value="true">
              </td>
               <td style="padding:5px; width:20%;">
               <input type="file" name="kyc_signature" class="btn btn-success btn-xs documentupload">
              </td>
               <td style="padding:5px;width:30%;display: flex;">
               <?php if($row['kyc_signature'] != '') { ?>
                <a class="btn btn-default btn-xs" title="Download" target="_blank" href="{{config('constants.KYC_DOC')}}{{$row['kyc_signature']}}"><i class="fa fa-download"></i></a>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?, you want to delete.');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <?php } ?>
                </td>
            </tr>
          </tbody>
        </table>
      </div>

       <div class="box-footer">
              <div class="col-xs-12 text-center">
                <div class="form-group">
                  <button type="button" onclick="update_KYCManage()" class="btn btn-flat btn-success">SAVE</button>
                  <a class="btn btn-flat btn-danger" href="/Members/View/eca42d66-a7df-4570-b28a-2fa5c03cdb3e">Cancel</a>
                </div>
              </div>
            </div>

        </form>



    </div>
  </div>
</section>