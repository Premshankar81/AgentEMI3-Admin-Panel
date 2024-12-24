<section class="content-header">
  <h1>
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
    <li>
      <a href="\Home\Index">
        <i class="fa fa-dashboard"></i> Dashboard </a>
    </li>
    <li class="active">Balance Sheet</li>
  </ol>
</section>
<section class="content">
  <div class="box box-solid">
    <div class="box-header"></div>
    <div class="box-body">
      <div class="form-horizontal" id="printDiv">
        <style>
          .reporttable {
            font-family: Calibri;
            border-collapse: collapse;
            font-weight: 400;
            font-size: 16px;
            line-height: 1.42857143;
            color: #333;
            width: 100%;
          }

          .reporttable td,
          .reporttable th {
            border: 1px solid #ddd;
            padding: 8px;
          }

          .reporttable th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #f2f2f2;
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
            <span style="text-align:center;font-size:small;">E: {{Auth::guard('admin')->user()->pdf_email}} M: {{Auth::guard('admin')->user()->pdf_mobile}} Regd: {{Auth::guard('admin')->user()->pdf_cin}}</span></td>
            <td style="width: 180px; height: 90px;">&nbsp;</td>
        </tr>
    </tbody>
</table>

        
        <p style="font-family: Calibri;text-align:center;font-size: 18px;">
          <strong>Statement of Balance Sheet for the period: 01/04/2023 To 31/03/2024</strong>
        </p>
        <div>
          <table class="reporttable">
            <thead>
              <tr>
                <th style="padding:5px;width:55%;text-align:center;"> Particulars </th>
                <th style="padding:5px;width:15%;text-align:center;"> Note No. </th>
                <th style="padding:5px;width:15%;text-align:center;"> Previous Period </th>
                <th style="padding:5px;width:15%;text-align:center;"> Current Period </th>
              </tr>
            </thead>
            <tbody>
              <tr style="font-weight:bold;">
                <td style="padding:5px;">EQUITY AND LIABILITIES</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"></td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px 5px 5px 25px;">Shareholder's funds</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"></td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Share capital</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">00</td>
                <td style="padding:5px;text-align:right;">2010</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Reserves and surplus</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Money received against share warrants</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">0</td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">0</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px 5px 5px 35px;"></td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">00</td>
                <td style="padding:5px;text-align:right;">2010</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px 5px 5px 25px;">Share application money pending allotment</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px 5px 5px 25px;">Non-current liabilities</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"></td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Long-term borrowings</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Deferred tax liabilities (Net)</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Other long term liabilities</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Long-term provisions</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Deposits</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">0</td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">0</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px 5px 5px 35px;"></td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px 5px 5px 25px;">Current liabilities</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"></td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Short-term borrowings</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Trade payables</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;"></td>
                <td style="padding:5px;text-align:right;"></td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 40px;">(A) Micro enterprises and small enterprises</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 40px;">(B) Others</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">(00.00)</td>
                <td style="padding:5px;text-align:right;">(98700.00)</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Other current liabilities</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Short-term provisions</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">0</td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">0</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px 5px 5px 35px;"></td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">(00.00)</td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">(96,690)</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px 5px 5px 25px;">Total</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">(00.00)</td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">(96,690)</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px;">ASSETS</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"></td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px 5px 5px 25px;">Non-current assets</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"></td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Property,Plant and Equipment</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;"></td>
                <td style="padding:5px;text-align:right;"></td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 45px;">Tangible assets</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">(00.00)</td>
                <td style="padding:5px;text-align:right;">(00.00)</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 45px;">Intangible assets</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 45px;">Capital work-in-Progress</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 45px;">Intangible assets under development</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Non-current investments</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">(00.00)</td>
                <td style="padding:5px;text-align:right;">(00.00)</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Deferred tax assets (net)</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Long-term loans and advances</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Other non-current assets</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">(00.00)</td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">(00.00)</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px 5px 5px 35px;"></td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">(00.00)</td>
                <td style="padding:5px;text-align:right;">(00.00)</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px 5px 5px 25px;">Current assets</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"></td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Current investments</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Inventories</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Trade receivables</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Cash and cash equivalents</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Short-term loans and advances</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 35px;">Other current assets</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">0</td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">0</td>
              </tr>
              <tr></tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px 5px 5px 25px;"></td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">0</td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">0</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px 5px 5px 25px;">Total</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">(00.00)</td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">(96,690)</td>
              </tr>
            </tbody>
          </table>
        </div>
        <hr>
        <div>
          <table style="width:100%;font-family:Calibri;font-size:small;">
            <tbody>
              <tr>
                <td width="40%;"></td>
                <td style="width:20%;text-align:center;padding:5px;">***End of Report***</td>
                <td style="width:40%;text-align:right;">Generate By : East India MCS LTD</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>