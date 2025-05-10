<section class="content-header">

<h1>
<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
                <a target="_blank" class="btn btn-default flat print-button print-page" id="btnPrint"><i class="fa fa-print"></i> Print</a>
        </div>
    </div>
</div>
</h1>

<ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('admin.businessLoan.manage',array('id' => $row['uuid']))}}">Loan Account  - {{$row->account_no}}</a></li>
    <li class="active">Receipts</li>
</ol>
</section>


<section class="content">
<div class="box">
<div class="box-body" id="printDiv">
<div class="form-horizontal">
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
            <span style="text-align:center;font-size:small;">E: {{Auth::guard('admin')->user()->pdf_email}} M: {{Auth::guard('admin')->user()->pdf_mobile}} Regd: {{Auth::guard('admin')->user()->pdf_cin}}</span></td>
            <td style="width: 180px; height: 90px;">&nbsp;</td>
        </tr>
    </tbody>
</table>


<div style="padding-left:10px;">
<table style="width:100%;border-collapse:collapse;">
    <tbody><tr>
        <td style="width:20%"></td>
        <td style="text-align:center;width:60%">
            <strong>Acknowledgement</strong>
        </td>
        <td style="width:20%;text-align:right;color:gray;">OFFICE COPY</td>
    </tr>
</tbody></table>

<br>
<div>
    <div style="width:60%;float:left;">
        <table style="width:100%;border-collapse:collapse;" border="1">
            <tbody><tr>
                <td style="padding:5px;" colspan="2"><strong>Customer Detail</strong></td>
            </tr>
            <tr>
                <td style="padding:5px;width:40%;">Member Id</td>
                <td style="padding:5px;width:60%;">{{@$row->customer->customer_code}}</td>
            </tr>
            <tr>
                <td style="padding:5px;width:40%;">Customer's Name</td>
                <td style="padding:5px;width:60%;"> {{@$row->customer->name}}</td>
            </tr>
            <tr>
                <td style="padding:5px;width:40%;">'s Name</td>
                <td style="padding:5px;width:60%;"></td>
            </tr>
            <tr>
                <td style="padding:5px;width:40%;">Address</td>
                <td style="padding:5px;width:60%;">{{@$row->customer->present_address1}},{{@$row->customer->present_address2}},{{@$row->customer->present_area}},{{@$row->customer->present_pin_code}}</td>
            </tr>
            <tr>
                <td style="padding:5px;width:40%;">Mobile No.</td>
                <td style="padding:5px;width:60%;">{{@$row->customer->mobile}}</td>
            </tr>
            <tr>
                <td style="padding:5px;" colspan="2"><strong>Loan Detail</strong></td>
            </tr>
            <tr>
                <td style="padding:5px;width:40%;">Loan Account No</td>
                <td style="padding:5px;width:60%;"> {{$row->account_no}}</td>
            </tr>
            <tr>
                <td style="padding:5px;width:40%;">Loan Amount</td>
                <td style="padding:5px;width:60%;">
                   ₹ <?= number_format(@$row->loan_amount) ?>
                    <br>
                    Processing Fees:&nbsp;,&nbsp; Stamp Duty:&nbsp;0,&nbsp; Pre-EMI Int:&nbsp;0,&nbsp;Disburse Amount:&nbsp;
                </td>

            </tr>
            <tr>
                <td style="padding:5px;width:40%;">Interest Rate</td>
                <td style="padding:5px;width:60%;">{{@$row->annual_interest_rate}} %</td>
            </tr>
            <tr>
                <td style="padding:5px;width:40%;">Scheme Name</td>
                <td style="padding:5px;width:60%;">{{@$row->Loanscheme->scheme_code}} - {{@$row->Loanscheme->name}} </td>
            </tr>
        </tbody></table>

    </div>

    <div style="width:30%;float:right;text-align:right;">
        <div style="width:245px;height:240px;border:solid;border-radius:5px; float:right;text-align:center;padding:5px;border-color:gray;border-width:1px;">
            <img id="mycomputerimage" style="background-color:aliceblue; width:230px;height:225px;" src="">
        </div>
    </div>
    
</div>

<div style="clear:both;"></div>




<br>
<br>
<table style="width:100%;">
    <tbody><tr>
        <td style="width:50%;text-align:left;font-weight:bold;vertical-align:top;">Customer Signature</td>
        <td style="width:50%; text-align:right;font-weight:bold;vertical-align:top;">
            FOR  EAST INDIA MCS LTD
        </td>
    </tr>
    <tr>
        <td style="width:50%; text-align:left;padding-top:50px;">
             {{@$row->customer->name}}
        </td>
        
        <td style="width:50%; text-align:right;padding-top:50px;">
            Authorised Signatory
        </td>
    </tr>
</tbody></table>


