<section class="content-header">
<h1>
<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
	<a target="_block" href="{{ route('admin.customer.print_applicationForm',array('id' => $row['customer_id']))}}" class="btn btn-default flat print-button print-page" id="btnPrint"><i class="fa fa-print"></i> Print</a>
        

        </div>
    </div>
</div>
</h1>
<ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('admin.customer.index')}}">Member List</a></li>           
    <li><a href="{{route('admin.customer.edit',array('id' => $row['customer_id']))}}">Member View</a></li>  
    <li class="active">Application Form</li>
</ol>
</section>

<section class="content">
        <div class="box box-solid">
            <div class="box-header">
            </div>
            <div class="box-body">
                <div class="form-horizontal" id="printDiv">
                    <style>
    body {
        margin: 0;
        padding: 0;
    }

    @page {
        size: auto; /* auto is the initial value */
        margin: 5mm 5mm 5mm 5mm;
    }

    @media print {
        @page {
            size: portrait
        }
    }

    #scissors div {
        position: relative;
        top: 50%;
        border-top: 1px dashed gray;
        margin-top: -3px;
    }

    .reporttable {
        font-family: Calibri;
        border-collapse: collapse;
        font-weight: 400;
        font-size: 11px;
        line-height: 1.42857143;
        color: #333;
        width: 100%;
    }

        .reporttable td, .reporttable th {
            border: 1px solid #ddd;
            padding: 2px;
        }

        .reporttable th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #f2f2f2;
        }

    printDiv table, p {
        font-family: Calibri;
        font-weight: 400;
        font-size: 12px;
        color: #333;
    }

    table, p {
        font-family: Calibri;
        font-weight: 400;
        font-size: 12px;
        color: #333;
    }

    printDiv li {
        font-family: Calibri;
        font-weight: 400;
        font-size: 12px;
        color: #333;
    }

    ol li {
        font-family: Calibri;
        font-weight: 400;
        font-size: 12px;
        color: #333;
    }
</style>
<p></p>
<table style="width:100%;border-bottom: 1px solid;font-family: Calibri;font-size:18px;font-weight:400;margin-bottom: 10px;">
    <tbody>
        <tr class="logo-space">
            <td style="width: 90px; height: 90px;">
                @if(!empty(Auth::guard('admin')->user()->pdf_logo))
                    <img src="{{config('constants.SYSTEM')}}{{Auth::guard('admin')->user()->pdf_logo}}" class="img" style="max-width:180px;max-height:120px;padding: 10px;"  />
                @else
                 <img src="{{config('constants.DEFAULT_IMAGE')}}" class="img" style="max-width:180px;max-height:120px;padding: 10px;"  />
                @endif
            </td>

            <td style="text-align:center;"><span style="text-align:center;font-size:35px;font-weight:bold;">{{Auth::guard('admin')->user()->pdf_title}}</span><br>
            <span style="text-align:center;font-size:small;">{{Auth::guard('admin')->user()->pdf_address}}</span><br>
            <span style="text-align:center;font-size:small;">E: {{Auth::guard('admin')->user()->pdf_email}} M: {{Auth::guard('admin')->user()->pdf_mobile}} CIN: {{Auth::guard('admin')->user()->pdf_cin}}</span></td>
            <td style="width: 180px; height: 90px;">&nbsp;</td>
        </tr>
    </tbody>
</table>

<p></p>

<table style="width:100%;">
	<tbody>
		<tr>
			<td style="text-align:center;font-size:large;font-weight:bold;padding-bottom:10px;">Membership Form</td>
		</tr>
	</tbody>
</table>

<p>&nbsp;</p>

