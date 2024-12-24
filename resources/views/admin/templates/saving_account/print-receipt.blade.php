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
<div style="margin: 0 ;width: 50mm;background: #FFF;font-weight: 600;">
<div style="margin: 0 auto;width:80px;align-items:center;">
<img alt="logo" src="https://nidhiexpert.com/AppImages/Logo/acc27fe1-a8cb-42ae-8297-4b3e00d39e48.png" style="max-width:180px;max-height:120px;" style="margin: 0 auto;width:100%;height:100%;">
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
			<td style="text-align: right;">{{$row->account->account_no}}</td>
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
			<td>Balance</td>
			<td>:</td>
			<td style="text-align: right;">{{$row->account->available_balance}}</td>
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

</div>


</html>
