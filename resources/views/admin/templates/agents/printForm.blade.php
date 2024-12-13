	<section class="content-header">
        <h1>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <a href="#" class="btn btn-default flat print-button print-page" id="btnPrint"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>
        </div>

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{route('admin.agents.index')}}">Agents List</a></li>
            <li><a href="{{route('admin.agents.view',array('id' => $row['unique_code']))}}">Agents View</a></li>
            <li class="active">Print</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-solid">
            <div class="box-header">
            </div>
            <div class="box-body">
                <div class="form-horizontal" id="printDiv">
                    <div class="page" style="margin-left:20px;margin-right:20px;">
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



                        <table style="width:100%;">
                            <tbody><tr>
                                <td style="text-align:center;font-size:large;font-weight:bold;padding-bottom:10px;">
                                    Agent Information
                                </td>
                            </tr>
                        </tbody></table>
                        <table style="width:100%;border-collapse:collapse;font-size:14px;" border="1">
                            <tbody><tr>
                                <td style="width:30%;padding:5px;">Agent Code</td>
                                <td style="width:70%;padding:5px;">{{$row['agent_code']}}</td>
                            </tr>
                            <tr>
                                <td style="width:30%;padding:5px;">Date of Joining</td>
                                <td style="width:70%;padding:5px;">{{Helper::getFromDate($row['joining_date'])}}</td>
                            </tr>
                            <tr>
                                <td style="width:30%;padding:5px;">Gender</td>
                                <td style="width:70%;padding:5px;"><?= ucfirst($row['gender']) ?></td>
                            </tr>
                            <tr>
                                <td style="width:30%;padding:5px;">Agent's Name</td>
                                <td style="width:70%;padding:5px;"><?= ucfirst($row['prifix_name']) ?> {{$row['name']}}</td>
                            </tr>
                            <tr>
                                <td style="width:30%;padding:5px;">Address</td>
                                <td style="width:70%;padding:5px;">{{$row['address_first']}}  {{@$row['city']['title']}} {{$row['pincode']}}  </td>
                            </tr>
                            <tr>
                                <td style="width:30%;padding:5px;">Date of Birth</td>
                                <td style="width:70%;padding:5px;">{{Helper::getFromDate($row['dob'])}}</td>
                            </tr>
                            <tr>
                                <td style="width:30%;padding:5px;">Occupation</td>
                                <td style="width:70%;padding:5px;">{{$row['occupation']}}</td>
                            </tr>
                            <tr>
                                <td style="width:30%;padding:5px;">Mobile No</td>
                                <td style="width:70%;padding:5px;">{{$row['mobile']}}</td>
                            </tr>
                            <tr>
                                <td style="width:30%;padding:5px;">Email Address</td>
                                <td style="width:70%;padding:5px;">{{$row['email']}} </td>
                            </tr>
                            <tr>
                                <td style="width:30%;padding:5px;">Aadhar No</td>
                                <td style="width:70%;padding:5px;">{{$row['aadhar_no']}}</td>
                            </tr>
                            <tr>
                                <td style="width:30%;padding:5px;">PAN No</td>
                                <td style="width:70%;padding:5px;">{{$row['pan']}}</td>
                            </tr>
                            <tr>
                                <td style="width:30%;padding:5px;">Spouse Name</td>
                                <td style="width:70%;padding:5px;">{{$row['spouse_name']}}</td>
                            </tr>
                            <tr>
                                <td style="width:30%;padding:5px;">Upline Agent</td>
                                <td style="width:70%;padding:5px;"></td>
                            </tr>
                            <tr>
                                <td style="width:30%;padding:5px;">Agent Rank</td>
                                <td style="width:70%;padding:5px;">{{@$row['agent_rank']['title']}}</td>
                            </tr>
                            <tr>
                                <td style="width:30%;padding:5px;">Associate Customer</td>
                                <td style="width:70%;padding:5px;">{{@$row['associate_customer']['name']}}</td>
                            </tr>
                        </tbody></table>
                        <p></p>
                        <span style="font-weight:bold;font-family:Calibri;">Bank Details</span>

                        <table style="width:100%;border-collapse:collapse;font-size:14px;" border="1">
                            <tbody><tr>
                                <td style="width:25%;padding:5px;font-weight:bold;">
                                    Holder Name
                                </td>

                                <td style="width:25%;padding:5px;">
                                    <span><?= ucfirst($row['prifix_name']) ?> {{$row['name']}}</span>
                                </td>
                                <td style="width:25%;padding:5px;font-weight:bold;">
                                    A/c No.
                                </td>
                                <td style="width:25%;padding:5px;">{{$row['account_no']}}</td>
                            </tr>
                            <tr>
                                <td style="width:25%;padding:5px;font-weight:bold;">
                                    Bank Name
                                </td>
                                <td style="width:25%;padding:5px;">{{$row['bank_name']}}</td>
                                <td style="width:25%;padding:5px;font-weight:bold;">
                                    IFSC Code/ IFSC
                                </td>
                                <td style="width:25%;padding:5px;">{{$row['ifsc_code']}}</td>
                            </tr>
                        </tbody></table>

                        <div>
    <table style="width:100%;font-family:Calibri;font-size:small;">
        <tbody><tr>
            <td width="40%;"></td>
            <td style="width:20%;text-align:center;padding:5px;">***End of Report***</td>
            <td style="width:40%;text-align:right;">Generate By : Manoj Gurjar at:17/03/2023 23:27:00</td>
        </tr>
    </tbody></table>
</div>
                    </div>
                </div>
            </div>
        </div>
    </section>