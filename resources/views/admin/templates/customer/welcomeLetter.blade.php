<section class="content-header">
<h1>
<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
             <a target="_block" href="{{ route('admin.customer.print_welcomeLetter',array('id' => $row['customer_id']))}}" class="btn btn-default flat print-button print-page" id="btnPrint"><i class="fa fa-print"></i> Print</a>
            <input type="submit" class="btn btn-default flat" name="pdf" value="Export PDF">
            <input data-val="true" data-val-required="The IsLandscape field is required." id="IsLandscape" name="IsLandscape" type="hidden" value="False">

        </div>
    </div>
</div>
</h1>
<ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('admin.customer.index')}}">Member List</a></li>           
    <li><a href="{{route('admin.customer.edit',array('id' => $row['customer_id']))}}">Member View</a></li>            
    <li class="active">Welcome Letter</li>
    
</ol>
</section>

    <section class="content" >
        <div class="box box-solid">
            <div class="box-body">
                <div class="form-horizontal" id="printDiv">
                    <div style="margin-left:20px;margin-right:20px;">
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
            <span style="text-align:center;font-size:small;">E: {{Auth::guard('admin')->user()->pdf_email}} M: {{Auth::guard('admin')->user()->pdf_mobile}} Regd: {{Auth::guard('admin')->user()->pdf_cin}}</span></td>
            <td style="width: 180px; height: 90px;">&nbsp;</td>
        </tr>
    </tbody>
</table


<p>Enrollment Date :<strong> {{Helper::getFromDate($row['joining_date'])}}</strong></p>

<p>Dear <strong><?= ucfirst($row['prifix_name']) ?>{{$row['name']}}</strong></p>

<p><strong>Membership ID : {{$row['customer_code']}}</strong><br></p>

<p><strong>Welcome to Our Family</strong></p>

<p>Thank you so much for allowing us to help you with your recent account opening. We are committed to providing our customers with the highest level of service and the most innovative banking products possible.</p>
<p>We are very glad that you chose us as your financial institution and hope you will take advantage of our wide variety of savings, investment and loan products, all designed to meet your specific needs</p>
<p>For more detailed information about any of our products or services, please refer to our website, w.w.w. com, or visit any of our convenient locations. You may also contact us by phone at 97062 34938.</p>
<p>EAST INDIA MCS LTD is a full service member owned financial institution. Our decisions are made right here, with members’ best interest in mind. We are concerned about what is best for you!</p>

<p>Please do not hesitate to contact us, should you have any questions. We will contact you in the very near future to ensure you are completely satisfied with the services you have received thus far.</p>

<p>Please see below details for internet banking login:</p>

<p>Internet banking portal: (eastindia.in)</p>

<p>User Name:<strong> {{$row['customer_code']}}</strong></p>

<p>Respectfully,</p>

<p>&nbsp;</p>

<p>[Authorised Signatory]</p>

<p>[{{Auth::guard('admin')->user()->name}}]</p>

                    </div>
                </div>
            </div>
        </div>
    </section>