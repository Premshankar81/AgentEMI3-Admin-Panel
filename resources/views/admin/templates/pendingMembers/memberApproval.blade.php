<section class="content-header">
   <h1>
      Member information verification
   </h1>
   <ol class="breadcrumb">
      <li><a href="\Home\Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="\Members\Index">Members List</a></li>
      <li class="active">Application Form</li>
   </ol>
</section>
<section class="content">
   <div class="box box-solid">
      <div class="box-header">
      </div>
      <div class="box-body">
         <div class="form-horizontal">
            <div class="col-md-9">
               <table style="width:100%;border-collapse:collapse;border-color:lightgray;" border="1">
                  <tbody>
                     <tr>
                        <td style="padding:5px;background-color:aliceblue;font-weight:bold;" colspan="2">Basic Information   <button type="button" class="btn btn-flat btn-warning pull-right" onclick="showprimaryinfo();">Cross verification of primary information</button></td>
                     </tr>
                     <tr>
                        <td style="width:25%;padding:5px;">
                           Name
                        </td>
                        <td style="width:75%;padding:5px;">{{$row['name']}}</td>
                     </tr>
                     <tr>
                        <td style="padding:5px;">
                           Enrollment Date
                        </td>
                        <td style="padding:5px;">{{Helper::getFromDate($row['joining_date'])}}</td>
                     </tr>
                     <?php if($row['relative_relation'] != ''){ ?>
                        <tr>
                        <td style="padding:5px;">
                           <?= ucfirst($row['relative_relation']) ?>
                        </td>
                        <td style="padding:5px;"><?= ucfirst($row['relative_name']) ?></td>
                     </tr>
                       <?php } ?>

                     
                     <tr>
                        <td style="padding:5px;">
                           D.O.B. (DD/MM/yyyy)
                        </td>
                        <td style="padding:5px;">{{Helper::getFromDate($row['dob'])}}</td>
                     </tr>
                     <tr>
                        <td style="padding:5px;">
                           Present Address
                        </td>
                        <td style="padding:5px;">{{$row['present_address1']}},{{$row['present_address2']}},{{$row['present_area']}},{{$row['present_pin_code']}}</td>
                     </tr>
                     <tr>
                        <td style="padding:5px;">
                           {{$row['permanent_address1']}},{{$row['permanent_address2']}},{{$row['permanent_area']}},{{$row['permanent_pin_code']}}
                        </td>
                        <td style="padding:5px;">
                           ,      
                        </td>
                     </tr>
                     <tr>
                        <td style="padding:5px;">
                           Contact Information
                        </td>
                        <td style="padding:5px;">Mob:{{$row['mobile']}} &nbsp; Email:{{$row['email']}}</td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="col-md-3" style="text-align: center; margin: auto;">
            </div>
            <div class="col-md-12">
               <table style="width:100%;border-collapse:collapse;border-color:lightgray;" border="1">
                  <tbody>
                     <tr>
                        <td style="padding:5px;background-color:aliceblue;font-weight:bold;" colspan="2">Employement Information</td>
                     </tr>
                     <tr>
                        <td style="padding:5px;width:25%;padding:5px;">
                           Employement Type
                        </td>
                        <td style="padding:5px;width:75%;padding:5px;"></td>
                     </tr>
                     <tr>
                        <td style="padding:5px;width:25%;padding:5px;">
                           <span>Business Name</span>
                        </td>
                        <td style="padding:5px;width:75%;padding:5px;"> </td>
                     </tr>
                     <tr>
                        <td style="padding:5px;width:25%;padding:5px;">
                           Business Address
                        </td>
                        <td style="padding:5px;width:75%;padding:5px;">
                        </td>
                     </tr>
                     <tr>
                        <td style="padding:5px;width:25%;">Occupation</td>
                        <td style="padding:5px;width:75%;">
                        </td>
                     </tr>
                     <tr>
                        <td style="padding:5px;width:30%;">Monthly Income</td>
                        <td style="padding:5px;width:70%;">
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="col-md-12">
               <table style="width:100%;border-collapse:collapse;border-color:lightgray;" border="1">
                  <tbody>
                     <tr>
                        <td style="padding:5px;background-color:aliceblue;font-weight:bold;" colspan="4">Bank Details</td>
                     </tr>
                     <tr>
                        <td style="width:25%;padding:5px;">
                           Holder Name
                        </td>
                        <td style="width:25%;padding:5px;">{{$row['name']}}
                        </td>
                        <td style="width:25%;padding:5px;">
                           A/c No.
                        </td>
                        <td style="width:25%;padding:5px;">{{$row['account_no']}}</td>
                     </tr>
                     <tr>
                        <td style="width:25%;padding:5px;">
                           Bank Name
                        </td>
                        <td style="width:25%;padding:5px;">{{$row['bank_name']}}</td>
                        <td style="width:25%;padding:5px;">
                           IFSC Code/ IFSC
                        </td>
                        <td style="width:25%;padding:5px;">{{$row['ifsc_code']}}</td>
                     </tr>
                     <tr>
                        <td style="width:25%;padding:5px;">
                           Account Type
                        </td>
                        <td style="width:75%;padding:5px;" colspan="3"><?= ucfirst($row['account_type']) ?></td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="col-md-12">
               <table style="width:100%;border-collapse:collapse;border-color:lightgray" border="1">
                  <thead>
                     <tr>
                        <th style="padding:5px;background-color:aliceblue;font-weight:bold;" colspan="4">Minor's Details</th>
                     </tr>
                     <tr>
                        <th style="padding:5px;">
                           Name
                        </th>
                        <th style="padding:5px;">
                           Enrollment Date
                        </th>
                        <th style="padding:5px;">
                           City
                        </th>
                        <th style="padding:5px;">
                           Mobile No
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                  </tbody>
               </table>
            </div>
            <div class="col-md-12">
               <table style="width:100%;border-collapse:collapse;border-color:lightgray" border="1">
                  <thead>
                     <tr>
                        <td colspan="5" style="padding:5px;background-color:aliceblue;font-weight:bold;">
                           Electricity Bill detail
                        </td>
                     </tr>
                     <tr>
                        <th style="padding:5px;">Meter No.</th>
                        <th style="padding:5px;">Consumer Id</th>
                        <th style="padding:5px;">Owner Name</th>
                        <th style="padding:5px;">Relation</th>
                        <th style="padding:5px;">Bill Date</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td style="padding:5px;">-</td>
                        <td style="padding:5px;">-</td>
                        <td style="padding:5px;">-</td>
                        <td style="padding:5px;">-</td>
                        <td style="padding:5px;">-</td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="col-md-12">
               <table style="width:100%;border-collapse:collapse;border-color:lightgray" border="1">
                  <tbody>
                     <tr>
                        <td style="padding:5px;background-color:aliceblue;font-weight:bold;" colspan="4">KYC Information</td>
                     </tr>
                     <tr>
                        <td style="width:25%;padding:5px;">
                           PAN
                        </td>
                        <td style="width:25%;padding:5px;">{{$row['pan']}}</td>
                        <td style="width:25%;padding:5px;">
                           Aadhar No
                        </td>
                        <td style="width:25%;padding:5px;">{{$row['aadharcard_no']}}</td>
                     </tr>
                     <tr>
                        <td style="width:25%;padding:5px;">
                           Voter Id No
                        </td>
                        <td style="width:25%;padding:5px;">{{$row['voter_id_no']}}</td>
                        <td style="width:25%;padding:5px;">
                           Ration Card No
                        </td>
                        <td style="width:25%;padding:5px;">{{$row['ration_card_no']}}</td>
                     </tr>
                     <tr>
                        <td style="width:25%;padding:5px;">
                           Driving License No
                        </td>
                        <td style="width:25%;padding:5px;">{{$row['driving_license_no']}}</td>
                        <td style="width:25%;padding:5px;">
                           Passport No
                        </td>
                        <td style="width:25%;padding:5px;">{{$row['passport_no']}}</td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="col-md-12">
               <table style="width:100%;border-collapse:collapse;border-color:lightgray;" border="1">
                  <tbody>
                     <tr>
                        <td style="padding:5px;background-color:aliceblue;font-weight:bold;" colspan="2">Membership Fees</td>
                     </tr>
                     <tr>
                        <td style="padding:5px;width:25%;padding:5px;">
                           Fee Amount
                        </td>
                        <td style="padding:5px;width:75%;padding:5px;">{{$row['membership_fee']}}</td>
                     </tr>
                     <tr>
                        <td style="padding:5px;width:25%;padding:5px;">
                           Payment Mode
                        </td>
                        <td style="padding:5px;width:75%;padding:5px;">Cash</td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="col-md-12">
               <table style="width:100%;border-collapse:collapse;border-color:lightgray;" border="1">
                  <tbody>
                     <tr>
                        <td style="padding:5px;background-color:aliceblue;font-weight:bold;" colspan="2">Share Allocation</td>
                     </tr>
                     <tr>
                        <td style="padding:5px;width:25%;padding:5px;">
                           No of Share
                        </td>
                        <td style="padding:5px;width:75%;padding:5px;">{{$row['no_of_share']}}</td>
                     </tr>
                     <tr>
                        <td style="padding:5px;width:25%;padding:5px;">
                           Payment Mode
                        </td>
                        <td style="padding:5px;width:75%;padding:5px;">Cash</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <div class="box box-solid">
      <div class="box-header">
      </div>
      <form name="MemberStatusForm" id="MemberStatusForm" method="post">
          {{csrf_field()}}
         <input type="hidden" name="update_id" type="hidden" value="{{$row['id']}}">                
         <div class="box-body">
            <div class="col-md-6">
               <div class="form-horizontal">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Status <span class="requiredfield">*</span></label>
                        <div class="col-sm-7">
                           <select class="form-control  required" id="memberstatus" name="memberstatus">
                              <option value=""></option>
                              <option value="active">Approved</option>
                              <option value="inactive">Not Approved</option>
                           </select>
                           <span class="field-validation-valid" data-valmsg-for="MemberStatus" data-valmsg-replace="true"></span>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Remarks</label>
                        <div class="col-sm-7">
                           <input class="form-control" id="MemberApprovalRemarks" name="MemberApprovalRemarks" type="text" value="" autocomplete="off">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="box-footer">
            <div class="col-xs-12 text-center">
               <div class="form-group">
                  <button type="submit" class="btn btn-flat btn-success">SUBMIT</button>
                  <a class="btn btn-flat btn-danger" href="/Members/PendingMembers">Cancel</a>
               </div>
            </div>
         </div>
      </form>
   </div>
</section>