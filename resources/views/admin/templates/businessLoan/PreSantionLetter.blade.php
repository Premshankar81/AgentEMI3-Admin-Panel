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
    <li><a href="{{route('admin.businessLoan.manage',array('id' => $row['uuid']))}}">Loan Account - {{$row->account_no}}</a></li>
    <li class="active">Receipts</li>
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
                    <style>
                        table, p {
                            font-family: Calibri;
                            font-weight: 400;
                            font-size: 16px;
                            color: #333;
                        }
                    </style>

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

<p style="text-align:justify;text-align:center;font-size:18px;font-family: Calibri;"><strong>Sanction Letter</strong></p>
<p>&nbsp;</p>
<table style="width:100%;font-family: Calibri;border-collapse: collapse;font-size: 16px;color: #333;">  <tbody>   <tr>    <td style="text-align:left;font-size:medium;font-weight:bold;width:50%;">Ref No:<strong>RBLA046151</strong></td>    <td style="text-align:right;font-size:medium;font-weight:bold;width:50%;">Date:02/Feb/2023</td>   </tr>  </tbody> </table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p style="text-align:justify;text-align:left;font-family: Calibri;">Dear Sir/Madam</p>
<p>&nbsp;</p>
<p style="text-align:justify;text-align:left;font-family: Calibri;">Sub: Application for Business Loan vide Application No. RBLA046151</p>


<table style="width:100%;font-family: Calibri;border-collapse: collapse;font-size: 16px;color: #333;">
   <tbody>
      <tr>
         <td style="text-align:left;font-size:medium;width:150px;padding:5px;">Applicant Name</td>
         <td style="font-size:medium;padding:5px;">:{{@$row->customer->name}}</td>
      </tr>
      <tr>
         <td style="text-align:left;font-size:medium;width:150px;padding:5px;">Co-Applicant-1</td>
         <td style="font-size:medium;padding:5px;">:</td>
      </tr>
      <tr>
         <td style="text-align:left;font-size:medium;width:150px;padding:5px;">Co-Applicant-2</td>
         <td style="font-size:medium;padding:5px;">:</td>
      </tr>
   </tbody>
</table>

<p>&nbsp;</p>


<p>We {{Auth::guard('admin')->user()->name}} are pleased to inform you that with reference to the above application, we have in-principle sanctioned you a Business Loan loan facility, on the terms and conditions mentioned hereinafter and printed overleaf, the details of which are given below.</p>



<table border="1" style="width:100%;font-family: Calibri;border-collapse:collapse;">
   <tbody>
      <tr>
         <td style="text-align:left;font-size:medium;width:50%;padding:5px;">Loan amount sanctioned</td>
         <td style="text-align:left;font-size:medium;width:50%;padding:5px;">₹ <?= number_format(@$row->loan_amount) ?></td>
      </tr>
      <tr>
         <td style="text-align:left;font-size:medium;width:50%;padding:5px;">Term of Loan</td>
         <td style="text-align:left;font-size:medium;width:50%;padding:5px;">{{@$row->tenure}} EMI Payout: {{@$row->emi_payout}}</td>
      </tr>
      <tr>
         <td style="text-align:left;font-size:medium;width:50%;padding:5px;">Fixed Rate of Interest (ROI)</td> 
         <td style="text-align:left;font-size:medium;width:50%;padding:5px;">{{@$row->annual_interest_rate}}  %</td>
      </tr>
      <tr>
         <td style="text-align:left;font-size:medium;width:50%;padding:5px;">Amount of each EMI (on Monthly rest)**</td>
         <td style="text-align:left;font-size:medium;width:50%;padding:5px;">₹ {{@$loan_rows->emi}} / Monthly</td>
      </tr>
      <tr>
         <td style="text-align:left;font-size:medium;width:50%;padding:5px;">Processing Fees (Non Refundable)</td>
         <td style="text-align:left;font-size:medium;width:50%;padding:5px;">₹ {{@$row->processing_fees}}</td>
      </tr>
      <tr>
         <td style="text-align:left;font-size:medium;width:50%;padding:5px;">Stamp Duty (Non Refundable)</td>
         <td style="text-align:left;font-size:medium;width:50%;padding:5px;">₹ {{@$row->stamp_duty}}</td>
      </tr>
      <tr>
         <td style="text-align:left;font-size:medium;width:50%;padding:5px;">Nature of business</td>
         <td style="text-align:left;font-size:medium;width:50%;padding:5px;">{{@$row->nature_of_business}} </td>
      </tr>
      <tr>
         <td style="text-align:left;font-size:medium;width:50%;padding:5px;">Purpose of Loan</td>
         <td style="text-align:left;font-size:medium;width:50%;padding:5px;">{{@$row->purpose_of_loan}}</td>
      </tr>
   </tbody>
