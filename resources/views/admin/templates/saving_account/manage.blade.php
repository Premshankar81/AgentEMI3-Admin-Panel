<section class="content-header">
<h1>
Saving Account
<small>[{{$row['account_no']}}]</small>
</h1>
<ol class="breadcrumb">
<li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="{{route('admin.saving_account.index')}}">Saving Application List</a></li>
<li class="active">Saving Accounts</li>
</ol>
</section>

<section class="content">
<div class="row">
<div class="col-md-12" style="padding-bottom:10px;">
</div>


<?php if (count($CheckExistPendingTransation) > 0): ?>
<div class="col-md-12" style="padding-bottom:10px;">
<div class="alert alert-warning alert-dismissible margin-top-10 margin-bottom-0">
<h4><i class="icon fa fa-ban"></i> ALERT PENDING TRANSACTION!</h4>
<p class="ft-16">Some transactions are pending for approval. To approve &nbsp; 
    <a class="btn btn-danger" href="{{route('admin.pending-transation.index')}}">CLICK HERE</a></p>
</div>
</div>
<?php endif ?>

<div class="col-md-3">
<div class="box box-solid">
<div class="box-header with-border">
<h3 class="box-title">Options</h3>
</div>
<div class="box-body no-padding">
<ul class="nav nav-pills nav-stacked">
    
    
    @if($row['status'] == 'approved')
    
    <li><a href="{{route('admin.saving_account.deposit',array('id' => $row['uuid']))}}"><i class="fa fa-plus-square-o"></i>&nbsp;&nbsp;Deposit Amount</a></li>
    
    <li><a href="{{route('admin.saving_account.withdraw',array('id' => $row['uuid']))}}"><i class="fa fa-minus-square-o"></i>&nbsp;&nbsp;Withdraw Amount</a></li>
    
<!--    <li><a href="{{route('admin.saving_account.neftImps',array('id' => $row['uuid']))}}"><i class="fa fa-minus-square-o"></i>&nbsp;&nbsp;NEFT/IMPS </a></li>
-->    
    <li><a href="javascript:void(0)" onclick="statement_modal();"><i class="fa fa-list-ol"></i> &nbsp;&nbsp;Statement</a></li>
    
    <li><a href="{{route('admin.saving_account.passbook',array('id' => $row['uuid']))}}"><i class="fa fa-book"></i>&nbsp;&nbsp;Passbook</a></li>
    
    <li><a href="{{route('admin.saving_account.transactions',array('id' => $row['uuid']))}}"><i class="fa fa-bar-chart-o"></i>&nbsp;&nbsp;Transactions</a></li>
    
    <li><a href="{{route('admin.saving_account.nominee',array('id' => $row['uuid']))}}"><i class="fa fa-user-o"></i>&nbsp;&nbsp;Add/Update Nominee</a></li>
    
    <li><a href="{{route('admin.saving_account.welcomeletter',array('id' => $row['uuid']))}}"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;Welcome Letter</a></li>

    <li><a href="{{route('admin.saving_account.UpgradeScheme',array('id' => $row['uuid']))}}"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Update Scheme</a></li>
    
    <!-- <li><a href=""><i class="fa fa-book"></i>&nbsp;&nbsp;Passbook</a></li> -->
    <li><a href="{{route('admin.saving_account.update-agent',array('id' => $row['uuid']))}}"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Update Associate</a></li>

<!--    <li><a href="{{route('admin.saving_account.update-collector-agent',array('id' => $row['uuid']))}}"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Update Collector</a></li>
-->
    <li><a href="{{route('admin.saving_account.debit_crete_charges',array('id' => $row['uuid']))}}"><i class="fa fa-book"></i>&nbsp;&nbsp;Debit/Credit Account</a></li>

    
    <li><a href="#" data-toggle="modal" data-target="#modal-interetcalcpopup"><i class="fa fa-tags"></i>&nbsp;&nbsp;Calculate &amp; Deposit Interest</a></li>
