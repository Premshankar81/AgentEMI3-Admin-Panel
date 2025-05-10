<section class="content-header">
    <h1>
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
        <a href="#" class="btn btn-default flat print-button print-page" id="btnPrint"><i class="fa fa-print"></i> Print</a>

            </div>
        </div>
    </div>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.fixedDeposit.manage',array('id' => $row['uuid']))}}">RD Account</a></li>
        <li class="active">RD Bond</li>
    </ol>
</section>

<section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="form-horizontal" id="printDiv">
                    <div style="margin-left:20px;margin-right:20px;">
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
<table style="width:100%;border-bottom: 1px solid;font-family: Calibri;font-size:18px;font-weight:400;">
    <tbody>
        <tr class="logo-space">
            <td style="width: 90px; height: 90px;"><img class="img" src="https://nidhiexpert.com/AppImages/Logo/acc27fe1-a8cb-42ae-8297-4b3e00d39e48.png" style="max-width:180px;max-height:120px;"></td>
            <td style="text-align:center;"><span style="text-align:center;font-size:40px;font-weight:bold;">{{Auth::guard('admin')->user()->name}}</span><br>
            <span style="text-align:center;font-size:small;">MAHARANA PRATAP CHOUK NANDED &nbsp;maharana pratap chouk ,nanded NANDED -431401 Maharashtra</span><br>
            <span style="text-align:center;font-size:small;">E: shreepandurangnidhi@gmail.com M: 8805208504 CIN: U65990MH2021PLN371663</span></td>
            <td style="width: 180px; height: 90px;">&nbsp;</td>
        </tr>
    </tbody>
</table>


<div style="width:100%;">
<div style="margin-right:20px;margin-top:0px;margin-left:20px;">
<p style="font-size:14px;text-align:center;"><strong>RECURRING DEPOSIT ADVICE (In lieu of recurring deposit)</strong></p>

<p style="font-size:14px;text-align:justify;">Dear Sir/Madam We have pleasure in confirming details of the following amount held in deposit with us. Please quote the Account Number in all correspondence. Thank you for Banking with us.</p>

<table border="1" style="font-size:14px; width:100%;border-collapse:collapse;">
	<tbody>
		<tr>
			<td style="width:20%;padding:5px;">Member's Name</td>
			<td style="width:30%;padding:5px;font-weight:bold;">{{@$row['customer']['name']}}</td>
			<td style="width:20%;padding:5px;">Member Code</td>
			<td style="width:30%;padding:5px;">{{@$row->customer->customer_code}}</td>
		</tr>
		<tr>
			<td style="width:20%;padding:5px;">Account No</td>
			<td style="width:30%;padding:5px;">{{$row->account_no}}</td>
			<td style="width:20%;padding:5px;">Scheme</td>
			<td style="width:30%;padding:5px;">{{@$row->FDscheme->scheme_code}} - {{@$row->FDscheme->name}}</td>
		</tr>
		<tr>
			<td style="width:20%;padding:5px;">Address</td>
			<td colspan="3" style="width:30%;padding:5px;">,, - </td>
		</tr>
		<tr>
			<td style="width:20%;padding:5px;">Operation Mode</td>
			<td style="width:30%;padding:5px;text-align:left;">Jointly</td>
			<td style="width:20%;padding:5px;">Agent Code</td>
			<td style="width:30%;padding:5px;">{{@$row->agent->agent_code}}</td>
		</tr>
		<tr>
			<td style="width:20%;padding:5px;">Minor Detail</td>
			<td colspan="3" style="padding:5px;text-align:left;"><b></b></td>
		</tr>
	</tbody>
</table>