<table border="1" style="width:100%;border-collapse:collapse;">
	<tbody>
		<tr>
			<td style="width:25%;padding:5px;font-weight:bold;">Name</td>
			<td style="width:50%;padding:5px;font-weight:bold;"><?= ucfirst($row['prifix_name']) ?>{{$row['name']}}</td>
			<td rowspan="6" style="width:25%;padding:5px;text-align:center;">
			    <img src="{{config('constants.KYC_DOC')}}{{$row['kyc_passport_photograph']}}" style="width:150px;height:150px;">
			    </td>
		</tr>
		<tr>
			<td style="width:25%;padding:5px;font-weight:bold;">Enrollment Date</td>
			<td style="width:50%;padding:5px;font-weight:bold;">{{Helper::getFromDate($row['joining_date'])}}</td>
		</tr>
	
		<tr>
			<td style="width:25%;padding:5px;font-weight:bold;"><?= ucfirst($row['relative_relation']) ?></td>
			<td style="width:50%;padding:5px;"><?= ucfirst($row['relative_name']) ?></td>
		</tr>
		<tr>
			<td style="width:25%;padding:5px;font-weight:bold;">D.O.B. (DD/MM/yyyy)</td>
			<td style="width:50%;padding:5px;">{{Helper::getFromDate($row['dob'])}}</td>
		</tr>
		<tr>
			<td style="width:25%;padding:5px;font-weight:bold;">Reference by/</td>
			<td style="width:50%;padding:5px;">&nbsp;</td>
		</tr>
		
		<tr>
			<td style="width:25%;padding:5px;font-weight:bold;">Class Name/</td>
			<td style="width:50%;padding:5px;">{{@$row['classname']['title']}}</td>
		</tr>
		
	</tbody>
</table>

<table border="1" style="width:100%;border-collapse:collapse;">
	<tbody>
		<tr>
			<td style="width:25%;padding:5px;font-weight:bold;">Mobile No</td>
			<td style="width:25%;padding:5px;">{{$row['mobile']}}</td>
			<td style="width:25%;padding:5px;font-weight:bold;">Email Address</td>
			<td style="width:25%;padding:5px;">{{$row['email']}}</td>
		</tr>
	</tbody>
</table>

<p><br>
<span style="font-weight:bold;font-family:Calibri;">Present Address</span></p>

<table border="1" style="width:100%;border-collapse:collapse;">
	<tbody>
		
		<tr>
			<td style="width:25%;padding:5px;font-weight:bold;">Address</td>
			<td colspan="3" style="width:75%;padding:5px;"> {{@$row['present_address1']}} , {{@$row['present_address2']}}</td>
		</tr>
		<tr>
			<td style="width:25%;padding:5px;font-weight:bold;">City</td>
			<td style="width:25%;padding:5px;">{{@$row['city']['title']}}</td>
			<td style="width:25%;padding:5px;font-weight:bold;">PIN</td>
			<td style="width:25%;padding:5px;">{{@$row['present_pin_code']}}</td>
		</tr>
		<tr>
			<td style="width:25%;padding:5px;font-weight:bold;">State</td>
			<td colspan="3" style="width:75%;padding:5px;">{{@$row['state']['title']}}</td>
		</tr>

	</tbody>
</table>

<p><br>
<span style="font-weight:bold;font-family:Calibri;">Permanent Address</span></p>

<table border="1" style="width:100%;border-collapse:collapse;">
	<tbody>
		<tr>
			<td style="width:25%;padding:5px;font-weight:bold;">Address</td>
			<td colspan="3" style="width:75%;padding:5px;"> {{@$row['permanent_address1']}} , {{@$row['permanent_address2']}} </td>
		</tr>
		<tr>
			<td style="width:25%;padding:5px;font-weight:bold;">City</td>
			<td style="width:25%;padding:5px;">{{@$row['permanent_city']['title']}}</td>
			<td style="width:25%;padding:5px;font-weight:bold;">PIN</td>
			<td style="width:25%;padding:5px;">{{@$row['permanent_pin_code']}} </td>
		</tr>
		<tr>
			<td style="width:25%;padding:5px;font-weight:bold;">State</td>
			<td colspan="3" style="width:75%;padding:5px;">{{@$row['permanent_state']['title']}}</td>
		</tr>
	</tbody>
