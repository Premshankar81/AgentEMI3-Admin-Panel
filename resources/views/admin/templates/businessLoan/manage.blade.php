<section class="content-header">
    <h1>
        {{$data['page_title']}}
            <small>[ {{$row->account_no}} ]</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.businessLoan.manage',array('id' => $row['uuid']))}}">{{$data['page_title']}}</a></li>
        <li class="active">{{$data['page_title']}}</li>
        
    </ol>
</section>

<section class="content padding-top-0">
<div class="row">
<div class="col-md-12" style="padding-bottom:10px;">
</div>

<?php if (count($pendingTransation) > 0): ?>
<div class="col-md-12" style="padding-bottom:10px;">
<div class="alert alert-warning alert-dismissible margin-top-10 margin-bottom-0">
<h4><i class="icon fa fa-ban"></i> ALERT PENDING TRANSACTION!</h4>
<p class="ft-16">Some transactions are pending for approval. To approve &nbsp; 
    <a class="btn btn-danger" href="{{route('admin.loan-pending-transation.index')}}">CLICK HERE</a></p>
</div>
</div>
<?php endif ?>

<div class="col-md-3">
  @include('admin.templates.businessLoan.sidebar')

</div>

<div class="col-md-9">
    
<div class="row">
<div class="col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>
        <div class="info-box-content">
            <span class="info-box-text  text-center">DUE AMOUNT</span>
            <span class="info-box-text text-center">₹</span>
            <span class="info-box-number  text-center" style="font-size:18px;">00.00</span>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="info-box">
    <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>
    <div class="info-box-content">
        <span class="info-box-text  text-center">Paid EMIs</span>
        <span class="info-box-text text-center">₹</span>
        <span class="info-box-number  text-center" style="font-size:18px;" id="PaidEMIsAmount">{{$PaidEmiTotal}}</span>
    </div>
</div>
</div>
<div class="col-md-3">
    <div class="info-box">
    <span class="info-box-icon bg-yellow"><i class="fa fa-money"></i></span>
    <div class="info-box-content">
        <span class="info-box-text  text-center">Unpaid EMIs</span>
        <span class="info-box-text text-center">₹</span>
        <span class="info-box-number  text-center" style="font-size:18px;" id="UnPaidEMIsAmount">{{$PendingEmiTotal}}</span>
    </div>
</div>

</div>
<div class="col-md-3">
                            
<div class="info-box">
    <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

    <div class="info-box-content">
        <span class="info-box-text  text-center" id="NetBalaneCaption">Outstanding Balance</span>
        <span class="info-box-text text-center">₹</span>
        <span class="info-box-number  text-center" style="font-size:18px;" id="NetBalane">{{ $PendingEmiTotal - $PaidEmiTotal }} DR.</span>
    </div>
    <!-- /.info-box-content -->
</div>
<!-- /.info-box -->


<script>
    $(document).ready(function () {
        GetAccountBalance('0bcb58f5-e80c-44e5-9dad-3624afa25381');
    });

    function GetAccountBalance(AccountId) {

        $.ajax({
            contentType: "application/json; charset=utf-8",
            type: "POST",
            url: "/Common/GetAccountBalance",
            data: '{AccountId: "' + AccountId + '" }',
            dataType: "json",
            success: function (response) {
                if (response > 0) {
                    $('#NetBalane').html(response + " CR.");
                    $('#NetBalaneCaption').html("Available Balance");
                }
                else {
                    $('#NetBalane').html(Math.abs(response) + " DR.");
                    $('#NetBalaneCaption').html("Outstanding Balance");
                }
            },
            failure: function (response) {
                alert(response.responseText);
            },
            error: function (response) {
                alert(response.responseText);
            }
        });
    }