</table>

<p style="page-break-before: always">&nbsp;</p>
<p style="font-family: Calibri;"><strong>Special Conditions &amp; Credit Pre-Sanction Conditions</strong></p>
<ul>
   <li style="text-align: justify;font-family: Calibri;">Borrowers not to issue any Guarantee for any other loans without prior permission of the Nidhi.</li>
   <li style="text-align: justify;font-family: Calibri;">The Bank has a right to inspect the premises/ stocks/ Book-Debt statements and financial statements on a 24 hour notice. May appoint its agency to do the inspection. Will have the right to Demand payment of entire outstanding Loan at any point of time, in case of any irregularity is observed during the audits and also in case of non-adherence to the terms and conditions of this letter and agreement set.</li>
   <li style="text-align: justify;font-family: Calibri;">The Loan amount cannot be used for investment made in shares, debentures, advances and inter-corporate loans/ deposits to other companies (including subsidiary Companies).</li>
   <li style="text-align: justify;font-family: Calibri;">The facilities are being extended at the sole discretion of and the terms and conditions as well as Rate of Interest would be subject to periodic review, amendment or modification.</li>
   <li style="text-align: justify;font-family: Calibri;">The Bank shall be entitled to communicate in any manner it may deem fit, with the person/s or persons whose name/s is/are given for reference by the Borrowers/Co-Borrower(s), with a view to get assistance of such person/s in recovering the Loan amount.</li>
   <li style="text-align: justify;font-family: Calibri;">Any other terms and conditions as stipulated by the Bank from time to time.</li>
</ul>
<p style="text-align: justify;font-family: Calibri;">If required you may contact your <strong>“{{Auth::guard('admin')->user()->name}}”</strong> , your Relationship Officer Mr. Ashpakh Mulani will assist you. E-mail ID: info@gsanjyog.net Mobile No.: 8480005587 The above sanction is a financial sanction and is subject to.</p>
<ul>
   <li style="text-align: justify;font-family: Calibri;">Legal, Technical clearance and Positive Internal Checks / verification of the property being financed.</li>
   <li style="text-align: justify;font-family: Calibri;">Execution of Loan Agreement and other documents between you and <strong>“{{Auth::guard('admin')->user()->name}}”</strong> as per <strong>“{{Auth::guard('admin')->user()->name}}”</strong> policy and format as specified above.</li>
   <li style="text-align: justify;font-family: Calibri;">Terms and conditions as mentioned overleaf.</li>
</ul>
<p style="text-align: justify;font-family: Calibri;">The Borrowers/Co-Borrower(s) (if any) may please sign on all pages of this sanction letter and deliver the duplicate copy of this letter in due acceptance of the above mentioned terms and conditions.</p>
<p style="text-align: justify;font-family: Calibri;">We look forward to a mutually beneficial and long term relationship Thanking You,</p>
<p style="text-align: justify;font-family: Calibri;">For <strong>{{Auth::guard('admin')->user()->name}}</strong></p>
<p>&nbsp;</p>
<p style="text-align: justify;font-family: Calibri;">Authorized Signatory</p>
<p>&nbsp;</p>
<p style="text-align: justify;font-family: Calibri;">I / We have read the terms and conditions mentioned in this Sanction letter 
   and accept the same
