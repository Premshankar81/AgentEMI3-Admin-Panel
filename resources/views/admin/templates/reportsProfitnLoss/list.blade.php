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
    <li class="active">Profile Loss</li>
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
          <strong>Statement of Profit and loss for the period: 01/04/2023 To 31/03/2024</strong>
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
                <td style="padding:5px;">Revenue</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"></td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">Revenue from operations</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">
                  <a href="#" title="Upload" data-toggle="modal" data-target="#PreviousYear_Revenuefromoperations"> 00.00 </a>
                </td>
                <td style="padding:5px;text-align:right;">
                  <a href="#" title="Upload" data-toggle="modal" data-target="#CurrentYear_Revenuefromoperations"> 98251.00 </a>
                </td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">Less: Excise duty</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">0</td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">0</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px 5px 5px 25px;">Net Sales</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">00.00</td>
                <td style="padding:5px;text-align:right;">98251.00</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">Other income</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">
                  <a href="#" data-toggle="modal" data-target="#PreviousYear_Otherincome"> 00.00 </a>
                </td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">
                  <a href="#" data-toggle="modal" data-target="#CurrentYear_Otherincome"> 00.00 </a>
                </td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px;">Total revenue</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">00.00</td>
                <td style="padding:5px;text-align:right;">98251.00</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px;">Expenses</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"></td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">Cost of material Consumed</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">Purchase of stock-in-trade</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">Changes in inventories</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">Employee benefit expenses</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">
                  <a href="#" data-toggle="modal" data-target="#PreviousYear_Employeebenefitexpenses"> 00.00 </a>
                </td>
                <td style="padding:5px;text-align:right;">
                  <a href="#" data-toggle="modal" data-target="#CurrentYear_Employeebenefitexpenses"> 800.00 </a>
                </td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">Finance costs</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">
                  <a href="#" data-toggle="modal" data-target="#PreviousYear_Financecosts"> 00.00 </a>
                </td>
                <td style="padding:5px;text-align:right;">
                  <a href="#" data-toggle="modal" data-target="#CurrentYear_Financecosts"> 4103.17 </a>
                </td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">Depreciation and amortization expenses</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">
                  <a href="#" data-toggle="modal" data-target="#PreviousYear_Depreciationandamortizationexpenses"> 0 </a>
                </td>
                <td style="padding:5px;text-align:right;">
                  <a href="#" data-toggle="modal" data-target="#CurrentYear_Depreciationandamortizationexpenses"> 0 </a>
                </td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">Other expenses</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">
                  <a href="#" data-toggle="modal" data-target="#PreviousYear_Otherexpenses"> 00.00 </a>
                </td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">
                  <a href="#" data-toggle="modal" data-target="#CurrentYear_Otherexpenses"> 700.00 </a>
                </td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px;">Total expenses</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">00.70</td>
                <td style="padding:5px;text-align:right;">5603.17</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px;"> Profit before exceptional, extraordinary and prior period items and tax </td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">(00.00)</td>
                <td style="padding:5px;text-align:right;">92,647.83</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">Exceptional items</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">0</td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">0</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px;"> Profit before extraordinary and prior period items and tax </td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">(00.00)</td>
                <td style="padding:5px;text-align:right;">92,647.83</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">Extraordinary items</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">Prior period item</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">0</td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">0</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px;"> Profit before tax </td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">(00.00)</td>
                <td style="padding:5px;text-align:right;">92,647.83</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px;"> Tax expenses </td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;"></td>
                <td style="padding:5px;text-align:right;"></td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">Current tax</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">
                  <a href="#" data-toggle="modal" data-target="#PreviousYear_Currenttax"> 0 </a>
                </td>
                <td style="padding:5px;text-align:right;">
                  <a href="#" data-toggle="modal" data-target="#PreviousYear_Currenttax"> 0 </a>
                </td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">Deferred tax</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">Excess/short provision relating earlier year tax</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">0</td>
                <td style="padding:5px;text-align:right;border-bottom: 1px solid black;">0</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px;"> Profit(Loss) for the period </td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;color:red;">(00.00)</td>
                <td style="padding:5px;text-align:right;color:green;">92,647.83</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px;"> Earning per share </td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;"></td>
                <td style="padding:5px;text-align:right;"></td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px;"> Basic </td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;"></td>
                <td style="padding:5px;text-align:right;"></td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">Before extraordinary Items</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">(00.00)</td>
                <td style="padding:5px;text-align:right;">0.00</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">After extraordinary Adjustment</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">(00.00)</td>
                <td style="padding:5px;text-align:right;">00.00</td>
              </tr>
              <tr style="font-weight:bold;">
                <td style="padding:5px;"> Diluted </td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;"></td>
                <td style="padding:5px;text-align:right;"></td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">Before extraordinary Items</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
              </tr>
              <tr>
                <td style="padding:5px 5px 5px 25px;">After extraordinary Adjustment</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;text-align:right;">0</td>
                <td style="padding:5px;text-align:right;">0</td>
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