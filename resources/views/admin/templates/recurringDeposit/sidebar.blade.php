
     @if($row['status'] == 'approved')

    <li><a href="{{route('admin.recurringDeposit.deposit',array('id' => $row['uuid']))}}"><i class="fa fa-plus-square-o"></i>&nbsp;&nbsp;Pay-Installment</a></li>
    
    <li>
        <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('AccountStatement','RecurringDeposit','6c194203-cbc8-4dc6-b5d0-b91229591846');">
            <i class="fa fa-list-ol"></i> &nbsp;&nbsp;Statement
        </a>
    </li>

    <li>
        <a href="{{route('admin.recurringDeposit.emilist',array('id' => $row['uuid']))}}"><i class="fa fa-pie-chart"></i>&nbsp;&nbsp;EMI Chart</a>
    </li>
    <li>
        <a href="{{route('admin.recurringDeposit.transactions',array('id' => $row['uuid']))}}"><i class="fa fa-bar-chart-o"></i>&nbsp;&nbsp;Transactions</a>
    </li>
        <li> 
            <a href="{{route('admin.recurringDeposit.RDBond',array('id' => $row['uuid']))}}"><i class="fa fa-bookmark-o"></i>&nbsp;&nbsp;RD Bond</a>
        </li>

        <li>
            <a href="{{route('admin.recurringDeposit.preCloseAccount',array('id' => $row['uuid']))}}"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Pre-Close Account</a>
        </li>
        <li>
            <a href="{{route('admin.recurringDeposit.PartRelease',array('id' => $row['uuid']))}}"><i class="fa fa-pie-chart"></i>&nbsp;&nbsp;Part-Release</a>
        </li>
        
        <li>
            <a href="{{route('admin.recurringDeposit.nominee',array('id' => $row['uuid']))}}"><i class="fa fa-user-o"></i>&nbsp;&nbsp;Add/Update Nominee</a>
        </li>
        <li>
            <a href="{{route('admin.recurringDeposit.update-agent',array('id' => $row['uuid']))}}"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Update Associate/Agent</a>
        </li> 
    
       <!-- <li>
            <a href="{{route('admin.recurringDeposit.update-collector-agent',array('id' => $row['uuid']))}}"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Update Collector</a>
        </li>-->
          <!--  <li>
                <a href="{{route('admin.recurringDeposit.link-saving',array('id' => $row['uuid']))}}"><i class="fa fa-link"></i>&nbsp;&nbsp;Link Saving Account</a>
            </li>
        <li>
            <a href="/SubscriptionService/Index/6c194203-cbc8-4dc6-b5d0-b91229591846"><i class="fa fa-link"></i>&nbsp;&nbsp;Subscription Service &nbsp;<span class="label label-danger">Paid</span></a>
        </li>
        <li>
            <a href="/Emandate/UMRN/6c194203-cbc8-4dc6-b5d0-b91229591846"><i class="fa fa-link"></i>&nbsp;&nbsp;ENACH (AU)&nbsp;<span class="label label-danger">Paid</span></a>
        </li>-->

    <li>
        <a href="/Passbook/Transactions/6c194203-cbc8-4dc6-b5d0-b91229591846"><i class="fa fa-book"></i>&nbsp;&nbsp;Passbook</a>
    </li>

        <li>
            <a href="{{route('admin.recurringDeposit.debit_crete_charges',array('id' => $row['uuid']))}}"><i class="fa fa-book"></i>&nbsp;&nbsp;Debit/Credit Account</a>
        </li>
        <li> 
            <a href="{{route('admin.recurringDeposit.welcomeletter',array('id' => $row['uuid']))}}"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;Welcome Letter</a>
        </li>
        <li>
            <a href="#" data-toggle="modal" data-target="#modal-interetcalcpopup"><i class="fa fa-tags"></i>&nbsp;&nbsp;Calculate &amp; Deposit Interest</a>
        </li>
        <li>
            <a href="/RecurringDeposit/TransactionAccruedInterest/6c194203-cbc8-4dc6-b5d0-b91229591846"><i class="fa fa-umbrella"></i>&nbsp;&nbsp;Accrued Interest</a>
        </li>
    <!--    <li>
            <a href="/RecurringDeposit/AgentCommission/6c194203-cbc8-4dc6-b5d0-b91229591846"><i class="fa fa-list"></i>&nbsp;&nbsp; Agent Commission</a>
        </li>
        <li>
            <a href="/RecurringDeposit/CollectionChargeDetail/6c194203-cbc8-4dc6-b5d0-b91229591846"><i class="fa fa-calculator"></i>&nbsp;&nbsp;Collection Charge</a>
        </li>-->
        <li>
            <a href="/RecurringDeposit/BlockUnBlockAccount/6c194203-cbc8-4dc6-b5d0-b91229591846"><i class="fa fa-ban"></i>&nbsp;&nbsp;Block Account</a>
        </li>
        <li>
<!--            <a href="/RecurringDeposit/AddEditJointAccountDetail/6c194203-cbc8-4dc6-b5d0-b91229591846"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add/Edit Joint Account Detail</a>
-->        </li>
        <li>
            <a href="/RecurringDeposit/ApplicationForm/6c194203-cbc8-4dc6-b5d0-b91229591846"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Application Form</a>
        </li>
    
    <li>
        <a href="/RecurringDeposit/Delete/6c194203-cbc8-4dc6-b5d0-b91229591846"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Remove Account</a>
    </li>

     @endif
    
    @if($row['status'] == 'closed' || $row['status'] == 'block')
    
    <li><a href="javascript:void(0)" onclick="statement_modal();"><i class="fa fa-list-ol"></i> &nbsp;&nbsp;Statement</a></li>
    <li><a href="{{route('admin.saving_account.transactions',array('id' => $row['uuid']))}}"><i class="fa fa-bar-chart-o"></i>&nbsp;&nbsp;Transactions</a></li>
    <li><a href="{{route('admin.saving_account.unblockAccount',array('id' => $row['uuid']))}}"><i class="fa fa-ban"></i>&nbsp;&nbsp;Un-Block Account</a></li>
    <li><a href=""><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Remove Account</a></li>
    
    
    @endif