</table>

<p><br>
<span style="font-weight:bold;font-family:Calibri;">Employement Information</span></p>

<table border="1" style="width:100%;border-collapse:collapse;">
	<tbody>
		<tr>
			<td style="padding:5px;width:25%;padding:5px;">Employement Type</td>
			<td style="padding:5px;width:75%;padding:5px;"><?= ucfirst($row['cust_prof_type']) ?></td>
		</tr>
		<tr>
			<td style="padding:5px;width:25%;padding:5px;">Business/Employer Name</td>
			<td style="padding:5px;width:75%;padding:5px;">{{$row['cust_prof_business']}}</td>
		</tr>
		<tr>
			<td style="padding:5px;width:25%;padding:5px;">Business Address</td>
			<td style="padding:5px;width:75%;padding:5px;"> {{$row['cust_prof_address1']}}   <br>
			 </td>
		</tr>
		<tr>
			<td style="padding:5px;width:25%;">Occupation</td>
			<td style="padding:5px;width:75%;">{{$row['cust_prof_occupation']}}</td>
		</tr>
		<tr>
			<td style="padding:5px;width:30%;">Monthly Income</td>
			<td style="padding:5px;width:70%;">{{$row['cust_prof_monthly_income']}}</td>
		</tr>
	</tbody>
</table>

<p><br>
<span style="font-weight:bold;font-family:Calibri;">Bank Details</span></p>

<table border="1" style="width:100%;border-collapse:collapse;">
	<tbody>
		<tr>
			<td style="width:25%;padding:5px;font-weight:bold;">Holder Name</td>
			<td style="width:25%;padding:5px;"><?= ucfirst($row['prifix_name']) ?>{{$row['name']}}</td>
			<td style="width:25%;padding:5px;font-weight:bold;">A/c No.</td>
			<td style="width:25%;padding:5px;">{{$row['account_no']}}</td>
		</tr>
		<tr>
			<td style="width:25%;padding:5px;font-weight:bold;">Bank Name</td>
			<td style="width:25%;padding:5px;">{{$row['bank_name']}}</td>
			<td style="width:25%;padding:5px;font-weight:bold;">IFSC Code/ IFSC</td>
			<td style="width:25%;padding:5px;">{{$row['ifsc_code']}}</td>
		</tr>
		<tr>
			<td style="width:25%;padding:5px;font-weight:bold;">Bank Address</td>
			<td colspan="3" style="width:75%;padding:5px;">{{$row['bank_address']}}</td>
		</tr>
	</tbody>
</table>

<p>&nbsp;</p>

<p>

<!--<span style="font-weight:bold;font-family:Calibri;">Minor's Details</span>
</p><table style="width:100%;border-collapse:collapse;" border="1">
    <thead>
        <tr>
            <th style="padding:5px;font-weight:bold;">
                Name
            </th>
            <th style="padding:5px;font-weight:bold;">
                Enrollment Date
            </th>
            <th style="padding:5px;font-weight:bold;">
                City
            </th>
            <th style="padding:5px;font-weight:bold;">
                Mobile No
            </th>
        </tr>
    </thead>
    <tbody>
    </tbody>

</table>-->
<p></p>

<p>&nbsp;</p>

<p>

<span style="font-weight:bold;font-family:Calibri;">Member's Nominee detail</span>
</p><table style="width:100%;border-collapse:collapse;" border="1">
    <thead>
        <tr>
            <th style="padding:5px;font-weight:bold;">
                Name
            </th>
            <th style="padding:5px;font-weight:bold;">
                Address
            </th>
            <th style="padding:5px;font-weight:bold;">
                Relation
            </th>
            <th style="padding:5px;font-weight:bold;">
                DOB
            </th>
            <th style="padding:5px;font-weight:bold;">
                Mobile No
            </th>
        </tr>
         <?php if(json_decode($row['member_nominee'])  > 0 ){ ?>
            @foreach (json_decode($row['member_nominee']) as $key => $nominee)
                <tr>
                    <td><?= $nominee->nominee_name ?></td>
                    <td><?= $nominee->nominee_address ?></td>
                    <td><?= $nominee->nominee_relation ?></td>
                    <td><?= $nominee->nominee_dob ?></td>
                    <td><?= $nominee->nominee_mobile ?></td>
                </tr>
            @endforeach
            <?php } ?>
        
        
    </thead>
    <tbody>
    </tbody>

