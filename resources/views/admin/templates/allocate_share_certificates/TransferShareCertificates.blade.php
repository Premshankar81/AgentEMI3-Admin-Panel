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
    <div class="box-header"></div>
    <div class="box-body">
      <div class="form-horizontal" id="printDiv">
        <style>
          body {
            margin: 0;
            padding: 0;
          }

          @page {
            size: auto;
            /* auto is the initial value */
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

          .reporttable td,
          .reporttable th {
            border: 1px solid #ddd;
            padding: 2px;
          }

          .reporttable th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #f2f2f2;
          }

          printDiv table,
          p {
            font-family: Calibri;
            font-weight: 400;
            font-size: 12px;
            color: #333;
          }

          table,
          p {
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
            <span style="text-align:center;font-size:small;">E: {{Auth::guard('admin')->user()->pdf_email}} M: {{Auth::guard('admin')->user()->pdf_mobile}} Regd: {{Auth::guard('admin')->user()->pdf_cin}} </span></td>
            <td style="width: 180px; height: 90px;">&nbsp;</td>
        </tr>
    </tbody>
</table>

        <div style="width:100%;">
          <div style="margin-right:20px;margin-top:0px;margin-left:20px;">
            <table>
              <tbody>
                <tr>
                  <td style="text-align:center;font-size:medium;font-weight:bold;">Form No. SH-1</td>
                </tr>
                <tr>
                  <td style="text-align:center;font-size:medium;font-weight:bold;">Share Certificate</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td style="text-align:center;font-size:medium;font-weight:bold;">
                    <br>{{Auth::guard('admin')->user()->pdf_sub_text_description}}
                  </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td style="text-align:justify;">
                    <br> This is to certify that the person(s) named in this Certificate is/are the Registered Holder(s) of the within mentioned share(s) bearing the distinctive number(s) herein specified in the above named Society  subject to the Memorandum and Articles of Association of the Society and the amount endorsed herein has been paid up on each such share.
                  </td>
                </tr>
              </tbody>
            </table> &nbsp; <table border="1" style="width:100%;border-collapse:collapse;padding:5px;">
              <tbody>
                <tr>
                  <td style="padding:5px;">EQUITY SHARES EACH OF Rs. 
                  	<span style="font-weight:bold;"> {{$row->total_shares}}/-</span> (Nominal value) <br>
                    <br> AMOUNT PAID-UP PER SHARE Rs. <span style="font-weight:bold;"> {{$row->share_nominal_value}}/-</span>
                  </td>
                </tr>
              </tbody>
            </table> &nbsp; <table frame="box" style="width:100%;padding:5px;border-collapse:collapse;">
              <tbody>
                <tr>
                  <td style="padding:5px;">Registered Folio No. <span style="font-weight:bold;"> {{$row->id}}</span>
                  </td>
                  <td style="padding:5px;">Certificate No. <span style="font-weight:bold;">{{$row->lot_number}}</span>
                  </td>
                </tr>
                <tr>
                  <td colspan="2" style="padding:5px;">Name(s) of the Holder(s): 
                  	<span style="font-weight:bold;">
                  	{{$row->memberDetails->name}}
              		</span>
                  </td>
                </tr>
                <tr>
                  <td colspan="2" style="padding:5px;">No. of Shares Held: <span style="font-weight:bold;">{{$row->total_shares}}</span> (in figures) </td>
                </tr>
                <tr>
                  <td colspan="2" style="padding:5px;">Distinctive No (s): From {{$row->share_range}} (Both inclusive)</td>
                </tr>
              </tbody>
            </table>
            <br>
            <span>Given under the common seal of the Company #Today#</span>
            <br>
            <span>1. <span style="font-weight:bold;">Monoj Kr Sharma</span>
            </span>
            <br>
            <span>2. <span style="font-weight:bold;">Monoj Kr Deka</span>
            </span>
            <br>
            <span>3. Secretary / any other authorized person </span>
            <br> &nbsp; <p style="page-break-before: always">&nbsp;</p>
            <span style="width:100%; text-align:center;font-size:20px;font-weight:bold;">MEMORANDUM OF TRANSFERS</span>
            <table border="1" style="width:100%;padding:5px;border-collapse:collapse;">
              <thead>
                <tr>
                  <th style="padding:5px;">Name of Transferor</th>
                  <th style="padding:5px;">Name of Transferee</th>
                  <th style="padding:5px;">Folio No. of Transferee</th>
                  <th style="padding:5px;">Number of Shares</th>
                  <th style="padding:5px;">Date of Transfers</th>
                  <th style="padding:5px;">Signature of Authorised Signatory</th>
                </tr>
              </thead>
              <tbody>
              	 @foreach($AllocatedShares as $index=>$AllocatedShare)
              	<tr>
                  <td style="padding:5px;"></td>
                  <td style="padding:5px;">{{$AllocatedShare['memberDetails']['name']}}</td>
                  <td style="padding:5px;">{{$AllocatedShare['lot_number']}}</td>
                  <td style="padding:5px;">{{$AllocatedShare['total_shares']}}</td>
                  <td style="padding:5px;">{{Helper::getFromDate($AllocatedShare['created_at'])}}</td>
                  <td style="padding:5px;">&nbsp;</td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>