<section class="content-header">
  <h1> Passbook Printing (Page Fold-2) </h1>
  <ol class="breadcrumb">
    <li>
      <a href="\Home\Index">
        <i class="fa fa-dashboard"></i> Dashboard </a>
    </li>
    <li>
      <a href="\SavingAccount\Manage\4da8f6f7-785a-4e75-8861-86d99f8247c7">Saving Account</a>
    </li>
    <li class="active">Fold-2</li>
  </ol>
</section>
<section class="content padding-top-0">
  <div class="row">
    <div class="col-md-12 ">
      <div class="box box-default">
        <div class="box-header"></div>
        <div class="box-body bg-gray">
          <script src="/Content/js/printthis.js"></script>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <form action="/Shared/ExportReportPdf" method="post" novalidate="novalidate">
                  
                  <a target="_blank" href="{{route('admin.saving_account.passbook-fol1-print',array('id' => $row['uuid']))}}" class="btn btn-default flat print-button print-page" id="btnPrint">
                    <i class="fa fa-print"></i> Print </a>
                    
                  <input type="submit" class="btn btn-default flat" name="pdf" value="Export PDF">
                  <input data-val="true" data-val-required="The IsLandscape field is required." id="IsLandscape" name="IsLandscape" type="hidden" value="False">
                  <input id="wholehtml" name="wholehtml" type="hidden" value="">
                  <input id="ReportName" name="ReportName" type="hidden" value="Statement_">
                </form>
              </div>
            </div>
          </div>
          <div id="printDiv" style="background-color:white;width:8.5in;">
            <div class="page" style="padding-left:10px;padding-top:20px;">
              <div style="font-weight: 600; font-size: 20px;text-align: center; padding: 4px;">Saving Account</div>
              <table style="font-size: 16px;font-family:monospace;width:100%;">
                <tbody>
                  <tr>
                    <td style="width:15%;">
                      <small>Bank Name</small>
                    </td>
                    <td style="width:25%;">
                      <small>:{{Auth::guard('admin')->user()->name}} </small>
                    </td>
                    <td style="width:15%;">
                      <small>Branch Code</small>
                    </td>
                    <td style="width:25%;">
                      <small>:{{Auth::guard('admin')->user()->branch_code}}</small>
                    </td>
                    <td rowspan="6" style="width:20%;padding:20px;">
                      <div style="border: 1px solid black;height:200px;width:100%;">&nbsp;</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <small>Virtual A/c No</small>
                    </td>
                    <td>
                      <small>:</small>
                    </td>
                    <td>
                      <small>IFSC</small>
                    </td>
                    <td>
                      <small>:</small>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <small>Account Holder</small>
                    </td>
                    <td>
                      <small>:{{$row->customer->name}}</small>
                    </td>
                    <td>
                      <small>Member Id</small>
                    </td>
                    <td>
                      <small>:{{$row->customer->customer_code}}</small>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <small>Account Type</small>
                    </td>
                    <td>
                      <small>:Saving Account</small>
                    </td>
                    <td>
                      <small>Scheme Name</small>
                    </td>
                    <td>
                      <small>:{{$row->scheme->customer_code}}</small>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <small>Mobile No</small>
                    </td>
                    <td>
                      <small>:{{$row->customer->mobile}}</small>
                    </td>
                    <td>
                      <small>Father</small>
                    </td>
                    <td>
                      <small>:</small>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <small>Address</small>
                    </td>
                    <td colspan="3">
                      <small>:{{$row->customer->present_address1}},{{$row->customer->present_pin_code}},{{$row->customer->present_area}}</small>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>