</table><p></p>

<table style="width:100%;">
	<tbody>
		<tr>
			<td style="text-align:center;font-size:medium;font-weight:bold;">Declaration</td>
		</tr>
	</tbody>
</table>

<table border="1" style="width:100%;border-collapse:collapse;">
	<tbody>
		<tr>
			<td style="padding-left:5px;padding-top:5px; padding-bottom:5px;">I <span style="font-weight:bold;"> <?= ucfirst($row['prifix_name']) ?>{{$row['name']}} &nbsp;</span> want to become a member of <b>{{Auth::guard('admin')->user()->name}}</b>. Also I do hereby declare and affirm that the particulars given by me are correct to the best of my knowledge and nothing has been concealed. I further certify that there are no legal/or police case is/are registered in my name. I am bound to accept all the rules and regulations formed by Registrar of Compaines in this regard.</td>
		</tr>
		<tr>
			<td style="padding:5px;text-align:right;width: 90px; height: 90px;">
			    <img class="img" src="{{config('constants.KYC_DOC')}}{{$row['kyc_signature']}}" style="max-width:180px;max-height:180px;"></td>
		</tr>
		<tr>
			<td style="padding:5px;text-align:right;">Signature of Applicant</td>
		</tr>
		<tr>
			<td>I <span style="font-weight:bold;"> <?= ucfirst($row['prifix_name']) ?>{{$row['name']}} &nbsp; </span> am paying Rs. <b>1000</b>/Rs as MEMBERSHIP<br>
			<br>
			for <b>1000</b> / 100 share as the case maybe.<br>
			<br>
			Date :<span style="font-weight:bold;"> 18/02/2023</span></td>
		</tr>
	</tbody>
</table>

<p><br>
<span style="font-weight:bold;">For Official use</span></p>

<table border="1" style="width:100%;border-collapse:collapse;">
	<tbody>
		<tr>
			<td style="padding:5px; width:25%;">ALLOTED MEMBERSHIP NO.</td>
			<td style="padding:5px; width:75%;"></td>
		</tr>
		<tr>
			<td style="padding:5px; width:25%;">INTRODUCER NAME</td>
			<td style="padding:5px;width:75%;"></td>
		</tr>
		<tr>
			<td style="padding:5px; width:25%;">INTRODUCER MEMBER NO.</td>
			<td style="padding:5px;width:75%;"></td>
		</tr>
		<tr>
			<td style="padding:5px; width:25%;">Entered By Operator (Name)</td>
			<td style="padding:5px;width:75%;"></td>
		</tr>
		<tr>
			<td style="padding:5px; width:25%;">Date</td>
			<td style="padding:5px;width:75%;"></td>
		</tr>
	</tbody>
</table>

<p><br>
<span style="font-weight:bold;font-family:Calibri;">KYC Information</span></p>

<table border="1" style="width:100%;border-collapse:collapse;">
	<tbody>
		<tr>
			<td style="width:25%;padding:2px;font-weight:bold;">PAN</td>
			<td style="width:25%;padding:2px;">{{$row['pan']}}</td>
			<td style="width:25%;padding:2px;font-weight:bold;">Aadhar No</td>
			<td style="width:25%;padding:2px;">{{$row['aadharcard_no']}}</td>
		</tr>
		<tr>
			<td style="width:25%;padding:2px;font-weight:bold;">Voter Id No</td>
			<td style="width:25%;padding:2px;">{{$row['voter_id_no']}}</td>
			<td style="width:25%;padding:2px;font-weight:bold;">Ration Card No</td>
			<td style="width:25%;padding:2px;">{{$row['ration_card_no']}}</td>
		</tr>
		<tr>
			<td style="width:25%;padding:2px;font-weight:bold;">Driving License No</td>
			<td style="width:25%;padding:2px;">{{$row['driving_license_no']}}</td>
			<td style="width:25%;padding:2px;font-weight:bold;">Passport No</td>
			<td style="width:25%;padding:2px;">{{$row['passport_no']}}</td>
		</tr>
	</tbody>
