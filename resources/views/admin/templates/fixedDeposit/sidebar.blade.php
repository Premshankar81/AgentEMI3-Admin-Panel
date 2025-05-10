<div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Options</h3>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">

 @if($row['status'] == 'approved')
<li>
    <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('AccountStatement','RecurringDeposit','6c194203-cbc8-4dc6-b5d0-b91229591846');">
        <i class="fa fa-list-ol"></i> &nbsp;&nbsp;Statement
    </a>
</li>

<li>
    <a href="{{route('admin.fixedDeposit.transactions',array('id' => $row['uuid']))}}"><i class="fa fa-bar-chart-o"></i>&nbsp;&nbsp;Transactions</a>
</li>
 <li>
<a href="{{route('admin.fixedDeposit.emilist',array('id' => $row['uuid']))}}"><i class="fa fa-pie-chart"></i>&nbsp;&nbsp;Payout-Plan</a>
</li>


<li> 
    <a href="{{route('admin.fixedDeposit.FDBond',array('id' => $row['uuid']))}}"><i class="fa fa-bookmark-o"></i>&nbsp;&nbsp;RD Bond</a>
</li>
<li>
    <a href="{{route('admin.fixedDeposit.preCloseAccount',array('id' => $row['uuid']))}}"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Pre-Close Account</a>
</li>
<li>
    <a href="{{route('admin.fixedDeposit.PartRelease',array('id' => $row['uuid']))}}"><i class="fa fa-pie-chart"></i>&nbsp;&nbsp;Part-Release</a>
</li>

<li>
    <a href="{{route('admin.fixedDeposit.nominee',array('id' => $row['uuid']))}}"><i class="fa fa-user-o"></i>&nbsp;&nbsp;Add/Update Nominee</a>
</li>
<li>
    <a href="{{route('admin.fixedDeposit.update-agent',array('id' => $row['uuid']))}}"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Update Associate/Agent</a>
</li> 
<li>
    <a href="{{route('admin.fixedDeposit.update-collector-agent',array('id' => $row['uuid']))}}"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Update Collector</a>
</li>

<li>
    <a href="{{route('admin.fixedDeposit.debit_crete_charges',array('id' => $row['uuid']))}}"><i class="fa fa-book"></i>&nbsp;&nbsp;Debit/Credit Account</a>
</li>

<li>
    <a href="/RecurringDeposit/TransactionAccruedInterest/6c194203-cbc8-4dc6-b5d0-b91229591846"><i class="fa fa-umbrella"></i>&nbsp;&nbsp;Accrued Interest</a>
</li>
<li>
    <a href="/RecurringDeposit/AgentCommission/6c194203-cbc8-4dc6-b5d0-b91229591846"><i class="fa fa-list"></i>&nbsp;&nbsp; Agent Commission</a>
</li>
<li>
<!--    <a href="/RecurringDeposit/CollectionChargeDetail/6c194203-cbc8-4dc6-b5d0-b91229591846"><i class="fa fa-calculator"></i>&nbsp;&nbsp;Collection Charge</a>
--></li>
<li>
    <a href="{{route('admin.fixedDeposit.blockAccount',array('id' => $row['uuid']))}}"><i class="fa fa-ban"></i>&nbsp;&nbsp;Block Account</a>
</li>
<!--<li>
    <a href="{{route('admin.fixedDeposit.jointaccount',array('id' => $row['uuid']))}}"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add/Edit Joint Account Detail</a>
</li>-->

<li>
    <a href="/RecurringDeposit/ApplicationForm/6c194203-cbc8-4dc6-b5d0-b91229591846"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Application Form</a>
</li>

<li>
<a href="/RecurringDeposit/Delete/6c194203-cbc8-4dc6-b5d0-b91229591846"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Remove Account</a>
</li>


@endif
    
@if($row['status'] == 'closed' || $row['status'] == 'block' || $row['status'] == 'preClosed')
<li>
    <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('AccountStatement','RecurringDeposit','6c194203-cbc8-4dc6-b5d0-b91229591846');">
        <i class="fa fa-list-ol"></i> &nbsp;&nbsp;Statement
    </a>
</li>
<li><a href="{{route('admin.fixedDeposit.transactions',array('id' => $row['uuid']))}}"><i class="fa fa-bar-chart-o"></i>&nbsp;&nbsp;Transactions</a></li>
<li><a href="{{route('admin.fixedDeposit.emilist',array('id' => $row['uuid']))}}"><i class="fa fa-pie-chart"></i>&nbsp;&nbsp;Payout-Plan</a></li>
<li><a href="{{route('admin.fixedDeposit.unblockAccount',array('id' => $row['uuid']))}}"><i class="fa fa-ban"></i>&nbsp;&nbsp;Un-Block Account</a></li>
<li> <a href="{{route('admin.fixedDeposit.FDBond',array('id' => $row['uuid']))}}"><i class="fa fa-bookmark-o"></i>&nbsp;&nbsp;RD Bond</a></li>

@endif

 </ul>
        </div>
    </div>
    <div class="info-box">
    <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
        <div class="info-box-content">
            <span class="info-box-text  text-center" id="NetBalaneCaption">Available Balance</span>
            <span class="info-box-text text-center"></span>
            <span class="info-box-number  text-center" style="font-size:18px;" id="NetBalane">₹ {{$row['available_balance']}}</span>
        </div>
    <!-- /.info-box-content -->
    </div>