</p>
<p>&nbsp;</p>
<p style="text-align: justify;font-family: Calibri;">Signatures</p>
<p style="text-align:justify;text-align:center;font-size:18px;"><strong>TERMS AND CONDITIONS ATTACHED TO SANCTION LETTER</strong></p>
<ol style="font-size:x-small;">
   <li style="text-align: justify;font-family: Calibri;"><strong>“{{Auth::guard('admin')->user()->name}}”</strong> expression shall include its subsidiaries, successors and assigns.</li>
   <li style="text-align: justify;font-family: Calibri;">This Sanction letter should not be construed as giving rise to binding obligations on the part of <strong>“{{Auth::guard('admin')->user()->name}}”</strong> to provide the loan mentioned overleaf (the “Facility”). The Facility mentioned overleaf will be available solely at <strong>“{{Auth::guard('admin')->user()->name}}”</strong> discretion and <strong>“{{Auth::guard('admin')->user()->name}}”</strong> will not be liable for any action taken by the customer on the basis of this sanction letter</li>
   <li style="text-align: justify;font-family: Calibri;">
      <strong>“{{Auth::guard('admin')->user()->name}}”</strong> shall be entitled to revoke the sanction of the Facility, inter- alia, in any of the following circumstances:  
      <ol type="i">
         <li style="text-align: justify;font-family: Calibri;">There is any material change in the purpose(s) for which the Facility have been sanctioned (“the purpose(s)”)</li>
         <li style="text-align: justify;font-family: Calibri;">In the sole judgment of <strong>“{{Auth::guard('admin')->user()->name}}”</strong>, any material fact has been concealed and / or become subsequently known;</li>
         <li style="text-align: justify;font-family: Calibri;">Any statement made by you or on your behalf in your application or otherwise, is incorrect, incomplete or misleading;</li>
         <li style="text-align: justify;font-family: Calibri;">The accepted copy of this letter duly signed by you is not received by IDFC Bank within the specified validity period (07 days);</li>
         <li style="text-align: justify;font-family: Calibri;">There is a default under or a breach of the terms and conditions of this letter or any other loan / facility offered by <strong>“{{Auth::guard('admin')->user()->name}}”</strong> or any other person/entity, to you / any of you;</li>
         <li style="text-align: justify;font-family: Calibri;">The legal / technical / valuation report on the property is not satisfactory to <strong>“{{Auth::guard('admin')->user()->name}}”</strong>i;</li>
      </ol>
   </li>
   <li style="text-align: justify;font-family: Calibri;">Customer shall buy insurance policy of an appropriate value from an insurance company acceptable to Bank and produce a copy of the receipt of premium issued by the insurance company for the record of the Bank. The Customer shall ensure to renew the insurance policy every year without break during the subsistence of loan unless it is one time policy.</li>
   <li style="text-align: justify;font-family: Calibri;">The term Marginal Cost of funds Lending Rate “MCLR” means the rate of interest fixed by the Nidhi from time to time as its prime lending rate by exercising its right to increase/decrease the MCLR based on its internal factors and the same will be notified on the Nidhi website.</li>
   <li style="text-align: justify;font-family: Calibri;">The term “Floating Rate of Interest” or “FROI” shall mean the percentage rate per annum decided by the Nidhi from time to time and announced/notified by the Nidhi from time to time and such FROI shall be linked to MCLR by a margin/ spread as specified from time to time and any change in MCLR, prior to or subsequent to disbursement of Loan, shall lead to a change in FROI and shall be communicated to the Customer(s) accordingly.</li>
   <li style="text-align: justify;font-family: Calibri;">EMI amount is intended to be kept constant irrespective of variation in FROI by changing the tenor of Loan. However, Nidhi is entitled to increase the EMI at its sole discretion. The tenor of the Loan shall also change as per change in EMI’s.</li>
</ol>
<p style="text-align: justify;font-family: Calibri;">The aforesaid terms will be valid for a period of 7 days from date of this sanction letter</p>


                </div>
            </div>
        </div>
    </section>
