<section class="content-header">
  <h1> Passbook Printing (Page Fold-1) </h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{route('admin.dashboard')}}">
        <i class="fa fa-dashboard"></i> Dashboard </a>
    </li>
    <li>
      <a href="{{route('admin.businessLoan.manage',array('id' => $row['uuid']))}}">Loan Account -{{$row->account_no}}</a>
    </li>
    <li class="active">Fold-1</li>
  </ol>
</section>
<section class="content padding-top-0">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header"></div>
        <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <a target="_blank" href="{{route('admin.saving_account.passbook-fol2-print',array('id' => $row['uuid']))}}" class="btn btn-default flat print-button print-page" id="btnPrint">
                  <i class="fa fa-print"></i> Print </a>
              </div>
            </div>
          </div>
          <div id="printDiv">
            <div id="calc_list" class="pricingdiv">
              <div class="page" style="margin-left: 30%;margin-top:0px;">
                <div style="width: 400px;font-size: 20px;font-family: 'VT323-Regular';">&nbsp;</div>
                <div style="width: 400px;font-size: 20px;font-family: 'VT323-Regular';">
                  <strong>{{Auth::guard('admin')->user()->pdf_title}}</strong><br>
                  <span>{{Auth::guard('admin')->user()->pdf_address}}&nbsp; &nbsp; </span><br/>
                  <span>Mob:{{Auth::guard('admin')->user()->pdf_mobile}}</span><br>
                  <span>Email:{{Auth::guard('admin')->user()->pdf_email}}</span>
                </div>
                <p>&nbsp;</p>
              </div>
              <p>&nbsp;</p>
            </div>
            <script id="calcTemplate" type="text/html">
              <div class="page" style="margin-left:0px;margin-top:0px;">
                <div style="width: 400px;font-size: 20px;font-family: 'VT323-Regular';">&nbsp;</div>
                <div style="width: 400px;font-size: 20px;font-family: 'VT323-Regular';">
                  <br />
                  <strong>{{Auth::guard('admin')->user()->pdf_title}}</strong><br />
                  <span>{{Auth::guard('admin')->user()->pdf_address}} </span><br/>
                  <span>Mob:{{Auth::guard('admin')->user()->pdf_mobile}}</span><br/>
                  <span>Email:{{Auth::guard('admin')->user()->pdf_email}}</span>
                </div>
                <p>&nbsp;</p>
              </div>
              <p>&nbsp;</p>
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>