</table>

<p>&nbsp;</p>

<p>
</p><table style="width:100%;border-collapse:collapse;" border="1">

    <tbody><tr>
        <td style="padding:2px; width:25%; font-weight:bold;" colspan="3">A. Proof of Identity (Any one of the following)</td>
    </tr>

    <tr>
        <td style="padding:2px; width:5%;">I</td>
        <td style="padding:2px; width:50%;">Passport</td>
        <td style="width:45%;padding-left:2px;">
    	<?php if($row['kyc_passport'] != '') { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> þ </div>
    	<?php } else { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> o </div>
    	<?php } ?>
        
        </td>
    </tr>
    <tr>
        <td style="padding:2px; width:5%;">II</td>
        <td style="padding:2px; width:50%;">Aadhaar Card (Front)</td>
        <td style="width:45%;padding-left:2px;">
        <?php if($row['kyc_aadhaar_card_front'] != '') { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> þ </div>
    	<?php } else { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> o </div>
    	<?php } ?>
        </td>
    </tr>
    <tr>
        <td style="padding:2px; width:5%;"></td>
        <td style="padding:2px; width:50%;">Aadhaar Card (Back)</td>
        <td style="width:45%;padding-left:2px;">
          <?php if($row['kyc_aadhaar_card_back'] != '') { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> þ </div>
    	<?php } else { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> o </div>
    	<?php } ?>
        </td>
    </tr>
    <tr>
        <td style="padding:2px; width:5%;">III</td>
        <td style="padding:2px; width:50%;">Income Tax PAN Card</td>
        <td style="width:45%;padding-left:2px;">
  	   <?php if($row['kyc_pan'] != '') { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> þ </div>
    	<?php } else { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> o </div>
    	<?php } ?>
        </td>
    </tr>
    <tr>
        <td style="padding:2px; width:5%;">IV</td>
        <td style="padding:2px; width:50%;">Electoral Photo Identity Card (Voter Card)</td>
        <td style="width:45%;padding-left:2px;">
      	<?php if($row['kyc_voter_card'] != '') { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> þ </div>
    	<?php } else { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> o </div>
    	<?php } ?>
        </td>
    </tr>
    <tr>
        <td style="padding:2px; width:5%;">V</td>
        <td style="padding:2px; width:50%;">Driving License</td>
        <td style="width:45%;padding-left:2px;">
        <?php if($row['kyc_driving_license'] != '') { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> þ </div>
    	<?php } else { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> o </div>
    	<?php } ?>
        </td>
    </tr>
    <tr>
        <td style="padding:2px; width:5%;">VI</td>
        <td style="padding:2px; width:50%;">Ration Card</td>
        <td style="width:45%;padding-left:2px;">
        <?php if($row['kyc_ration_card'] != '') { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> þ </div>
    	<?php } else { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> o </div>
    	<?php } ?>
        </td>
    </tr>

    <tr>
        <td style="padding:2px; width:25%;font-weight:bold;" colspan="3">B. Proof of Address (Any one of the following)</td>
    </tr>

    <tr>
        <td style="padding:2px; width:5%;">I</td>
        <td style="padding:2px; width:50%;">Passport</td>
        <td style="width:45%;padding-left:2px;">
          <?php if($row['kyc_address_passport'] != '') { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> þ </div>
    	<?php } else { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> o </div>
    	<?php } ?>
        </td>
    </tr>
    <tr>
        <td style="padding:2px; width:5%;">II</td>
        <td style="padding:2px; width:50%;">Aadhaar Card (Front)</td>
        <td style="width:45%;padding-left:2px;">
         <?php if($row['kyc_address_aadhaar_card_front'] != '') { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> þ </div>
    	<?php } else { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> o </div>
    	<?php } ?>

        </td>
    </tr>
    <tr>
        <td style="padding:2px; width:5%;"></td>
        <td style="padding:2px; width:50%;">Aadhaar Card (Back)</td>
        <td style="width:45%;padding-left:2px;">
         <?php if($row['kyc_address_aadhaar_card_back'] != '') { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> þ </div>
    	<?php } else { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> o </div>
    	<?php } ?>

        </td>
    </tr>
    <tr>
        <td style="padding:2px; width:5%;">III</td>
        <td style="padding:2px; width:50%;">Electoral Photo identity card (Voter card)</td>
        <td style="width:45%;padding-left:2px;">
        <?php if($row['kyc_address_kyc_voter_card'] != '') { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> þ </div>
    	<?php } else { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> o </div>
    	<?php } ?>

        </td>
    </tr>
    <tr>
        <td style="padding:2px; width:5%;">IV</td>
        <td style="padding:2px; width:50%;">Driving License</td>
        <td style="width:45%;padding-left:2px;">
		<?php if($row['kyc_address_driving_license'] != '') { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> þ </div>
    	<?php } else { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> o </div>
    	<?php } ?>

        </td>
    </tr>
    <tr>
        <td style="padding:2px; width:5%;">V</td>
        <td style="padding:2px; width:50%;">Ration Card</td>
        <td style="width:45%;padding-left:2px;">

         <?php if($row['kyc_address_ration_card'] != '') { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> þ </div>
    	<?php } else { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> o </div>
    	<?php } ?>

        </td>
    </tr>
    <tr>
        <td style="padding:2px; width:5%;">VI</td>
        <td style="padding:2px; width:50%;">Telephone Bill</td>
        <td style="width:45%;padding-left:2px;">
         <?php if($row['kyc_address_telephone_bill'] != '') { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> þ </div>
    	<?php } else { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> o </div>
    	<?php } ?>

        </td>
    </tr>
    <tr>
        <td style="padding:2px; width:5%;">VII</td>
        <td style="padding:2px; width:50%;">Bank A/c Statement</td>
        <td style="width:45%;padding-left:2px;">
         <?php if($row['kyc_address_bank_statement'] != '') { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> þ </div>
    	<?php } else { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> o </div>
    	<?php } ?>
        </td>
    </tr>
    <tr>
        <td style="padding:2px; width:5%;">VIII</td>
        <td style="padding:2px; width:50%;">Electricity Bill</td>
        <td style="width:45%;padding-left:2px;">
         <?php if($row['kyc_address_electricity_bill'] != '') { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> þ </div>
    	<?php } else { ?>
    		<div style="font-family:Wingdings;font-size:x-large;"> o </div>
    	<?php } ?>


        </td>
    </tr>
    <tr>
        <td style="padding:5px; width:5%;" colspan="3">
            (Document referred to serial numbers (vi), (vii) and (viii) above shall not be more than two months old) (One document from each category is must) 3 recent photo PP Size colour photographs. All photographs to be self attested and verified by Branch Manager.
        </td>
    </tr>
</tbody></table><p></p>

<p>&nbsp;</p>

<table style="width:100%;border-collapse:collapse;">
        <tbody><tr>
            <td style="padding-top:20px;" colspan="2">Remarks</td>
        </tr>
        <tr>
            <td style="padding-top:30px;width:50%;">Signature of Authorised Signatory</td>
            <td style="padding-top:30px;width:50%;text-align:right;">Company Seal</td>
        </tr>
    </tbody></table>   

        </div>
    </div>
</div>
</section>