</div>
<div>
<table style="width:100%;font-family:Calibri;font-size:small;">
<tbody><tr>
<td width="40%;"></td>
<td style="width:20%;text-align:center;padding:5px;">***End of Report***</td>
<td style="width:40%;text-align:right;">Generate By : Manoj Sharma at:03/04/2023 10:58:26</td>
</tr>
</tbody></table>
</div>
</div>

<p style="page-break-before: always"></p>

<div class="form-horizontal">
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
            <span style="text-align:center;font-size:small;">E: {{Auth::guard('admin')->user()->pdf_email}} M: {{Auth::guard('admin')->user()->pdf_mobile}} Regd: {{Auth::guard('admin')->user()->pdf_cin}}</span></td>
            <td style="width: 180px; height: 90px;">&nbsp;</td>
        </tr>
    </tbody>
</table>


<div style="padding-left:10px;">
<table style="width:100%;border-collapse:collapse;">
    <tbody><tr>
        <td style="width:20%"></td>
        <td style="text-align:center;width:60%">
            <strong>Acknowledgement</strong>
        </td>
        <td style="width:20%;text-align:right;color:gray;">CUSTOMER COPY</td>
    </tr>
</tbody></table>

<br>
<div>
    <div style="width:60%;float:left;">
        <table style="width:100%;border-collapse:collapse;" border="1">
            <tbody><tr>
                <td style="padding:5px;" colspan="2"><strong>Customer Detail</strong></td>
            </tr>
            <tr>
                <td style="padding:5px;width:40%;">Member Id</td>
                <td style="padding:5px;width:60%;">{{@$row->customer->customer_code}}</td>
            </tr>
            <tr>
                <td style="padding:5px;width:40%;">Customer's Name</td>
                <td style="padding:5px;width:60%;"> {{@$row->customer->name}}</td>
            </tr>
            <tr>
                <td style="padding:5px;width:40%;">'s Name</td>
                <td style="padding:5px;width:60%;"></td>
            </tr>
            <tr>
                <td style="padding:5px;width:40%;">Address</td>
                <td style="padding:5px;width:60%;">{{@$row->customer->present_address1}},{{@$row->customer->present_address2}},{{@$row->customer->present_area}},{{@$row->customer->present_pin_code}}</td>
            </tr>
            <tr>
                <td style="padding:5px;width:40%;">Mobile No.</td>
                <td style="padding:5px;width:60%;">{{@$row->customer->mobile}}</td>
            </tr>
            <tr>
                <td style="padding:5px;" colspan="2"><strong>Loan Detail</strong></td>
            </tr>
            <tr>
                <td style="padding:5px;width:40%;">Loan Account No</td>
                <td style="padding:5px;width:60%;"> {{$row->account_no}}</td>
            </tr>
            <tr>
                <td style="padding:5px;width:40%;">Loan Amount</td>
                <td style="padding:5px;width:60%;">
                    ₹ <?= number_format(@$row->loan_amount) ?>
                    <br>
                    Processing Fees:&nbsp;,&nbsp; Stamp Duty:&nbsp;0,&nbsp; Pre-EMI Int:&nbsp;0,&nbsp;Disburse Amount:&nbsp;
                </td>

            </tr>
            <tr>
                <td style="padding:5px;width:40%;">Interest Rate</td>
                <td style="padding:5px;width:60%;">{{@$row->annual_interest_rate}} %</td>
            </tr>
            <tr>
                <td style="padding:5px;width:40%;">Scheme Name</td>
                <td style="padding:5px;width:60%;">{{@$row->Loanscheme->scheme_code}} - {{@$row->Loanscheme->name}}</td>
            </tr>
        </tbody></table>
    </div>
    <div style="width:30%;float:right;text-align:right;">
        <div style="width:245px;height:240px;border:solid;border-radius:5px; float:right;text-align:center;padding:5px;border-color:gray;border-width:1px;">
            <img id="mycomputerimage" style="background-color:aliceblue; width:230px;height:225px;" src="">
        </div>
    </div>
    
</div>

<br>
<br>
<table style="width:100%;">
    <tbody><tr>
        <td style="width:50%;text-align:left;font-weight:bold;vertical-align:top;">Customer Signature</td>
        <td style="width:50%; text-align:right;font-weight:bold;vertical-align:top;">
            FOR  EAST INDIA MCS LTD
        </td>
    </tr>
    <tr>
        <td style="width:50%; text-align:left;padding-top:50px;">
             {{@$row->customer->name}}
        </td>

        <td style="width:50%; text-align:right;padding-top:50px;">
            Authorised Signatory
        </td>
    </tr>
</tbody></table>


</div>
<div>
<table style="width:100%;font-family:Calibri;font-size:small;">
<tbody><tr>
<td width="40%;"></td>
<td style="width:20%;text-align:center;padding:5px;">***End of Report***</td>
<td style="width:40%;text-align:right;">Generate By : Manoj Sharma at:03/04/2023 10:58:26</td>
</tr>
</tbody></table>
</div>
</div>

</div>
</div>
</section>