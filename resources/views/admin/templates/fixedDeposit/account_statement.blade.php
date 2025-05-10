<section class="content-header">
<h1>
<div class="row">
<div class="col-xs-12">
    <div class="form-group">
            <a target="_block" class="btn btn-default flat print-button print-page" id="btnPrint"><i class="fa fa-print"></i> Print</a>
            <a href="{{route('admin.fixedDeposit.manage',array('id' => $row['uuid']))}}" class="btn btn-default flat"><i class="fa fa-backward"></i> Back </a>
        </form>
    </div>
</div>
</div>

</h1>
<ol class="breadcrumb">
<li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="{{route('admin.fixedDeposit.manage',array('id' => $row['uuid']))}}">FD Accounts - {{$row->account_no}} </a></li>
<li class="active">Account Statement</li>
</ol>
</section>

<section class="content">
        <div class="box box-solid">
            <div class="box-header">
            </div>
            <div class="box-body">
                <div class="form-horizontal" id="printDiv">
                    <div>

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


                        
    <p style="font-family: Calibri;text-align:center;font-size: 16px;">
        <a href="javascript:void(0)" onclick="statement_modal();"> 
            <strong>Statement for the period: {{Helper::getFromDate($_REQUEST['from_date'])}} To {{Helper::getFromDate($_REQUEST['to_date'])}}</strong></a></p>
    
    
    <table style="width:100%;border-collapse:collapse;" border="1">
        <tbody><tr>
            <td style="width:20%;padding:5px;">Account No.</td>
            <td style="width:30%;padding:5px;">{{$row->account_no}}</td>
            <td style="width:20%;padding:5px;">Account Date</td>
            <td style="width:30%;padding:5px;"> {{Helper::getFromDate($row->application_date)}}</td>
        </tr>

        <tr>
            <td style="width:20%;padding:5px;">Customer's Name</td>
            <td style="width:30%;padding:5px;font-weight:bold;"> {{$row->customer->name}}-{{$row->customer->customer_code}}</td>
            <td style="width:20%;padding:5px;">Scheme</td>
            <td style="width:30%;padding:5px;">{{@$row->FDscheme->name}}</td>
        </tr>

        <tr>
            <td style="width:20%;padding:5px;">Interest Rate</td>
            <td style="width:30%;padding:5px;">{{@$row->interest_rate}}%</td>
            <td style="width:20%;padding:5px;">RD Frequency Payout</td>
            <td style="width:30%;padding:5px;"> <?= ucfirst(@$row->fd_frequency) ?></td>
        </tr>
        <tr>
            <td style="width:20%;padding:5px;">Agent's Name</td>
            <td style="width:30%;padding:5px;font-weight:bold;">{{$row->agent->name}}-{{$row->agent->agent_code}}</td>
            <td style="width:20%;padding:5px;">Joint Account Holder</td>
            <td style="width:30%;padding:5px;font-weight:bold;"> {{$row->join_customer->name}} TT</td>

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
        </div>
    </section>