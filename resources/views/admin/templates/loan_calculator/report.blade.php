<section class="content-header">
        <h1>
<div class="row">
    <div class="col-xs-12">
        <div class="form-group">

<form action="" method="post" novalidate="novalidate">                
    <a href="#" class="btn btn-default flat print-button print-page" id="btnPrint"><i class="fa fa-print"></i> Print</a>
   </form>
        </div>
    </div>
</div>


        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{route('admin.rd_calculator.index')}}">Calculator</a></li>
            <li class="active">RD Application</li>
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
                            font-size: 14px;
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



                    <p style="text-align:center;"> <strong>Recurring Deposit Calculator</strong></p>
                    <p></p>

                    <table class="reporttable">
                        <tbody>
                            <tr>
                                <td>Disburse Date</td>
                                <td>{{Helper::getFromDate($RDInfo['opening_date'])}}</td>
                                <td>EMI Payout</td>
                                <td>{{$RDInfo['emi_payout']}}</td>
                                
                            </tr>
                            <tr>
                                <td>Tenure</td>
                                <td>{{$RDInfo['tenure']}} - {{ app('App\Helpers\Helper')->getTenureLabel($RDInfo['emi_payout']) }}</td>
                             
                                <td>EMI Credit Period</td>
                                <td>{{$RDInfo['EMICreditPeriod']}} - Days</td>
                                
                            </tr>
                            <tr>
                                <td>Interest Rate</td>
                                <td>{{$RDInfo['interest_rate']}}</td>
                                
                                <td>Amount</td>
                                <td>₹ {{$RDInfo['loan_amount']}}</td>
                                
                                
                            </tr>
                            <tr>
                                <td>Interest Earned</td>
                                <td>₹ {{$RDInfo['Final_InterestEarned']}}</td>
                                <td>EMI Type</td>
                                <td><?= ucfirst($RDInfo['EMIType']) ?></td>
                                
                            </tr>
                            <!--<tr>
                                <td>Maturity Amount</td>
                                <td>{{$RDInfo['Final_MaturityAmount']}}</td>
                                <td>Maturity Date</td>
                                <td>{{$RDInfo['Final_MaturityDate']}}</td>                                
                            </tr>-->
                        </tbody>
                    </table>


                    
                    <p></p>

                    <table class="reporttable">
                        <thead>
                            <tr>
                                <th style="width:5%;text-align:center;">EMI No</th>
                                <th style="width:25%;text-align:center;">EMI Date</th>
                                <th style="width:25%;text-align:center;">Due Date</th>
                                <th style="width:10%;text-align:center;">EMI</th>
                                <th style="width:10%;text-align:center;">Principal</th>
                                <th style="width:10%;text-align:center;">Interest</th>
                                <th style="width:10%;text-align:center;">Outstanding</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @if($rdCalcualtionArr)
                                @foreach ($rdCalcualtionArr as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{@$value['emi_date']}}</td>
                                    <td>{{@$value['due_date']}}</td>
                                    <td style="text-align:right;"><?= round(@$value['emi']) ?></td>
                                    <td style="text-align:right;">{{@$value['principal']}}</td>
                                    <td style="text-align:right;">{{@$value['interest']}}</td>
                                    <td style="text-align:right;">{{@$value['outstanding']}}</td>
                                </tr>
                                @endforeach
                            @endif
                           
                        </tbody>
                    </table>


                    <hr>
                    <div>
    <table style="width:100%;font-family:Calibri;font-size:small;">
        <tbody><tr>
            <td width="40%;"></td>
            <td style="width:20%;text-align:center;padding:5px;">***End of Report***</td>
            <td style="width:40%;text-align:right;">Generate By : Manoj Gurjar at:18/03/2023 00:20:14</td>
        </tr>
    </tbody></table>
</div>

                </div>
            </div>
        </div>
    </section>