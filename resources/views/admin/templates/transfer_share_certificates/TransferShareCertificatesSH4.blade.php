<section class="content-header">
  <h1>
    <script src="/Content/js/printthis.js"></script>
    <div class="row">
      <div class="col-xs-12">
        <div class="form-group">
          <form action="/Shared/ExportReportPdf" method="post" novalidate="novalidate">
            <a href="#" class="btn btn-default flat print-button print-page" id="btnPrint">
              <i class="fa fa-print"></i> Print </a>
          </form>
        </div>
      </div>
    </div>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
    <li>
      <a href="{{route('admin.transfer_share_certificates.index')}}">Shares List</a>
    </li>
    <li class="active">SH-1 Report</li>
  </ol>
</section>

<section class="content">
        <div class="box box-solid">
            <div class="box-header">
            </div>
            <div class="box-body">

                <div class="form-horizontal" id="printDiv">
                    <table>
                        <tbody><tr>
                            <td style="text-align:center;font-size:medium;font-weight:bold;">
                                Form No. SH-4
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:center;font-size:medium;font-weight:bold;">
                                Securities Transfer Form
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;font-size:medium;font-weight:bold;">
                                <br>
                                [Pursuant to section 56 of the Companies Act, 2013 and sub-rule (1) of rule 11 of the Companies (Share Capital and Debentures) Rules 2014]

                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:right;font-size:medium;">
                                <br>
                                Date of Execution:<span style="font-weight:bold;"> {{Helper::getFromDate($row['created_at'])}} </span>

                            </td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="text-align:justify;">
                                <br>
                                FOR THE CONSIDERATION stated below the “Transferor” <span style="font-weight:bold;"> {{$row['memberFromDetails']['name']}} </span>named do hereby transfer to the “Transferee” <span style="font-weight:bold;"> “{{$row['memberDetails']['name']}}” </span> named the securities specified below subject to the conditions on which the said securities are now
                                held by the Transferor(s) and the Transferee(s) do hereby agree to accept and hold the said securities subject to the conditions aforesaid.
                            </td>
                        </tr>
                    </tbody></table>
                    <br>

                    <table style="width:100%;border-collapse:collapse;" border="1">
                        <tbody><tr>
                            <td style="width:50%;padding:5px;"> CIN</td>
                            <td style="width:50%;padding:5px;"> {{Auth::guard('admin')->user()->pdf_cin}}</td>
                        </tr>cin
                        <tr>
                            <td style="width:50%;padding:5px;">Name of the company (in full) </td>
                            <td style="width:50%;padding:5px;">{{Auth::guard('admin')->user()->pdf_title}} </td>
                        </tr>
                        <tr>
                            <td style="width:50%;padding:5px;">
                                Name of the Stock Exchange where the company is listed, if any:
                            </td>
                            <td style="width:50%;padding:5px;"></td>
                        </tr>
                    </tbody></table>
                    <br>
                    <span style="font-weight:bold;">Description of Securities</span>
                    <table style="width:100%;border-collapse:collapse;" border="1">
                        <thead>
                            <tr>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:25%;padding:5px;">Kind/ Class of securities </th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:25%;padding:5px;">
                                    Nominal value of each unit of security
                                </th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:25%;padding:5px;">
                                    Nominal value of each unit of security
                                </th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:25%;padding:5px;">
                                    Amount paid up per unit of security
                                </th>
                            </tr>
                            <tr>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:25%;padding:5px;">(1)</th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:25%;padding:5px;">(2)</th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:25%;padding:5px;">(3)</th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:25%;padding:5px;">(4)</th>

                            </tr>
                        </thead>
                        <tbody><tr>
                            <td style="padding:5px;">Equity</td>
                            <td style="padding:5px;text-align:right;">10.00</td>
                            <td style="padding:5px;text-align:right;"></td>
                            <td style="padding:5px;text-align:right;"></td>
                        </tr>

                    </tbody></table>
                    <br>
                    <table style="width:100%;border-collapse:collapse;" border="1">
                        <thead>
                            <tr>
                                <th colspan="2" style="font-weight:bold;text-align:center;vertical-align:central; width:25%;padding:5px;">No. of securities being transferred </th>
                                <th colspan="2" style="font-weight:bold;text-align:center;vertical-align:central; width:25%;padding:5px;">Consideration received (Rs.)</th>
                            </tr>
                            <tr>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:25%;padding:5px;">In figures</th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:25%;padding:5px;">In Words</th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:25%;padding:5px;">In figures</th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:25%;padding:5px;">In Words</th>
                            </tr>
                        </thead>
                        <tbody><tr>
                            <td style="padding:5px;text-align:center;font-weight:bold;">1

