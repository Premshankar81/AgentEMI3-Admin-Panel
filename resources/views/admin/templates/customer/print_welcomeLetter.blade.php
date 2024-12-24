<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>AdminLTE 2 | Invoice</title>

<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="{{ URL::to('admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ URL::to('admin/assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{ URL::to('admin/assets/bower_components/Ionicons/css/ionicons.min.css')}}">
<link rel="stylesheet" href="{{ URL::to('admin/assets/dist/css/AdminLTE.min.css')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body onload="window.print();">
<div class="wrapper">

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


<table style="width:100%;border-bottom: 1px solid;font-family: Calibri;font-size:18px;font-weight:400;">
    <tbody>
        <tr class="logo-space">
            <td style="width: 90px; height: 90px;"><img class="img" src="https://nidhiexpert.com/AppImages/Logo/acc27fe1-a8cb-42ae-8297-4b3e00d39e48.png" style="max-width:180px;max-height:120px;"></td>
            <td style="text-align:center;"><span style="text-align:center;font-size:40px;font-weight:bold;">{{Auth::guard('admin')->user()->name}}</span><br>
            <span style="text-align:center;font-size:small;">MAHARANA PRATAP CHOUK NANDED &nbsp;maharana pratap chouk ,nanded NANDED -431401 Maharashtra</span><br>
            <span style="text-align:center;font-size:small;">E: shreepandurangnidhi@gmail.com M: 8805208504 CIN: U65990MH2021PLN371663</span></td>
            <td style="width: 180px; height: 90px;">&nbsp;</td>
        </tr>
    </tbody>
</table>


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

<p>Internet banking portal: (eimcs.in)</p>

<p>User Name:<strong> {{$row['customer_code']}}</strong></p>

<p>Respectfully,</p>

<p>&nbsp;</p>

<p>[Authorised Signatory]</p>

<p>[<strong>EAST INDIA MCS LTD</strong>]</p>

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>


</html>