<!--    <li><a href="{{route('admin.saving_account.agent-commission',array('id' => $row['uuid']))}}"><i class="fa fa-calculator"></i>&nbsp;&nbsp;Agent Commission</a></li>
    <li><a href="{{route('admin.saving_account.collection-charge',array('id' => $row['uuid']))}}"><i class="fa fa-calculator"></i>&nbsp;&nbsp;Collection Charge</a></li>
    <li><a href="{{route('admin.saving_account.setLienAmount',array('id' => $row['uuid']))}}"><i class="fa fa-lightbulb-o"></i>&nbsp;&nbsp;Set LIEN Amount</a></li>
    <li><a href="{{route('admin.saving_account.setNEFTLimitAmount',array('id' => $row['uuid']))}}"><i class="fa fa-lightbulb-o"></i>&nbsp;&nbsp;Set NEFT/Scan Pay Limit</a></li>-->
    
    <li><a href="{{route('admin.saving_account.closeAccount',array('id' => $row['uuid']))}}"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Close Account</a></li>
    <li><a href="{{route('admin.saving_account.blockAccount',array('id' => $row['uuid']))}}"><i class="fa fa-ban"></i>&nbsp;&nbsp;Block Account</a></li>
  <!--  <li><a href="{{route('admin.saving_account.jointaccount',array('id' => $row['uuid']))}}"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add/Edit Joint Account Detail</a></li>
    <li><a href="{{route('admin.saving_account.editMinor',array('id' => $row['uuid']))}}"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add/Edit Minor </a></li>-->
    <li><a href=""><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Application Form </a></li>
    <li><a href=""><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Remove Account</a></li>
    
    @endif
    
    @if($row['status'] == 'closed' || $row['status'] == 'block')
    
    <li><a href="javascript:void(0)" onclick="statement_modal();"><i class="fa fa-list-ol"></i> &nbsp;&nbsp;Statement</a></li>
    <li><a href="{{route('admin.saving_account.transactions',array('id' => $row['uuid']))}}"><i class="fa fa-bar-chart-o"></i>&nbsp;&nbsp;Transactions</a></li>
    <li><a href="{{route('admin.saving_account.unblockAccount',array('id' => $row['uuid']))}}"><i class="fa fa-ban"></i>&nbsp;&nbsp;Un-Block Account</a></li>
    <li><a href=""><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Remove Account</a></li>
    
    
    @endif
    
    
    <!--
    <li><a href=""><i class="fa fa-lightbulb-o"></i>&nbsp;&nbsp;Set NEFT/Scan Pay Limit</a></li>
    <li><a href=""><i class="fa fa-id-card"></i>&nbsp;&nbsp;RU-PAY Card</a></li>
    <li><a href=""><i class="fa fa-id-card"></i>&nbsp;&nbsp;Debit(ATM) Card</a></li>
    <li><a href=""><i class="fa fa-tag"></i>&nbsp;&nbsp;Virtual IFSC/Account</a></li>
    <li><a href=""><i class="fa fa-tag"></i>&nbsp;&nbsp;Create UPI Id &nbsp;<span class="label label-danger">Paid</span></a></li>
    -->

</ul>
</div>
</div>
</div>

<div class="col-md-9">
<div class="row">
<div class="col-md-12">

<div class="info-box">
<span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

<div class="info-box-content">
<span class="info-box-text  text-center" id="NetBalaneCaption">Available Balance</span>
<span class="info-box-text text-center">₹</span>
<span class="info-box-number  text-center" style="font-size:18px;" id="NetBalane">{{$row['available_balance']}} CR.</span>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->


<script>
$(document).ready(function () {
GetAccountBalance('52d9692f-0fac-49de-98af-207acecb74e2');
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
            <td>{{$row['account_no']}} &nbsp;<a class="btn btn-default btn-xs" href=""><i class="fa fa-edit"></i></a></td>
        </tr>
        <tr>
            <td>Account Date</td>
            <td>{{Helper::getFromDate($row['inserted'])}}</td>
        </tr>
        <tr>
            <td>Virtual A/c No.</td>
            <td></td>
        </tr>
        <tr>
            <td>IFSC Code</td>
            <td></td>
        </tr>
        <tr>
            <td>UPI Id</td>
            <td></td>
        </tr>
        <tr>
            <td>Application No.</td>
            <td>{{$row['application_mo']}} &nbsp;<a class="btn btn-default btn-xs" href=""><i class="fa fa-edit"></i></a></td>
        </tr>
        <tr>
            <td>Application Date</td>
            <td> {{Helper::getFromDate($row['created_at'])}}</td>
        </tr>
        <tr>
            <td>Customer's Name</td>
            <td><a href="" target="_blank"> {{@$row['customer']['customer_code']}} - {{@$row['customer']['name']}}</a></td>
        </tr>
        <tr>
            <td>Joint Account Holder's Name</td>
            <td><a href="" target="_blank"> {{@$row['join_customer']['name']}}</a></td>
        </tr>
        <tr>
            <td>Minor's Name</td>
            <td></td>
        </tr>
        <tr>
            <td>Scheme Name</td>
            <td><a href="" target="_blank"> {{@$row['scheme']['scheme_code']}} - {{@$row['scheme']['name']}} </a></td>
        </tr>
        <tr>
            <td>Agent/Associate Name</td>
            <td>{{@$row['agent']['agent_code']}} - {{@$row['agent']['name']}}</td>
        </tr>
        <tr>
            <td>Interest Rate</td>
            <td> {{@$row['scheme']['interest_rate']}} </td>
        </tr>
        <tr>
            <td>Interest Payout</td>
            <td> {{@$row['scheme']['interest_payout']}} </td>
        </tr>
        <tr>
            <td>Status</td>
            <td><span class="label label-success"><?= ucfirst(@$row['status']) ?></span></td>
        </tr>
    </tbody>
</table>
</div>
</div>
</div>
</div>
</section>