<table border="1" style="font-size:14px;width:100%;border-collapse:collapse;">
	<tbody>
		<tr>
			<th style="padding:5px;text-align:center;">Amount</th>
			<th style="padding:5px;text-align:center;">Start Date</th>
			<th style="padding:5px;text-align:center;">Period of Deposit</th>
			<th style="padding:5px;text-align:center;">Rate of Interest(%)</th>
			<th style="padding:5px;text-align:center;">Interest Compounding</th>
			<th style="padding:5px;text-align:center;">Frequency</th>
			<th style="padding:5px;text-align:center;">Principal Deposited</th>
			<th style="padding:5px;text-align:center;">Maturity Date</th>
			<th style="padding:5px;text-align:center;">Maturity Amount</th>
		</tr>
		<tr>
			<td style="padding:5px;text-align:center;">₹ {{@$row->fd_amount}}</td>
			<td style="padding:5px;text-align:center;">{{Helper::getFromDate($row->application_date)}}</td>
			<td style="padding:5px;text-align:center;"> {{@$row->fd_tenure}} - Months</td>
			<td style="padding:5px;text-align:center;">{{@$row->interest_rate}}%</td>
			<td style="padding:5px;text-align:center;">Yearly</td>
			<td style="padding:5px;text-align:center;"><?= ucfirst(@$row->rd_frequency) ?></td>
			<td style="padding:5px;text-align:center;">{{@$row->fd_principal}}</td>
			<td style="padding:5px;text-align:center;">{{Helper::getFromDate($row->maturity_date)}}</td>
			<td style="padding:5px;text-align:center;">₹ {{@$row->maturity_amount}}</td>
		</tr>
	</tbody>
</table>
<p>&nbsp;</p>


<table style="width:100%;border-collapse:collapse;" border="1">
   <tbody>
      <tr>
         <th style="width:20%;padding:2px;text-align:center;">Nominee Name</th>
         <th style="width:40%;padding:2px;text-align:center;">Address</th>
         <th style="width:20%;padding:2px;text-align:center;">Relation</th>
         <th style="width:10%;padding:2px;text-align:center;">DOB</th>
         <th style="width:10%;padding:2px;text-align:center;">Mobile No</th>
      </tr>
   <?php if(json_decode($row['nominee'])  > 0 ){ ?>
    <?php foreach (json_decode($row['nominee']) as $key => $nominee): ?>
      <tr>
         <td style="width:20%;padding:2px;text-align:left;"><?= $nominee->nominee_name ?></td>
         <td style="width:40%;padding:2px;text-align:left;"><?= $nominee->nominee_address ?></td>
         <td style="width:20%;padding:2px;text-align:left;"><?= ucfirst(str_replace('_',' ',$nominee->nominee_relation)) ?></td>
         <td style="width:10%;padding:5px;text-align:left;">{{Helper::getFromDate($nominee->nominee_dob)}}</td>
         <td style="width:10%;padding:2px;text-align:left;"><?= $nominee->nominee_mobile ?></td>
      </tr>
      <?php endforeach ?>
    <?php } ?>
   </tbody>
</table>

<table style="width:100%;">
	<tbody>
		<tr>
			<td style="width:50%;">&nbsp;</td>
			<td style="width:50%;text-align:right;"><b>FOR SHREE PANDURANG URBAN NIDHI LTD</b></td>
		</tr>
		<tr style="">
			<td style="width:50%;">&nbsp;</td>
			<td style="width:50%; text-align:right;padding-top:30px;">Authorised Signatory</td>
		</tr>
	</tbody>
</table>

<div style="font-size:smaller;">
<p><strong>Terms &amp; Conditions</strong></p>
<ul>
	<li>जमा की तारीख से 6 महीने तक (लॉक-इन-पीरियड) कोई चुकौती नहीं (जमाकर्ता की मृत्यु की स्थिति में चुकौती) और 3 महीने के बाद लेकिन 6 महीने से पहले, कोई ब्याज देय नहीं है।</li>
	<li>यदि जमा राशि को समय से पहले वापस ले लिया जाता है, तो ब्याज देय होता है और लागू दंड की गणना FINO प्रचलित नीति के आधार पर की जाएगी जो अनुरोध पर शाखा में सदस्य पर लागू होती है।</li>
	<li>कंपनी अपने विवेकाधिकार पर जमा राशि का 75% तक ऋण दे सकती है।</li>
	<li>बकाया ऋण के साथ जमा का नवीनीकरण अनुमत नहीं है। पूर्ण ऋण राशि के समायोजन के बाद भुगतान परिपक्वता पर किया जाएगा। यदि परिपक्वता के कम से कम 15 दिन पहले तीन शेष राशि के लिए नवीनीकरण इंस्ट्रक्शन प्राप्त नहीं होता है।</li>
</ul>
</div>
</div>
</div>

                    </div>
                </div>
            </div>
        </div>
    </section>