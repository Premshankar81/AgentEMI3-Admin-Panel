<section class="content-header">
    <h1>
        FD Account
            <small>[ {{$row->account_no}} ]</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.fixedDeposit.manage',array('id' => $row['uuid']))}}">FD Accounts</a></li>
        <li class="active">FD Account</li>
        
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
    <a class="btn btn-danger" href="{{route('admin.fd-pending-transation.index')}}">CLICK HERE</a></p>
</div>
</div>
<?php endif ?>

<div class="col-md-3">
  @include('admin.templates.fixedDeposit.sidebar')

</div>

<div class="col-md-9">

            <div class="box box-solid">
                <div class="box-header">
                    <h3 class="box-title">Account details</h3>
                </div>
                <div class="box-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Account No.</td>
                                <td>{{$row->account_no}} &nbsp;<a class="btn btn-default btn-xs" href=""><i class="fa fa-edit"></i></a></td>
                            </tr>
                            <tr>
                                <td>Account Date</td>
                                <td>{{Helper::getFromDate($row->application_date)}}</td>
                            </tr>
                            <tr>
                                <td>Application No.</td>
                                <td>{{$row->application_mo}}  &nbsp;<a class="btn btn-default btn-xs" href="{{route('admin.fixedDeposit.edit',array('id' => $row['uuid']))}}"><i class="fa fa-edit"></i></a></td>
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
                                <td>Joint Account Holder's Name</td>
                                <td><a href="/Members/View/7709baf3-1ddb-4068-844c-1e76e6e8b85c" target="_blank">  VIDHYA TT</a></td>
                            </tr>
                            <tr>
                                <td>Minor's Name</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Scheme Name</td>
                                <td><a href="{{route('admin.recurringScheme.view',array('id' => $row->FDscheme->unique_code))}}" target="_blank"> {{@$row->FDscheme->scheme_code}} - {{@$row->FDscheme->name}} </a></td>
                            </tr>
                            <tr>
                                <td>Agent/Associate Name</td>
                                <td>{{@$row->agent->name}}</td>
                            </tr>
                            <tr>
                                <td>FD Amount</td>
                                <td>₹ {{@$row->fd_amount}}</td>
                            </tr>

                            <tr>
                                <td>Maturity Amount</td>
                                <td>₹ {{@$row->maturity_amount}}</td>
                            </tr>
                            <tr>
                                <td>Maturity Date</td>
                                <td>{{Helper::getFromDate($row->maturity_date)}}</td>
                            </tr>
                            <tr>
                                <td>Interest Rate</td>
                                <td>{{@$row->interest_rate}}%</td>
                            </tr>
                            <tr>
                                <td>RD Frequency</td>
                                <td><?= ucfirst(@$row->fd_frequency) ?></td>
                            </tr>
                            <tr>
                                <td>Tenure</td>
                                <td> {{@$row->fd_tenure}} - Months</td>
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