</script>
                        </div>
                    </div>
                    

            <div class="box box-solid">
                <div class="box-header">
                    <h3 class="box-title">Account details</h3>
                </div>
                <div class="box-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Account No.</td>
                                <td>{{$row->account_no}} &nbsp;<a class="btn btn-default btn-xs" href="{{route('admin.businessLoan.edit',array('id' => $row['uuid']))}}"><i class="fa fa-edit"></i></a></td>
                            </tr>
                            <tr>
                                <td>Account Date</td>
                                <td>{{Helper::getFromDate($row->application_date)}}</td>
                            </tr>
                            <tr>
                                <td>Application No.</td>
                                <td>{{$row->application_mo}}  &nbsp;<a class="btn btn-default btn-xs" href="{{route('admin.businessLoan.edit',array('id' => $row['uuid']))}}"><i class="fa fa-edit"></i></a></td>
                            </tr>
                            <tr>
                                <td>Application Date</td>
                                <td>{{Helper::getFromDate($row->application_date)}}</td>
                            </tr>
                            <tr>
                                <td>Customer's Name</td>
                                <td><a href="{{route('admin.customer.edit',array('id' => @$row['customer']['customer_id']))}}" target="_blank"> {{@$row->customer->customer_code}} - {{@$row['customer']['name']}}</a></td>
                            </tr>
                            <tr>
                                <td>Scheme Name</td>
                                <td><a href="{{route('admin.loanScheme.view',array('id' => $row->Loanscheme->unique_code))}}" target="_blank"> {{@$row->Loanscheme->scheme_code}} - {{@$row->Loanscheme->name}} </a></td>
                            </tr>
                            <tr>
                                <td>Agent/Associate Name</td>
                                <td>{{@$row->agent->name}}</td>
                            </tr>
                           
                           <tr>
                                <td>Amount Requested</td>
                                <td>₹ <?= number_format(@$row->loan_amount_requested) ?></td>
                            </tr>
                            <tr>
                                <td>Loan Amount</td>
                                <td>₹ <?= number_format(@$row->loan_amount) ?></td>
                            </tr>

                             <tr>
                                <td>Annual Interest</td>
                                <td>{{@$row->annual_interest_rate}} (%)</td>
                            </tr>
                            <tr>
                                <td>Tenure</td>
                                <td>{{@$row->tenure}} <?= ucfirst($row->emi_payout) ?></td>
                            </tr>
                            <tr>
                                <td>EMI Payout</td>
                                <td><?= ucfirst($row->emi_payout) ?></td>
                            </tr>
                            <tr>
                                <td>EMI Credit Period</td>
                                <td>0 Days</td>
                            </tr>
                            <tr>
                                <td>Securities Type</td>
                                <td><?= str_replace('_',' ',ucfirst($row->security_type)) ?></td>
                            </tr>
                            
                          
                               <tr>
                                <td>Disburse Date</td>
                                <td>₹ {{@$row->disburse_date}}</td>
                            </tr>
                           
                             <tr>
                                <td>Co-Applicant's Name</td>
                                <td>
                                    <a href="/Members/View/7709baf3-1ddb-4068-844c-1e76e6e8b85c" target="_blank"> 
                                    {{@$row->join_customer->name}}</a></td>
                            </tr>
                            
                            <tr>
                                <td>First Guaranter's Name</td>
                                <td><?= ucfirst(@$row->guaranter_first) ?></td>
                            </tr>
                            <tr>
                                <td>Second Guaranter's Name</td>
                                 <td><?= ucfirst(@$row->guaranter_second) ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                            <td><span class="label label-success"><?= ucfirst(@$row->status) ?></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
<div class="box box-solid">
    <div class="box-header">
        <h3 class="box-title">Pledge detail</h3>
    </div>
    <div class="box-body">
        <table class="reporttable accountassociate">
            <thead>
                <tr>
                    <th style="padding:5px;">
                        Account No
                    </th>
                    <th style="padding:5px;">
                        Account Date
                    </th>
                    <th style="padding:5px;">
                        Account Type
                    </th>
                    <th style="padding:5px;">
                        Customer Name
                    </th>
                    <th style="padding:5px;">
                        Membership No
                    </th>
                    <th style="padding:5px;text-align:right;">
                        Disburse Amount
                    </th>
                    <th style="padding:5px;text-align:right;">
                        Balance
                    </th>
                    <th style="padding:5px;">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>



<script>
$(document).ready(function () {
    FillPledgeDetail('6c194203-cbc8-4dc6-b5d0-b91229591846');
});

function FillPledgeDetail(AccountId) {
    $.ajax({
        contentType: "application/json; charset=utf-8",
        type: "POST",
        url: "/Common/GetPledgeDetail",
        data: '{AccountId: "' + AccountId + '" }',
        dataType: "json",
        success: function (response) {
            var obj = response;
            var str = "";
            for (var i = 0; i < obj.length; ++i) {                    
                str=str+"<tr>"+
                    "<td style='padding:5px;'>" +
                    obj[i].AccountNo +
                    "</td>" +                        
                    "<td style='padding:5px;'>" +
                    jsontodate(obj[i].AccountDate) +
                    "</td>" +
                    "<td style='padding:5px;'>" +
                    obj[i].AccountType +
                    "</td>" +
                    "<td style='padding:5px;'>" +
                    obj[i].Name +
                    "</td>" +
                    "<td style='padding:5px;'>" +
                    obj[i].MemberShipNo+
                    "</td>" +
                    "<td style='padding:5px;text-align:right;'>" +
                    obj[i].DisbursesAmount +
                    "</td>" +
                    "<td style='padding:5px; text-align:right;'>" +
                    obj[i].BalanceAsOnDate +
                    "</td>" +
                    "<td style='padding:5px;'>" +
                    obj[i].Status +
                    "</td>" +
                "</tr>";                  
            }
            
            $('.accountassociate > tbody').html(str);
        },
        failure: function (response) {
            alert(response.responseText);
        },
        error: function (response) {
            alert(response.responseText);
        }
    });
}
</script>
        </div>
    </div>
</section>