</td>
                            <td style="padding:5px;text-align:center;font-weight:bold;">One</td>
                            <td style="padding:5px;text-align:center;font-weight:bold;">10.00</td>
                            <td style="padding:5px;text-align:center;font-weight:bold;">Ten Only. </td>
                        </tr>
                    </tbody></table>

                    <br>
                    <table style="width:100%;border-collapse:collapse;" border="1">
                        <tbody><tr>
                            <td rowspan="2" style="padding:5px;">Distinctive Number</td>
                            <td style="padding:5px;">From</td>
                            <td style="padding:5px;font-weight:bold;">1112</td>
                            
                        </tr>
                        <tr>
                            <td style="padding:5px;">To</td>
                            <td style="padding:5px;font-weight:bold;">1112</td>
                        </tr>
                        <tr>
                            <td style="padding:5px;">Corresponding Certificate Nos.</td>
                            <td colspan="2" style="padding:5px;"></td>
                        </tr>
                    </tbody></table>

                    <br>
                    <span style="font-weight:bold;">Transferor’s Particulars</span>
                    <table style="width:100%;border-collapse:collapse;" border="1">
                        <thead>
                            <tr>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:15%;padding:5px;">Registered Folio No. </th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:40%;padding:5px;">Name(s) in full</th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:50%;padding:5px;">Signature (s)</th>
                            </tr>
                        </thead>
                        <tbody><tr>
                            <th style="font-weight:bold;text-align:center;vertical-align:central; width:10%;padding:5px;">(1)</th>
                            <th style="font-weight:bold;text-align:center;vertical-align:central; width:40%;padding:5px;">(2)</th>
                            <th style="font-weight:bold;text-align:center;vertical-align:central; width:50%;padding:5px;">(3)</th>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;vertical-align:central; width:10%;padding:5px;">5

</td>
                            <td style="font-weight:bold;vertical-align:central; width:40%;padding:5px;">Aman Bansal</td>
                            <td style="font-weight:bold;vertical-align:central; width:50%;padding:5px;"></td>
                        </tr>
                    </tbody></table>
                    <br>
                    <p style="page-break-before: always"></p>
                    <table style="width:100%;border-collapse:collapse;padding:5px;" frame="box">
                        <tbody><tr><td style="padding:5px;">I, hereby confirm that the Transferor has signed before me. <br><br>Signature of witness<br><br>Name and address<br><br></td></tr>
                    </tbody></table>

                    <br>
                    <span style="font-weight:bold;">Transferee’s Particulars</span>
                    <table style="width:100%;border-collapse:collapse;" border="1">
                        <thead>
                            <tr>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:15%;padding:5px;">Name in Full </th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:15%;padding:5px;">Father’s / Mother’s /Spouse Name</th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:22%;padding:5px;">Address &amp; Email &amp; ID</th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:15%;padding:5px;">Occupation</th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:10%;padding:5px;">Existing Folio No. (If any)</th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; width:23%;padding:5px;">Signature</th>
                            </tr>
                            <tr>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; padding:5px;">(1)</th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; padding:5px;">(2)</th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; padding:5px;">(3)</th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; padding:5px;">(4)</th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; padding:5px;">(5)</th>
                                <th style="font-weight:bold;text-align:center;vertical-align:central; padding:5px;">(6)</th>
                            </tr>
                        </thead>
                        <tbody><tr>
                            <td style="vertical-align:central; padding:5px;">Bappi Roy</td>
                            <td style="vertical-align:central; padding:5px;">Sweety Roy</td>
                            <td style="vertical-align:central; padding:5px;"></td>
                            <td style="vertical-align:central; padding:5px;"></td>
                            <td style="vertical-align:central; padding:5px;"></td>
                            <td style="vertical-align:central; padding:5px;"></td>
                        </tr>
                    </tbody></table>

                    <br>
                    <table style="width:100%;">

                        <tbody><tr>
                            <td style="font-weight:bold;text-align:left;vertical-align:central; width:50%;padding:5px;">Folio No. of Transferee </td>
                            <td style="font-weight:bold;text-align:left;vertical-align:central; width:50%;padding:5px;">Specimen Signature of Transferee</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;text-align:left;vertical-align:central; width:50%;padding:5px;padding-top:20px;">29

</td>
                            <td style="font-weight:bold;text-align:left;vertical-align:central; width:50%;padding:5px;padding-top:20px;border-bottom:dashed;"></td>
                        </tr>

                    </tbody></table>
                    <br>
                    <br>
                    <span>Value of stamp affixed:…….............................. (Rs.)</span><br>
                    <span style="font-style:italic;">Enclosures:</span><br>
                    <span>(1) Certificate of shares or debentures or other securities</span><br>
                    <span>(2) If no certificate is issued, letter of allotment.</span><br>
                    <span>(3) Others, specify…………………………</span><br>
                    <br>
                    <br>
                </div>

            </div>
        </div>
    </section>