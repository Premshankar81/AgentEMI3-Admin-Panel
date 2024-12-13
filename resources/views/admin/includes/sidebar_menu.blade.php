<section class="sidebar">
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{ URL::to('admin/assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>{{Auth::guard('admin')->user()->name}}</p>
      <a href="#">
        <i class="fa fa-circle text-success"></i> Online </a>
    </div>
  </div>
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat">
          <i class="fa fa-search"></i>
        </button>
      </span>
    </div>
  </form>
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="active">
      <a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
    </li>
    <li class="active">
        <a href="{{route('admin.customer.index')}}">
        <i class="fa fa-user-circle"></i> Member Admission </a>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-table"></i>
        <span>Share Management</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="{{route('admin.transfer_share_certificates.index')}}">
            <i class="fa fa-circle-o"></i> Transfer Share </a>
        </li>
        <li>
          <a href="{{route('admin.allocate_share_certificates.index')}}">
            <i class="fa fa-circle-o"></i> Allocate Share </a>
        </li>
       
      </ul>
    </li>
    
     <li class="treeview">
      <a href="#">
        <i class="fa fa-table"></i>
        <span>System Setting</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="{{route('admin.profileupdate.index')}}">
            <i class="fa fa-circle-o"></i> Profile / Business Update </a>
        </li>
       
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-table"></i>
        <span>Master</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="{{route('admin.branches.index')}}">
            <i class="fa fa-circle-o"></i> branches </a>
        </li>
        
        <li>
          <a href="{{route('admin.director_promoters.index')}}">
            <i class="fa fa-circle-o"></i> Director Promoters </a>
        </li>
        <li>
          <a href="{{route('admin.countries.index')}}">
            <i class="fa fa-circle-o"></i> Country </a>
        </li>
        <li>
          <a href="{{route('admin.state.index')}}">
            <i class="fa fa-circle-o"></i> State </a>
        </li>
        <li>
          <a href="{{route('admin.city.index')}}">
            <i class="fa fa-circle-o"></i> City </a>
        </li>
        <li>
          <a href="{{route('admin.bank.index')}}">
            <i class="fa fa-circle-o"></i>Bank Master </a>
        </li>
        
        <li>
          <a href="{{route('admin.class.index')}}">
            <i class="fa fa-circle-o"></i>Class Master </a>
        </li>
        
      </ul>
    </li>

  <li class="treeview " id="mainmenu_14">
        <a href="#">
          <i class="fa fa-fw fa-life-ring"></i> <span>Saving Accounts</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
            <li class="" id="submenu_15">
                <a href="{{route('admin.scheme.index')}}" target="_self">
                    <i class=""></i> <span>Scheme</span>
                </a>
            </li>
            <li class="" id="submenu_16">
                <a href="{{route('admin.saving_account.index')}}" target="_self">
                    <i class=""></i> <span>Saving Account Application</span>
                </a>
            </li>
            <li class="" id="submenu_17">
                <a href="{{route('admin.saving_account.index-pending')}}" target="_self">
                    <i class=""></i> <span>Approve Application</span>
                </a>
            </li>
            
            <li class="" id="submenu_18">
                <a href="{{route('admin.saving_account.index-all')}}" target="_self">
                    <i class=""></i> <span>Saving Account</span>
                </a>
            </li>
            <li class="" id="submenu_19">
                <a href="/SavingAccount/VirtualAccountIndex" target="_self">
                    <i class=""></i> <span>Virtual Account</span>
                </a>
            </li>
          </ul>
      </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-table"></i>
        <span>Ledger</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="{{route('admin.ledger_group.index')}}">
            <i class="fa fa-circle-o"></i> Ledger Group </a>
        </li>
        <li>
          <a href="{{route('admin.ledger_type.index')}}">
            <i class="fa fa-circle-o"></i> Ledger type </a>
        </li>
        <li>
          <a href="{{route('admin.ledger.index')}}">
            <i class="fa fa-circle-o"></i> Ledger </a>
        </li>
        <li>
          <a href="{{route('admin.vouchers.index')}}">
            <i class="fa fa-circle-o"></i> Vouchers </a>
        </li>
        
        <li>
          <a href="{{route('admin.trial_balance.index')}}">
            <i class="fa fa-circle-o"></i> Trial Balance </a>
        </li>
        
        <li>
          <a href="{{route('admin.ledger_view.index')}}">
            <i class="fa fa-circle-o"></i> Ledger view </a>
        </li>
        
        
      </ul>
    </li>

    <li class="treeview" id="mainmenu_20">
        <a href="#">
            <i class="fa fa-fw fa-repeat"></i> <span>Recurring Deposit</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
                <li id="submenu_21">
                    <a href="{{route('admin.rd_calculator.index')}}" target="_self">
                        <i class=""></i> <span>RD Calculator</span>
                    </a>
                </li> 
                <li class="" id="submenu_22">
                    <a href="{{route('admin.recurringScheme.index')}}" target="_self">
                        <i class=""></i> <span>Scheme</span>
                    </a>
                </li>
                <li class="" id="submenu_23">
                    <a href="{{route('admin.recurringDeposit.index')}}" target="_self">
                        <i class=""></i> <span>Recurring Deposit Application</span>
                    </a>
                </li>
                <li class="" id="submenu_24">
                    <a href="{{route('admin.recurringDepositApprove.index')}}" target="_self">
                        <i class=""></i> <span>Approve Application</span>
                    </a>
                </li>
                <li class="" id="submenu_25">
                    <a href="{{route('admin.recurringDepositApproved.index')}}" target="_self">
                        <i class=""></i> <span>Recurring Deposit Account</span>
                    </a>
                </li>
        </ul> 
    </li>

    <li class="treeview " id="mainmenu_26">
        <a href="#">
            <i class="fa fa-fw fa-save"></i> <span>Fixed Deposit</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
                <li class="" id="submenu_27">
                    <a href="{{route('admin.fd_calculator.index')}}" target="_self">
                        <i class=""></i> <span>Calculator</span>
                    </a>
                </li>
                <li class="" id="submenu_28">
                    <a href="{{route('admin.fixedDepositScheme.index')}}" target="_self">
                        <i class=""></i> <span>Scheme</span>
                    </a>
                </li>
                <li class="" id="submenu_29">
                    <a href="{{route('admin.fixedDeposit.index')}}" target="_self">
                        <i class=""></i> <span>FD Deposit Application</span>
                    </a> 
                </li>
                <li class="" id="submenu_30">
                    <a href="{{route('admin.fixedDepositApprove.index')}}" target="_self">
                        <i class=""></i> <span>Approve Application</span>
                    </a>
                </li> 
                <li class="" id="submenu_31">
                    <a href="{{route('admin.fixedDepositApproved.index')}}" target="_self">
                        <i class=""></i> <span>FD Deposit Account</span>
                    </a>
                </li>
        </ul>
    </li>

    <li class="treeview " id="mainmenu_59">
            <a href="#">
                <i class="fa fa-shopping-cart"></i> <span>Business / Other Loan</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                    <li class="" id="submenu_60">
                        <a href="{{route('admin.loan_calculator.index')}}" target="_self">
                            <i class=""></i> <span>Calculator</span>
                        </a>
                    </li>
                    <li class="" id="submenu_61">
                        <a href="{{route('admin.loanScheme.index')}}" target="_self">
                            <i class=""></i> <span>Scheme</span>
                        </a>
                    </li> 
                    <li class="" id="submenu_62">
                        <a href="{{route('admin.businessLoan.index')}}" target="_self">
                            <i class=""></i> <span>Application</span>
                        </a>
                    </li>
                    <li class="" id="submenu_63">
                        <a href="{{route('admin.businessLoanApprove.index')}}" target="_self">
                            <i class=""></i> <span>Approve Application</span>
                        </a>
                    </li>
                    <li class="" id="submenu_64">
                        <a href="{{route('admin.businessLoanApproved.index')}}" target="_self">
                            <i class=""></i> <span>Disburse Application</span>
                        </a>
                    </li>
                    <li class="" id="submenu_65">
                        <a href="{{route('admin.businessLoanApproved.index')}}" target="_self">
                            <i class=""></i> <span>Loan Accounts</span>
                        </a>
                    </li>
            </ul>
        </li>

    <li class="treeview" >
          <a href="#">
              <i class="fa fa-user"></i> <span>Agent/Advisor</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li class="active" id="submenu_90">
                <a href="{{route('admin.agentRank.index')}}" target="_self">
                    <i class=""></i> <span>Agents/Advisor Rank</span>
                </a>
            </li>
            <li class="" id="submenu_91">
                <a href="{{route('admin.agents.index')}}" target="_self">
                    <i class=""></i> <span>Agents/Advisor</span>
                </a>
            </li>
            <li class="" id="submenu_92">
                <a href="/CRPCommission/PayCommissionIndex" target="_self">
                    <i class=""></i> <span>Agents Commission Payment</span>
                </a>
            </li>
            <li class="" id="submenu_297">
                <a href="/Agents/PayCollectionChargeIndex" target="_self">
                    <i class=""></i> <span>Collection Charge Payment</span>
                </a>
            </li>
            <li class="" id="submenu_425">
                <a href="/CRPCommission/CommissionWithdrawlHistory" target="_self">
                    <i class=""></i> <span>Commission Withdraw Request</span>
                </a>
            </li>
        </ul>
    </li>


    <li class="treeview" id="mainmenu_96">
        <a href="#">
            <i class="fa fa-desktop"></i> <span>Payment to Collect</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
                <li class="" id="submenu_97">
                    <a href="{{route('admin.paymentCollect.index')}}" target="_self">
                        <i class=""></i> <span>Payment to Collect(Combined)</span>
                    </a>
                </li>
                <li class="" id="submenu_98">
                    <a href="{{route('admin.paymentCollectDeposit.index')}}" target="_self">
                        <i class=""></i> <span>Payment to Collect(Deposit)</span>
                    </a>
                </li>
                <li class="" id="submenu_99">
                    <a href="{{route('admin.paymentCollectLoan.index')}}" target="_self">
                        <i class=""></i> <span>Payment to Collect(Loan)</span>
                    </a>
                </li>
                <!-- <li class="" id="submenu_301">
                    <a href="/BulkDeposit/Manage" target="_self">
                        <i class=""></i> <span>Bulk Deposit</span>
                    </a>
                </li> -->
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-random"></i> <span>Pending Approvals</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          <li class="active" id="submenu_90">
              <a href="{{route('admin.pending-transation.index')}}" target="_self">
                  <i class=""></i> <span>Transation</span>
              </a>
          </li>
            <li class="active" id="submenu_90">
              <a href="{{route('admin.pending-application.index-pending')}}" target="_self">
                  <i class=""></i> <span>Application</span>
              </a>
          </li>
          
          <li class="active" id="submenu_90">
              <a href="" target="_self">
                  <i class=""></i> <span>NEFT/IMPS Transation</span>
              </a>
          </li>

          <li class="active" id="submenu_90">
              <a href="{{route('admin.pending-members.index-pending')}}" target="_self">
                  <i class=""></i> <span>Customer</span>
              </a>
          </li>

          <li class="active" id="submenu_90">
              <a href="" target="_self">
                  <i class=""></i> <span>PG Transation</span>
              </a>
          </li>

          <li class="active" id="submenu_90">
              <a href="{{route('admin.pending-voucher.index-pending')}}" target="_self">
                  <i class=""></i> <span>Voucher Entries</span>
              </a>
          </li>

        </ul>
    </li>

     <li class="treeview" id="mainmenu_96">
        <a href="#">
            <i class="fa fa-desktop"></i> <span>Reports</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
            
            <li class="active" id="submenu_90">
              <a href="{{route('admin.reports.index')}}" target="_self">
                  <i class=""></i> <span>Reports</span>
              </a>
            </li>
          
            <li class="" id="submenu_97">
                <a href="#" data-toggle="modal" data-target="#modal-daterange-reportsProfitnLoss" >
                    <i class=""></i> <span>Profit and Loss Account</span>
                </a>
            </li>
            <li class="" id="submenu_98">
                <a href="#" data-toggle="modal" data-target="#modal-daterange-reportsBalanceSheet" >
                    <i class=""></i> <span>Balance Sheet</span>
                </a>
            </li>
            
             <li class="active" id="submenu_90">
              <a href="{{route('admin.cashbook.index')}}" target="_self">
                  <i class=""></i> <span>Cashbook</span>
              </a>
            </li>
        </ul>
    </li>
    
  </ul>
</section>