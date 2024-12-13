<section class="content-header">
   <h1>
      MIS Reports
   </h1>
   <ol class="breadcrumb">
      <li><a href="\Home\Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Reports</li>
   </ol>
</section>

<style>
.jumbomenu {
    font-size: 15px;
    padding-top: 0px;
    font-weight: 400;
    cursor: pointer;
    font-family: Calibri;
}

.jumbomenu li {
    padding-top: 5px;
    font-weight: 400;
}
</style>

<section class="content padding-top-0">
   <div class="box box-solid">
      <div class="box-body">
         <h2 class="page-header">
            <i class="fa fa-user"></i> Branch Reports
         </h2>
         <div class="col-md-3">
            <div class="form-group">
               <h5 class="menuhead"><strong>Deposit Accounts</strong></h5>
               <ul class="jumbomenu">
                  <li>
                     <a target="_blank" href="{{route('admin.reportSavingAccount.index')}}"><span>Saving Accounts</span></a>
                  </li> 
                  <li>
                     <a href="{{route('admin.fdAccountView.index')}}"><span>Fixed Deposit (FD) Accounts</span></a>
                  </li>
                  <li>
                     <a href="{{route('admin.rdAccountView.index')}}"><span>Recurring Deposit (RD) Accounts</span></a>
                  </li>
                  <li>
                     <a href="{{route('admin.DDAccount.index')}}"><span>Daily Deposit (DD) Accounts</span></a>
                  </li>
                  
                  <li>
                     <a href="{{route('admin.MISAccount.index')}}"><span>MIS Accounts</span></a>
                  </li>
               </ul>
            </div>
            <div class="form-group">
               <h5 class="menuhead"><strong>Loan Accounts</strong></h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="/Report/GoldLoanView"><span>Gold Loan Accounts</span></a>
                  </li>
                  <li>
                     <a href="/Report/PropertyLoanView"><span>Property Loan Accounts</span></a>
                  </li>
                  <li>
                     <a href="/Report/DepositLoanView"><span>Loan Against Deposit Accounts</span></a>
                  </li>
                  <li>
                     <a href="/Report/BusinessLoanView"><span>Business/Other Loan Accounts</span></a>
                  </li>
                  <li>
                     <a href="/Report/CashCreditLoanView"><span>Cash Credit Loan Accounts</span></a>
                  </li>
                  <li>
                     <a href="/Report/FixedEMILoanView"><span>Fixed EMI Loan Accounts</span></a>
                  </li>
                  <li>
                     <a href="/Report/NOEMILoanView"><span>No-EMI Loan Accounts</span></a>
                  </li>
                  <li>
                     <a href="/Report/MicroLoanView"><span>Micro Loan Accounts</span></a>
                  </li>
                  <li>
                     <a href="/Report/VehicleLoanView"><span>Vehicle Loan Accounts</span></a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group">
               <h5 class="menuhead"> Financial Reports</h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="{{route('admin.paymentCollect.index')}}"><span>Payment To Collect</span></a>
                  </li>  
                  <li>
                     <a href="{{route('admin.PaymentRelease.index')}}"><span>Payment To Release</span></a>
                  </li>
                  <li>
                     <a href="#" data-toggle="modal" data-target="#modal-daterange-CollectionAccountWise">
                     <span>
                     Collection Account wise
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="#" data-toggle="modal" data-target="#modal-daterange-CollectionAgentWise">
                     <span>
                     Collection Agent Wise (With saving A/c)
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="{{route('admin.CashReportUserwise.index')}}"><span>Cash Collection User Wise</span></a>
                  </li>
                  <li>
                     <a href="{{route('admin.cashbook.index')}}"><span>Cash Book</span></a>
                  </li>
                  <li>
                     <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('loanDueReportView','Report','');">
                     <span>
                     EMI Due Report
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>No Emi Loan Dues</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>No Emi Loan Dues (As on Today)</span></a>
                  </li>
                  <li>
                     <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('CurrencyDenomination','Report','');">
                     <span>
                     Currency Denomination Report
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Accrued Interest detail</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Account Matured but amount pending</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Cash/Bank Transactions</span></a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group">
               <h5 class="menuhead">Member Reports</h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="javascript:void(0)"><span>Member Master Detail</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Share Certificate Detail</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Allocate Share Detail</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Share Holding Report</span></a>
                  </li>
               </ul>
            </div>
            <div class="form-group">
               <h5 class="menuhead"> Business Reports</h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('WorkStatus','Report','');">
                     <span>
                     Business Report
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('DailyCollectPaid','Report','');">
                     <span>
                     Daily Business Collection &amp; Expenses Report
                     </span>
                     </a>
                  </li>
               </ul>
            </div>
            <div class="form-group">
               <h5 class="menuhead"> POS Machine Integration</h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="javascript:void(0)"><span>POS Machine Export Data</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>POS Machine Import Data</span></a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group">
               <h5 class="menuhead">Transactions</h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="javascript:void(0)">Pending Transactions</a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Approved Transactions</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Reject Transactions</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Account Summary</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Account Summary (Loan/RD)</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Account Summary-NDH3</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Account Summary (Loan) Financial year wise</span></a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="clearfix"></div>
         <h2 class="page-header">
            <i class="fa fa-users"></i> Consolidate Reports
         </h2>
         <div class="col-md-3">
            <div class="form-group">
               <h5 class="menuhead"><strong>Deposit Accounts</strong></h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="javascript:void(0)"><span>Saving Accounts</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Fixed Deposit (FD) Accounts</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Recurring Deposit (RD) Accounts</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Daily Deposit (DD) Accounts</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>MIS Accounts</span></a>
                  </li>
               </ul>
            </div>
            <div class="form-group">
               <h5 class="menuhead"><strong>Loan Accounts</strong></h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="javascript:void(0)"><span>Gold Loan Accounts</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Property Loan Accounts</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Loan Against Deposit Accounts</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Business/Other Loan Accounts</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Cash Credit Loan Accounts</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Fixed EMI Loan Accounts</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>No-EMI Loan Accounts</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>No-EMI Loan Projected View</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Micro Loan Accounts</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Loan Account Paid/Outstanding</span></a>
                  </li>
               </ul>
            </div>
            <div class="form-group">
               <h5 class="menuhead"><strong>Emandate</strong></h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="javascript:void(0)"><span>Payment Registration Link</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Emandate Charge Detail</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Emandate Charge Awaited</span></a>
                  </li>
               </ul>
            </div>
            <div class="form-group">
               <h5 class="menuhead"><strong>ENACH (AU)</strong></h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="javascript:void(0)"><span>ENACH Registration</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)d"><span>ENACH Charge Awaited</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>ENACH Import</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>ENACH Collection</span></a>
                  </li>
               </ul>
            </div>
            <div class="form-group">
               <h5 class="menuhead"><strong>ENACH (Axis)</strong></h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="javascript:void(0)"><span>ENACH Registration</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>ENACH Charge Awaited</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>ENACH Import</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>ENACH Collection</span></a>
                  </li>
               </ul>
            </div>
            <div class="form-group">
               <h5 class="menuhead"><strong>Debit Card/NEFT Transactions</strong></h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="javascript:void(0)"><span>Debit Card Transactions</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>NEFT/RTGS Transactions</span></a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group">
               <h5 class="menuhead"><strong>Financial Reports</strong></h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('loanDueReportBusinessView','Report','');">
                     <span>
                     EMI Due Report
                     </span>
                     </a>
                  </li>
               </ul>
            </div>
            <div class="form-group">
               <h5 class="menuhead"><strong>Member Reports</strong></h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="javascript:void(0)"><span>Member Master Detail</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Financial Year wise Cash Transactions</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Member's Birthday Report</span></a>
                  </li>
               </ul>
            </div>
            <div class="form-group">
               <h5 class="menuhead"><strong>Business Reports</strong></h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('WorkStatusAllBranch','Report','');">
                     <span>
                     Business Report
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('BusinessReportSchemeWise','Report','');">
                     <span>
                     Business Report Scheme wise
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('AgentBusinessReport','Report','');">
                     <span>
                     Agent Deposit Business Reports
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('BranchBusinessReport','Report','');">
                     <span>
                     Branch Deposit Business Reports
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('DepositSummary','Report','');">
                     <span>
                     Deposit account summary
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="/Report/MaturedAccountView">
                     <span>
                     FD/RD Matured/Closed Account summary
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('RenewalDepositReport','Report','');">
                     <span>
                     Renewal Deposit Summary
                     </span>
                     </a>
                  </li>
               </ul>
            </div>
            <div class="form-group">
               <h5 class="menuhead">Agent/Collector Commission</h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('IncentiveReport','CRPCommission','');">
                     <span>
                     Agent Incentive Report
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Collector Commission Report</span></a>
                  </li>
                  <li>
                     <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('MyIncentiveReport','CRPCommission','');">
                     <span>
                     My Incentive Report
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>My Downline Agent</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>My Upline Agent</span></a>
                  </li>
               </ul>
            </div>
            <div class="form-group">
               <h5 class="menuhead">Subscriptions</h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="javascript:void(0)"><span>Subscriptions Status</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Subscriptions Payments</span></a>
                  </li>
               </ul>
            </div>
            <div class="form-group">
               <h5 class="menuhead">Data Repository</h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="javascript:void(0)"><span>Member/Promoters data</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Transactions data</span></a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group">
               <h5 class="menuhead"><strong>Accounts</strong></h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('ProfitnLossConsolidate','Accounts','');">
                     Profit and Loss Account
                     </a>
                  </li>
                  <li>
                     <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showdaterange('TrialBalanceConsolidate','Accounts','');">
                     Trial Balance
                     </a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Ledger Statement</span></a>
                  </li>
               </ul>
            </div>
            <div class="form-group">
               <h5 class="menuhead"> Blank/Others Forms</h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="javascript:void(0)" target="_blank"><span>Blank Membership form</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)" target="_blank"><span>Deposit Slip</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)" target="_blank"><span>Withdrawl Slip</span></a>
                  </li>
               </ul>
            </div>
            <div class="form-group">
               <h5 class="menuhead">Statutory Forms&nbsp;<a class="btn btn-success btn-xs" href="/CompanyFinancialInfo/Manage">Financial Info</a></h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="javascript:void(0)"><span>Deposit Application Form</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Loan Application Form</span></a>
                  </li>
               </ul>
            </div>
            <div class="form-group">
               <h5 class="menuhead">NDH-4 Suite</h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="javascript:void(0)"><span>Download Member Docs</span></a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group">
               <h5 class="menuhead">Compliance Report</h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="javascript:void(0)"><span>NDH-1</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>NDH-3</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>TDS Report</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>GST Report</span></a>
                  </li>
                  <li>
                     <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showmonthrange('CivilEQReport','Report','');">
                     <span>
                     CIBIL Report (EQUIFAX)
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="#" data-toggle="modal" data-target="#modal-daterange" onclick="showmonthrange('CivilHighMarkReport','Report','');">
                     <span>
                     CIBIL Report (CRIF-HIGHMARK)
                     </span>
                     </a>
                  </li>
               </ul>
            </div>
            <div class="form-group">
               <h5 class="menuhead">Loan/Deposit Account Analysis Report</h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="javascript:void(0)"><span>Short Term/Long Term Assets</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Short Term/Long Term Liabilities</span></a>
                  </li>
               </ul>
            </div>
            <div class="form-group">
               <h5 class="menuhead">Other Reports</h5>
               <ul class="jumbomenu">
                  <li>
                     <a href="javascript:void(0)"><span>Auto Debit Log Report</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>User Log Report</span></a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"><span>Users</span></a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>