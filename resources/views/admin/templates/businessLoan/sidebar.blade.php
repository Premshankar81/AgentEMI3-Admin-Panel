@if($row->status == 'approved')
<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Options</h3>
    </div>
    <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
            <li>
                <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('AccountStatement','BusinessLoan','dcc7a319-7af7-473e-a932-bd01b6db696d');">
                    <i class="fa fa-list-ol"></i> &nbsp;&nbsp;Statement
                </a>
            </li>
            <li>
                <a href="{{route('admin.businessLoan.emilist',array('id' => $row['uuid']))}}"><i class="fa fa-pie-chart"></i>&nbsp;&nbsp;EMI Chart</a>
            </li>
            <li>
                <a href="{{route('admin.businessLoan.transactions',array('id' => $row['uuid']))}}"><i class="fa fa-bar-chart-o"></i>&nbsp;&nbsp;Transactions</a>
            </li>
            <li>
                <a href="{{route('admin.acknowledgement.index',array('id' => $row['uuid']))}}"><i class="fa fa-tags"></i>&nbsp;&nbsp;Acknowledgement</a>
            </li>
            
            <li>
                <a href="{{route('admin.loanAgreement.index',array('id' => $row['uuid']))}}"><i class="fa fa-drivers-license-o"></i>&nbsp;&nbsp;Loan Agreement</a>
            </li>
                                        <li>
                    <a href="{{route('admin.businessLoan.santionLetter',array('id' => $row['uuid']))}}"><i class="fa fa-certificate"></i>&nbsp;&nbsp;Sanction Letter</a>
            </li>
                                                                    <li>
                <a href="javascript:void(0)"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Remove Account</a>
            </li>


        </ul>
    </div>
</div>
@endif


@if($row->status == 'disburse')
<div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Options</h3>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
<li>
    <a href="{{route('admin.businessLoan.deposit',array('id' => $row['uuid']))}}"><i class="fa fa-plus-square-o"></i>&nbsp;&nbsp;Deposit Amount</a>
</li>                                


<li>
<a href="#" data-toggle="modal" data-target="#modal-daterange">
    <i class="fa fa-list-ol"></i> &nbsp;&nbsp;Statement
</a>
</li>

 <li>
<a href="{{route('admin.businessLoan.emilist',array('id' => $row['uuid']))}}"><i class="fa fa-pie-chart"></i>&nbsp;&nbsp;EMI Chart</a>
</li>
<li>
    <a href="{{route('admin.businessLoan.transactions',array('id' => $row['uuid']))}}"><i class="fa fa-bar-chart-o"></i>&nbsp;&nbsp;Transactions</a>
</li>



<li>
    <a href="{{route('admin.businessLoan.nominee',array('id' => $row['uuid']))}}"><i class="fa fa-user-o"></i>&nbsp;&nbsp;Add/Update Nominee</a>
</li>
<li>
    <a href="{{route('admin.businessLoan.update-agent',array('id' => $row['uuid']))}}"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Update Associate/Agent</a>
</li> 
<!--<li>
    <a href="{{route('admin.businessLoan.update-collector-agent',array('id' => $row['uuid']))}}"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Update Collector</a>
</li>

-->
<li>
    <a href="{{route('admin.businessLoan.debit_crete_charges',array('id' => $row['uuid']))}}"><i class="fa fa-book"></i>&nbsp;&nbsp;Debit/Credit Account</a>
</li>
<li>
    <a href="#" data-toggle="modal" data-target="#modal-interetcalcpopup"><i class="fa fa-tags"></i>&nbsp;&nbsp;Calculate &amp; Deposit Interest</a>
</li>
<!--<li>
        <a href="{{route('admin.businessLoan.ReConstruct',array('id' => $row['uuid']))}}"><i class="fa fa-refresh"></i>&nbsp;&nbsp;Re-Construct EMI</a>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-list"></i>&nbsp;&nbsp; Agent Commission</a>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-calculator"></i>&nbsp;&nbsp;Collection Charge</a>
</li>
<li>
    <a href="{{route('admin.businessLoan.PartRelease',array('id' => $row['uuid']))}}"><i class="fa fa-money"></i>&nbsp;&nbsp;Part Payment</a>
</li>-->

<li>
    <a href="{{route('admin.acknowledgement.index',array('id' => $row['uuid']))}}"><i class="fa fa-tags"></i>&nbsp;&nbsp;Acknowledgement</a>
</li>

<li>
    <a href="{{route('admin.loanAgreement.index',array('id' => $row['uuid']))}}"><i class="fa fa-drivers-license-o"></i>&nbsp;&nbsp;Loan Agreement</a>
</li>

<li>
    <a href="{{route('admin.fixedDeposit.preCloseAccount',array('id' => $row['uuid']))}}"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Pre-Close Account</a>
</li>
<!-- <li>
    <a href="{{route('admin.fixedDeposit.PartRelease',array('id' => $row['uuid']))}}"><i class="fa fa-pie-chart"></i>&nbsp;&nbsp;Part-Release</a>
</li>  -->
<li>
    <a href="{{route('admin.businessLoan.passbook',array('id' => $row['uuid']))}}"><i class="fa fa-book"></i>&nbsp;&nbsp;Passbook</a>
</li>
<li>
    <a href="{{route('admin.businessLoan.santionLetter',array('id' => $row['uuid']))}}"><i class="fa fa-certificate"></i>&nbsp;&nbsp;Sanction Letter</a>
</li>

<li>
    <a href="{{route('admin.businessLoan.link-saving',array('id' => $row['uuid']))}}"><i class="fa fa-link"></i>&nbsp;&nbsp;Link Saving Account</a>
</li>
<!--<li>
<a href="javascript:void(0)"><i class="fa fa-link"></i>&nbsp;&nbsp;Subscription Service &nbsp;<span class="label label-danger">Paid</span></a>
</li>
<li>
    <a href="/Emandate/UMRN/9e1ecadc-8650-49f3-a7d5-68cd10b18a4c"><i class="fa fa-link"></i>&nbsp;&nbsp;ENACH (AU)&nbsp;<span class="label label-danger">Paid</span></a>
</li>-->

<li>
    <a href="{{route('admin.businessLoan.blockAccount',array('id' => $row['uuid']))}}"><i class="fa fa-ban"></i>&nbsp;&nbsp;Block Account</a>
</li>
<li>
<a href="javascript:void(0)"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Remove Account</a>
</li>



 </ul>
</div>
</div>
   
@endif


@if($row->status == 'block')
<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Options</h3>
    </div>
    <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
           <li>
    <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('AccountStatement','RecurringDeposit','6c194203-cbc8-4dc6-b5d0-b91229591846');">
        <i class="fa fa-list-ol"></i> &nbsp;&nbsp;Statement
    </a>
</li>
<li><a href="{{route('admin.businessLoan.transactions',array('id' => $row['uuid']))}}"><i class="fa fa-bar-chart-o"></i>&nbsp;&nbsp;Transactions</a></li>
<li><a href="{{route('admin.businessLoan.emilist',array('id' => $row['uuid']))}}"><i class="fa fa-pie-chart"></i>&nbsp;&nbsp;Payout-Plan</a></li>
<li><a href="{{route('admin.businessLoan.unblockAccount',array('id' => $row['uuid']))}}"><i class="fa fa-ban"></i>&nbsp;&nbsp;Un-Block Account</a></li>
<li> <a href="{{route('admin.businessLoan.emilist',array('id' => $row['uuid']))}}"><i class="fa fa-bookmark-o"></i>&nbsp;&nbsp;RD Bond</a></li>
 


        </ul>
    </div>
</div>
@endif