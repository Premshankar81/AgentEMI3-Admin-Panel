<section class="content-header">
   <h1>
      <script src="/Content/js/printthis.js"></script>
      <div class="row">
         <div class="col-xs-12">
            <div class="form-group">
               <form action="/Shared/ExportReportPdf" method="post" novalidate="novalidate">                <a href="#" class="btn btn-default flat print-button print-page" id="btnPrint"><i class="fa fa-print"></i> Print</a>
                  <input type="submit" class="btn btn-default flat" name="pdf" value="Export PDF">
                  <input data-val="true" data-val-required="The IsLandscape field is required." id="IsLandscape" name="IsLandscape" type="hidden" value="False"><input id="wholehtml" name="wholehtml" type="hidden" value=" "><input id="ReportName" name="ReportName" type="hidden" value="Statement">
               </form>
            </div>
         </div>
      </div>
     
   </h1>
   <ol class="breadcrumb">
      <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{route('admin.agents.index')}}">Agents/Advisors</a></li>
      <li><a href="{{route('admin.agents.print',array('id' => $row['unique_code']))}}">Agent</a></li>
      <li class="active">Balance Sheet</li>
   </ol>
</section>

<section class="content">
   <div class="box box-solid">
      <div class="box-header">
      </div>
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
               .reporttable td, .reporttable th {
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
            
            <p style="font-family: Calibri;text-align:left;font-size: 18px;"> <strong>CHANDANA KALITA Downline Agents</strong></p>
            <div>
               <table class="reporttable">
                  <thead>
                     <tr>
                        <th style="padding:5px;">
                           Agents Code
                        </th>
                        <th style="padding:5px;">
                           Agents Name
                        </th>
                        <th style="padding:5px;">
                           Mobile No
                        </th>
                        <th style="padding:5px;">
                           Rank
                        </th>
                        <th style="padding:5px;">
                           Upline Agent
                        </th>
                        <th style="padding:5px;">
                           Upline Agent Rank
                        </th>
                     </tr>
                  </thead>
                  <tbody>
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
                        <td style="width:40%;text-align:right;">Generate By : Manoj Gurjar at:17/08/2023 11:19:32</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>