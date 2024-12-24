<section class="content-header">
        <h1>
            
<script src="/Content/js/printthis.js"></script>
<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
                <a target="_blank" href="{{route('admin.saving_account.print-receipt',array('id' => $row['id']))}}" class="btn btn-default flat print-button print-page" id="btnPrint"><i class="fa fa-print"></i> Print</a>
            
        </div>
    </div>
</div>
</h1>
<ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('admin.recurringDeposit.manage',array('id' => $row['rd_account']['uuid']))}}">RD Account - {{$row->rd_account->account_no}}</a></li>
    <li class="active">Receipts</li>
</ol>
</section>

<section class="content">
        <div class="box box-solid">
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

<div style="margin: 0 ;width: 50mm;background: #FFF;font-weight: 600;">
<div style="margin: 0 auto;width:80px;align-items:center;">
@if(!empty(Auth::guard('admin')->user()->pdf_logo))
<img src="{{config('constants.SYSTEM')}}{{Auth::guard('admin')->user()->pdf_logo}}" class="img" style="max-width:180px;max-height:120px;" style="margin: 0 auto;width:100%;height:100%;padding: 10px;" />
@else
<img src="{{config('constants.DEFAULT_IMAGE')}}" class="img" style="max-width:180px;max-height:120px;" style="margin: 0 auto;width:100%;height:100%;padding: 10px;"  />
@endif
 
</div>

<table style="width:100%;font-size: 11px; font-family:Calibri;">
    <tbody>
        <tr>
            <td colspan="3" style="font-size: 12px;font-weight:bold;text-align:center;">Payment Receipt</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>:</td>
            <td style="text-align: right;">{{@$row->customer->name}}</td>
        </tr>
        <tr>
            <td>A/c No</td>
            <td>:</td>
            <td style="text-align: right;">{{$row->rd_account->account_no}}</td>
        </tr>
    </tbody>
</table>

<table style="width:100%;font-size: 11px; font-family:Calibri;">
    <tbody>
        <tr>
            <td>Receipt No</td>
            <td>:</td>
            <td style="text-align: right;">{{$row->id}}</td>
        </tr>
        <tr>
            <td>Date</td>
            <td>:</td>
            <td style="text-align: right;">{{Helper::getFromDate($row->transation_date)}}</td>
        </tr>
        <tr>
            <td>Amount</td>
            <td>:</td>
            <td style="text-align: right;">{{$row->amount}}</td>
        </tr>
        
        <tr>
            <td colspan="3" style="text-align:center;">Thanks for your business!</td>
        </tr>
    </tbody>
</table>
</div>

                </div>
            </div>
        </div>
    </section>