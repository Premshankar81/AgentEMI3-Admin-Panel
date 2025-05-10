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

 <p style="font-family: Calibri;text-align:center;font-size: 16px;">
        <a href="javascript:void(0)" onclick="statement_modal();"> 
            <strong>Statement for the period: {{Helper::getFromDate($_REQUEST['from_date'])}} To {{Helper::getFromDate($_REQUEST['to_date'])}}</strong></a></p>
    
    <table style="width:100%;border-collapse:collapse;" border="1">
        <tbody><tr>
            <td style="width:20%;padding:5px;">Customer's Name</td>
            <td style="width:30%;padding:5px;font-weight:bold;"> {{$row->customer->name}}-{{$row->customer->customer_code}}</td>
            <td style="width:20%;padding:5px;">Account No</td>
            <td style="width:30%;padding:5px;">{{$row->account_no}} </td>
        </tr>
        <tr>
            <td style="width:20%;padding:5px;">Scheme</td>
            <td style="width:30%;padding:5px;">{{@$row->scheme->name}}</td>
            <td style="width:20%;padding:5px;">Interest Rate</td>
            <td style="width:30%;padding:5px;">{{@$row->scheme->interest_rate}}%</td>
        </tr>
        <tr>
            <td style="width:20%;padding:5px;">Virtual Account No</td>
            <td style="width:30%;padding:5px;"></td>
            <td style="width:20%;padding:5px;">IFSC </td>
            <td style="width:30%;padding:5px;">{{$row->ifsc_code}}</td>
        </tr>
        <tr>
            <td style="width:20%;padding:5px;">Agent's Name</td>
            <td style="width:30%;padding:5px;font-weight:bold;"></td>
            <td style="width:20%;padding:5px;">Joint Account Holder</td>
            <td style="width:30%;padding:5px;font-weight:bold;"></td>
        </tr>
    </tbody></table>
    <p></p>
    <div>
    <table style="width:100%;border-collapse:collapse;" border="1">
        <thead style="background-color:lightgray;">
            <tr>
                <th style="width:7%;padding:5px;">
                    Date
                </th>
                <th style="width:20%;padding:5px;">
                    Narration
                </th>
                <th style="width:8%;padding:5px;">
                    Payment Mode
                </th>
                <th style="width:8%;padding:5px;">
                    Chq/Ref No
                </th>
                <th style="width:9%;padding:5px;">
                    Credit
                </th>
                <th style="width:9%;padding:5px;">
                    Debit
                </th>
                <th style="width:9%;padding:5px;">
                    Balance
                </th>
            </tr>
        </thead>
        <tbody>

                <?php 
                $Balance = 0;
                foreach ($statements as $key => $statement): ?>
                <?php
                $CreaditAmount = 0;
                $DebitAmount = 0;
                

                if($statement['transation_type'] == 'credit'){
                    $CreaditAmount = $statement['amount'];
                    $Balance =  $Balance + $CreaditAmount;
                }
                if($statement['transation_type'] == 'debit'){
                    $DebitAmount = $statement['amount'];
                    $Balance = $Balance - $DebitAmount;
                }
                if($key == 0){
                    $Balance = $statement['amount'];
                }
                


                ?>
                
                <tr>
                    <td style="padding:5px;">{{Helper::getFromDate($statement['transation_date'])}} </td>
                    <td style="padding:5px;">{{$statement->remarks}}</td>
                    <td style="padding:5px;"><?= str_replace('_',' ',ucfirst($statement['payment_mode'])) ?></td>
                    <td style="padding:5px;"></td>
                    <td style="text-align:right;padding:5px;"><?= number_format($CreaditAmount) ?></td>
                    <td style="text-align:right;padding:5px;"><?= number_format($DebitAmount) ?></td>
                    <td style="text-align:right;padding:5px;"><?= number_format($Balance) ?><span>&nbsp;CR.</span></td>
                </tr>
                <?php endforeach ?>

        </tbody>
    </table>
</div>

                        <div>
    <table style="width:100%;font-family:Calibri;font-size:small;">
        <tbody><tr>
            <td width="40%;"></td>
            <td style="width:20%;text-align:center;padding:5px;">***End of Report***</td>
            <td style="width:40%;text-align:right;">Generate By : {{Auth::guard('admin')->user()->name}} at:13/03/2023 09:55:54</td>
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
