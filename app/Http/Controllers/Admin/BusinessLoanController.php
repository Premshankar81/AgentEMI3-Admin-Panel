<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RecurringDeposit;
use App\Models\SchemePenaltyChart;
use App\Models\RecurringDepositEmi;
use App\Models\Admin;
use App\Models\TransationHistory;
use App\Models\Ledger;
use App\Models\BusinessLoan;
use Excel;
use Auth;
use Helper;
use App\Models\FixedDeposit;
use App\Models\FixedDepositPayout;
use App\Models\LoanEmi;

class BusinessLoanController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Business Loan Application';
        return view('admin.templates.businessLoan.businessLoan',compact('data'));
    }

    public function create()
    {
        $data['page_title'] = 'Business Loan Application';
        $Members = Helper::GetMembers();
        $loan_schemes = Helper::get_loan_scheme_list();
        $Ledgers = Helper::get_ledgers();
        $banks = Helper::getBank();
        $agents = Helper::getAgents();
        return view('admin.templates.businessLoan.businessLoan',compact('data','agents','Members','loan_schemes','Ledgers','banks'));

    }

    function store(Request $oRequest)
    {
        $oRequest->offsetSet('created_by',Auth::guard('admin')->user()->id);
        $oRequest->offsetSet('uuid',Helper::generate_uuid());
        $NewCode =  Helper::get_businessLoan_number();
        $oRequest->offsetSet('application_mo',$NewCode['application_mo']);
        $oRequest->offsetSet('application_unique',$NewCode['application_unique']);
        
        $addResult = BusinessLoan::create($oRequest->all());
        if($addResult){
              return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
        }else{ 
              return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }
    
    function list()
    {
        $rows = Helper::Get_BusinessLoan();
        $html = view('admin.templates.businessLoan.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

    public function edit_row(Request $oRequest){
      $data['page_title'] = 'Business Loan Application';
      $row                = BusinessLoan::where('uuid',$oRequest->id)->first();
      $Members            = Helper::GetMembers();
      $loan_schemes         = Helper::get_loan_scheme_list();
      $Ledgers            = Helper::get_ledgers();
      $banks              = Helper::getBank();
      $agents = Helper::getAgents();

      return view('admin.templates.businessLoan.businessLoan',compact('row','data','Members','loan_schemes','Ledgers','banks','agents'));
    }

     public function get_row(Request $oRequest){
        $row  = FixedDeposit::with('agent_rank')->where('unique_code',$oRequest->id)->first();
        $data['page_title'] = 'FD Applications';
        return view('admin.templates.fixedDeposit.fixedDeposit',compact('data','row'));
    }

    public function update_row(Request $oRequest)
    {
        $addResult = BusinessLoan::where('uuid',$oRequest->update_id)->update([
            'application_date'        => $oRequest->application_date,
            'customer_id'             => $oRequest->customer_id,
            'co_applicant_member_id'  => $oRequest->co_applicant_member_id,
            'agent_id'                => $oRequest->agent_id,
            'scheme_id'               => $oRequest->scheme_id,
            'emi_payout'              => $oRequest->emi_payout,
            'tenure'                  => $oRequest->tenure,
            'security_type'           => $oRequest->security_type,
            'reference_no'            => $oRequest->reference_no,
            'loan_amount_requested'   => $oRequest->loan_amount_requested,
            'collection_charge'       => $oRequest->collection_charge,
            'collection_charge_value' => $oRequest->collection_charge_value,
            'nature_of_business'      => $oRequest->nature_of_business,
            'purpose_of_loan'         => $oRequest->purpose_of_loan,
            'guaranter_first'         => $oRequest->guaranter_first,
            'guaranter_second'        => $oRequest->guaranter_second,
            'name_of_witness_first'   => $oRequest->name_of_witness_first,
            'name_of_witness_first_address' => $oRequest->name_of_witness_first_address,
            'name_of_witness_second'         => $oRequest->name_of_witness_second,
            'name_of_witness_second_address' => $oRequest->name_of_witness_second_address,

        ]);

        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    public function delete_row(Request $oRequest)
    {
        $Result = BusinessLoan::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }
     
       public function transation_delete_row(Request $oRequest)
    {
        $Result = TransationHistory::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }


    
     public function view_row(Request $oRequest){
        $row  = RecurringScheme::where('unique_code',$oRequest->id)->first();
        $PenaltyCharts  = SchemePenaltyChart::where('recurring_scheme_id',$row->id)->get();

        $data['page_title'] = 'RD Account Scheme';
        return view('admin.templates.fixedDepositApprove.recurringScheme',compact('data','row','PenaltyCharts'));
    }


    public function businessLoanApprove_Index()
    {
        $data['page_title'] = 'Business Loan Account List (Pending for approval)';
        return view('admin.templates.businessLoanApprove.businessLoanApprove',compact('data'));
    }

    function businessLoanApprove_list()
    {
        $rows = Helper::Get_BusinessLoanPending();
        $html = view('admin.templates.businessLoanApprove.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

    public function businessLoanApproved_Index()
    {
       
        $data['page_title'] = 'Business Loan Application for Disbursement';
        return view('admin.templates.businessLoanApproved.businessLoanApproved',compact('data'));
    }

    function BusinessLoandisburse_list()
    {
        $rows = Helper::Get_BusinessLoandisburse();
        $html = view('admin.templates.businessLoanApproved.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

    

      public function ApproveManage(Request $oRequest){
        $data['page_title'] = 'Business Loan Application Approval';
        $row                = BusinessLoan::with('Loanscheme')->where('uuid',$oRequest->id)->first();
        $AccountAssociatedRows = Helper::Get_AccountAssociatedRows($row->customer_id);
        
        return view('admin.templates.businessLoan.businessLoan',compact('data','row','AccountAssociatedRows'));
    }


     public function Manage(Request $oRequest){  
        $data['page_title'] = 'Business Loan Account';
        $row                = BusinessLoan::where('uuid',$oRequest->id)->first();
        $pendingTransation = Helper::get_Pending_Loan_Transation();
        
        $PendingEmiTotal = Helper::Get_Paid_LoanAccountTotal($oRequest->id);
        $PaidEmiTotal = Helper::Get_Pending_LoanAccountTotal($oRequest->id);
        
        return view('admin.templates.businessLoan.businessLoan',compact('pendingTransation','data','row','PendingEmiTotal','PaidEmiTotal'));
    }

    public function view_Acknowledgement(Request $oRequest){  
        $data['page_title'] = 'Business Loan Account';
        $row                = BusinessLoan::where('uuid',$oRequest->id)->first();
        return view('admin.templates.businessLoan.businessLoan',compact('data','row'));
    }

   /*Start ::  Loan Agreement  */
    public function view_LoanAgreement(Request $oRequest){  
        $data['page_title'] = 'Loan Agreement';
        $row                = BusinessLoan::where('uuid',$oRequest->id)->first();
        return view('admin.templates.businessLoan.businessLoan',compact('data','row'));
    }

     public function Store_LoanAgreement(Request $oRequest)
    {
        $addResult = BusinessLoan::where('uuid',$oRequest->update_id)->update([
          'insurance_charge' => $oRequest->insurance_charge,
          'credit_shield' => $oRequest->credit_shield,
          'other_charge' => $oRequest->other_charge,
        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }
    
     public function view_LoanAgreementDoc(Request $oRequest){  
        $data['page_title'] = 'Loan Agreement';
        $row                = BusinessLoan::where('uuid',$oRequest->id)->first();
        $loan_emis         = LoanEmi::where('loan_id',$oRequest->id)->get();
        return view('admin.templates.businessLoan.businessLoan',compact('data','row','loan_emis'));
    }

   /* End  :: Loan Agreement */

    public function fixedDepositApproved_Index()
    {
        $data['page_title'] = 'FD Account ';
        return view('admin.templates.fixedDepositApproved.fixedDepositApproved',compact('data'));
    }

    function fixedDepositApproved_list()
    {
        $rows = Helper::Get_FixedDepositApproved();
        $html = view('admin.templates.fixedDepositApproved.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

    public function updateStatus(Request $oRequest)
    {
        $accountNo = Helper::CreateSevingAccountNo();
        
        $Info = BusinessLoan::with('Loanscheme')->where('uuid',$oRequest->update_id)->first();
        
        $oRequest->offsetSet('emi_payout',$Info->emi_payout);
        $oRequest->offsetSet('loan_tenure',$Info->tenure);
        $oRequest->offsetSet('opening_date',$oRequest->first_emi_date); 
        $oRequest->offsetSet('loan_amount',$Info->loan_amount_requested);
        $oRequest->offsetSet('interest_rate',$Info->annual_interest_rate);
        $oRequest->offsetSet('emi_type',$Info->Loanscheme->emi_type);
        $oRequest->offsetSet('emi_credit_period',$Info->Loanscheme->emi_credit_period);
        $LoanEMI = Helper::LoanCalculationEMI($oRequest);
        
      
       
        $addResult = BusinessLoan::where('uuid',$oRequest->update_id)->update([
          'status'             => $oRequest->status,
          'loan_amount'        => $oRequest->approved_amount,
          'approval_remarks'   => $oRequest->approval_remarks,
          'first_emi_date'     => $oRequest->first_emi_date,
          'account_no'         => $accountNo
        ]);
        if($addResult){
            $Account = BusinessLoan::where('account_no',$accountNo)->first();
            
            if($Account->status != 'disburse')
            {
                if(count($LoanEMI['Loan_EMI']) > 0){
                    foreach ($LoanEMI['Loan_EMI'] as $key => $emi) {
                       
                        LoanEmi::create([
                            'loan_id'               => $oRequest->update_id,
                            'emi_date'              => Helper::getFromDateForDatabase($emi['emi_date']),
                            'due_date'              => Helper::getFromDateForDatabase($emi['due_date']),
                            'emi'                   => round($emi['emi']),
                            'principal'             => $emi['principal'],
                            'interest'              => $emi['interest'],
                            'outstanding'           => $emi['outstanding'],
                            'created_by'            => Auth::guard('admin')->user()->id,
                        ]);
                        
                        
                    }                    
                }
            }

            return response()->json(array('status' => 1,'msg'=>'Loan Application successfully Approved'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    
    public function view_emilist(Request $oRequest){
        $data['page_title'] = 'EMI CHART';
        $row             = BusinessLoan::where('uuid',$oRequest->id)->first();
        $rows            = LoanEmi::where('loan_id',$oRequest->id)->get();
        return view('admin.templates.businessLoan.businessLoan',compact('data','row','rows'));
    }


    /* Start : RD Account Deposit */
     public function DepositView(Request $oRequest){   
            $data['page_title'] = 'Deposit';
            $banks = Helper::getBank();
            $Ledgers = Helper::get_ledgers();
            $row  = BusinessLoan::where('uuid',$oRequest->id)->first();
            $advanceAmount  = LoanEmi::where('loan_id',$oRequest->id)->sum('advance_amount');
            //$emi_Amount     = LoanEmi::where('loan_id',$oRequest->id)->first('emi');
            $EMI_rows      = LoanEmi::where('loan_id',$oRequest->id)->get();
            $emi_Amount = Helper::get_PaymentCollectionLoan_by_loan($oRequest->id);
            $penaltyCharges         = Helper::PenaltyCalculation($oRequest->id);
            $EMIAmount = 0;
            if($emi_Amount != ''){
                $EMIAmount = $emi_Amount;
            }
        
            return view('admin.templates.businessLoan.businessLoan',compact('EMI_rows','EMIAmount','advanceAmount','data','row','banks','Ledgers','penaltyCharges'));
        }

        function DepositStore(Request $oRequest)
        {
            $TranDetails['type']                      = 'deposit';  //deport,widthow,recurring
            $TranDetails['transation_type']           = 'credit';  //credit,debit
            $TranDetails['user_type']                 = Auth::guard('admin')->user()->user_type; 
            $TranDetails['user_id']                   = Auth::guard('admin')->user()->id;
            $TranDetails['customer_id']               = @$oRequest->customer_id;
            $TranDetails['account_id']                = @$oRequest->account_id;
            $TranDetails['amount']                    = @$oRequest->amount_deposit;
            $TranDetails['transation_date']           = @$oRequest->deposit_date;
            $TranDetails['remarks']                   = @$oRequest->remarks;
            $TranDetails['payment_mode']              = @$oRequest->payment_mode;
            $TranDetails['bank_id']                   = @$oRequest->bank_id;
            $TranDetails['cheque_no']                 = @$oRequest->cheque_no;
            $TranDetails['reference_no']              = @$oRequest->reference_no;
            $TranDetails['cheque_date']               = @$oRequest->cheque_date;
            $TranDetails['bank_account_ledger_id']    = @$oRequest->bank_account_ledger_id;
            $TranDetails['status']                    = 'pending';
             $TranDetails['tran_page_type']           = 'loan';
            $TranDetails['remarks']                   = 'Loan Deposit';
            $addResult = Helper::TransationDetails($TranDetails);
                
             if($oRequest->penalty_charge != 0) {
                $TranDetails['type']                      = 'deposit';  //deport,widthow,recurring
                $TranDetails['transation_type']           = 'credit';  //credit,debit
                $TranDetails['user_type']                 = Auth::guard('admin')->user()->user_type; 
                $TranDetails['user_id']                   = Auth::guard('admin')->user()->id;
                $TranDetails['customer_id']               = @$oRequest->customer_id;
                $TranDetails['account_id']                = @$oRequest->account_id;
                $TranDetails['amount']                    = @$oRequest->penalty_charge;
                $TranDetails['transation_date']           = @$oRequest->deposit_date;
                $TranDetails['payment_mode']              = @$oRequest->payment_mode;
                $TranDetails['bank_id']                   = @$oRequest->bank_id;
                $TranDetails['cheque_no']                 = @$oRequest->cheque_no;
                $TranDetails['reference_no']              = @$oRequest->reference_no;
                $TranDetails['cheque_date']               = @$oRequest->cheque_date;
                $TranDetails['bank_account_ledger_id']    = @$oRequest->bank_account_ledger_id;
                $TranDetails['status']                    = 'completed';
                $TranDetails['tran_page_type']            = 'loan';
                $TranDetails['remarks']                   = 'Penalty Charge';
                $addResult = Helper::TransationDetails($TranDetails);    
            }
            
            if($addResult){
                return response()->json(array('status' => 1,'back_url'=>$oRequest->back_url,'msg'=>'Record successfully Inserted'));
            }else{ 
                return response()->json(array('status' => 0,'back_url'=>'','msg'=>'Error'));
            }
        }


    /* End : RD Account Deposit */
    
    /*Start :: NomineeView Func */
    
    public function NomineeView(Request $oRequest){
       
        $data['page_title'] = 'Nominee Detail';
        $row  = BusinessLoan::with('customer','Loanscheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.businessLoan.businessLoan',compact('data','row'));
    }

    public function NomineeStore(Request $oRequest)
    {
        if(count($oRequest->nominee_name) > 0){
            for ($i=0; $i < count($oRequest->nominee_name) ; $i++) { 
                $Nominee['nominee_name']        = $oRequest['nominee_name'][$i];
                $Nominee['nominee_relation']    = $oRequest['nominee_relation'][$i];
                $Nominee['nominee_dob']         = $oRequest['nominee_dob'][$i];
                $Nominee['nominee_age']         = $oRequest['nominee_age'][$i];
                $Nominee['nominee_mobile']      = $oRequest['nominee_mobile'][$i];
                $Nominee['nominee_address']     = $oRequest['nominee_address'][$i];
                $Nominee_array1[] = $Nominee;    
            }
            $addResult = BusinessLoan::where('id',$oRequest->update_id)->update([
              'nominee'     => json_encode($Nominee_array1),
            ]);
            if($addResult){
                return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
            } else { 
                return response()->json(array('status' => 0,'msg'=>'Error'));
            }
            
        }else{
            return response()->json(array('status' => 0,'msg'=>'No data selected'));
        }
        
     }

    /*End :: NomineeView Func */
    
    
    /*Start :: GetUpdateAgent Func */
    public function GetUpdateAgent(Request $oRequest){
        $data['page_title'] = 'Update Associate';
        $row  = BusinessLoan::with('customer','FDscheme','agent')->where('uuid',$oRequest->id)->first();
        $agents = Helper::getAgents($row->id);
        return view('admin.templates.businessLoan.businessLoan',compact('data','row','agents'));
    }
    
    public function GetUpdateAgentStore(Request $oRequest)
    {
        $info  = BusinessLoan::with('agent')->where('uuid',$oRequest->update_id)->first();
        $addResult = BusinessLoan::where('uuid',$oRequest->update_id)->update([
          'agent_id'      => $oRequest->agent_id,
        ]);
        if($addResult){

            if($info->agent_id != ''){
                if($info->agent_id != $oRequest->agent_id){
                    $NewAgentinfo  = Admin::where('id',$oRequest->agent_id)->first();
                    $AgentUpdateLog['old_agent_id']          = $info->agent_id;
                    $AgentUpdateLog['agent_name']            = $info->agent->name;
                    $AgentUpdateLog['new_modified_agent_id'] = $oRequest->agent_id;
                    $AgentUpdateLog['modified_agent_name']   = $NewAgentinfo->name;
                    $AgentUpdateLog['modified_by']           = Auth::guard('admin')->user()->name;
                    $AgentUpdateLog['modified_date']         = date('Y-m-d');
                    $AgentUpdateLog['note']                  = $oRequest->update_note;
                    $AgentUpdateLog_obj[] = $AgentUpdateLog;    
                    if($info->agent_change_log != ''){
                        $arr1 = json_decode($info->agent_change_log);
                        $arr2 = $AgentUpdateLog_obj;
                        $AgentUpdateLog_arr = array_merge($arr1,$arr2);
                        $AgentUpdateLog = json_encode($AgentUpdateLog_arr);
                    }else{
                       $AgentUpdateLog = json_encode($AgentUpdateLog_obj);
                    }
                    $addResult = BusinessLoan::where('uuid',$oRequest->update_id)->update([
                      'agent_change_log'      => $AgentUpdateLog,
                    ]);
                }
            }

            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }
    /*End :: GetUpdateAgent Func */
    
    /*Start :: GetUpdateAgent Func */
    public function GetUpdateCollectorAgent(Request $oRequest){
        $data['page_title'] = 'Update Collector';
        $row  = BusinessLoan::with('customer','FDscheme','collector_agent')->where('uuid',$oRequest->id)->first();
        $agents = Helper::getAgents($row->id);
        return view('admin.templates.businessLoan.businessLoan',compact('data','row','agents'));
    }
     public function GetUpdateAgentCollectorStore(Request $oRequest)
    {
        $info  = BusinessLoan::with('collector_agent')->where('uuid',$oRequest->update_id)->first();
        $addResult = BusinessLoan::where('uuid',$oRequest->update_id)->update([
          'collector_agent_id'      => $oRequest->collector_agent_id,
        ]);
        if($addResult){

            if($info->collector_agent_id != ''){

            if($info->collector_agent_id != $oRequest->collector_agent_id){
                
                $NewCollectorAgentinfo  = Admin::where('id',$oRequest->collector_agent_id)->first();
                $AgentUpdateLog['old_agent_id']          = $info->collector_agent_id;
                $AgentUpdateLog['agent_name']            = $info->collector_agent->name;
                $AgentUpdateLog['new_modified_agent_id'] = $oRequest->collector_agent_id;
                $AgentUpdateLog['modified_agent_name']   = $NewCollectorAgentinfo->name;
                $AgentUpdateLog['modified_by']           = Auth::guard('admin')->user()->name;
                $AgentUpdateLog['modified_date']         = date('Y-m-d');
                $AgentUpdateLog['note']                  = $oRequest->update_collector_note;
                $AgentUpdateLog_obj[]                    = $AgentUpdateLog;    
                if($info->collector_agent_change_log != ''){
                    $arr1 = json_decode($info->collector_agent_change_log);
                    $arr2 = $AgentUpdateLog_obj;
                    $AgentUpdateLog_arr = array_merge($arr1,$arr2);
                    $AgentUpdateLog = json_encode($AgentUpdateLog_arr);
                }else{
                   $AgentUpdateLog = json_encode($AgentUpdateLog_obj);
                }

                $addResult = BusinessLoan::where('uuid',$oRequest->update_id)->update([
                  'collector_agent_change_log'      => $AgentUpdateLog,
                ]);

                    
                }
            }
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }
    /*End :: GetUpdateAgent Func */
    
    /*Start :: WelcomeletterView Func */
     public function WelcomeletterView(Request $oRequest){
       
        $data['page_title'] = 'Welcome Letter';
        $banks = Helper::getBank();
        $Ledgers = Helper::get_ledgers();
        $row  = RecurringDeposit::with('customer','RDscheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.recurringDeposit.recurringDeposit',compact('data','row','banks','Ledgers'));
     }
    /*End :: WelcomeletterView Func */
    
    /*Start :: WelcomeletterView Func */
     public function FDBondView(Request $oRequest){
       
        $data['page_title'] = 'FDBond Letter';
        $banks = Helper::getBank();
        $Ledgers = Helper::get_ledgers();
        $row  = FixedDeposit::with('customer','FDscheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.fixedDeposit.fixedDeposit',compact('data','row','banks','Ledgers'));
     }
    /*End :: WelcomeletterView Func */
    
     /*Start :: NeftImps Func */
    public function Get_transactions(Request $oRequest){
        $data['page_title'] = 'TRANSACTIONS';
        $row  = BusinessLoan::with('customer','Loanscheme')->where('uuid',$oRequest->id)->first();
        $transations = Helper::get_Loan_TransationByAccount($row->id);
      
        return view('admin.templates.businessLoan.businessLoan',compact('data','row','transations'));
    }
     public function GetReceipt(Request $oRequest){
        $data['page_title'] = 'TRANSACTIONS Receipt';
        $row  = TransationHistory::with('customer','loan_account','ledger')
                                        ->where('id',$oRequest->id)
                                        ->orderBy('id', 'ASC')
                                        ->first();
        return view('admin.templates.businessLoan.businessLoan',compact('data','row'));
    }
    
    /*Start :: NeftImps Func */
    
     /*Start :: Statement Func */
    public function GetStatement(Request $oRequest){

        $data['page_title'] = 'Account Statement';
        $row  = BusinessLoan::with('customer','agent','join_customer','Loanscheme')->where('uuid',$oRequest->id)->first();
        $statements  = TransationHistory::with('customer','fd_account','ledger')
                                        ->where('tran_page_type','loan')
                                        ->where('status','completed')
                                        ->where('account_id',$row->id)
                                        ->whereBetween('transation_date', [$oRequest->from_date, $oRequest->to_date])
                                        ->orderBy('id', 'ASC')
                                        ->get();
        return view('admin.templates.businessLoan.businessLoan',compact('data','row','statements'));
    }
    /*Start :: Statement Func */
    
    
    /*Start :: WelcomeletterView Func */
     
     public function DebitCreteCharges(Request $oRequest){
        $data['page_title'] = 'Debit/Credit Account';
        $row  = BusinessLoan::with('customer','Loanscheme')->where('uuid',$oRequest->id)->first();
        $Ledgers = Helper::get_ledgers();
        return view('admin.templates.businessLoan.businessLoan',compact('data','row','Ledgers'));
    }

    public function DebitCreteChargesStore(Request $oRequest){

        $row  = FixedDeposit::with('customer','FDscheme')->where('uuid',$oRequest->update_id)->first();
        $scheme  = Ledger::where('id',$oRequest->bank_ledger_id)->first();
        $scheme_name = $scheme->title;
        
        if($oRequest->transaction_type == 'credit'){
            $type = 'deposit';
        }else{
            $type = 'withdrawal';
        }
        $TranDetails['type']                      = $type;  //deport,widthow,
        $TranDetails['transation_type']           = @$oRequest->transaction_type;  //credit,debit
        $TranDetails['user_type']                 = Auth::guard('admin')->user()->user_type; 
        $TranDetails['user_id']                   = Auth::guard('admin')->user()->id;
        $TranDetails['customer_id']               = @$oRequest->customer_id;
        $TranDetails['account_id']                = @$oRequest->account_id;
        $TranDetails['amount']                    = @$oRequest->bank_amount;
        $TranDetails['transation_date']           = @$oRequest->transaction_date;
        $TranDetails['remarks']                   = @$scheme_name.' '.$oRequest->narration;
        $TranDetails['payment_mode']              = 'DCOTH';
        $TranDetails['bank_id']                   = @$oRequest->bank_id;
        $TranDetails['cheque_no']                 = @$oRequest->cheque_no;
        $TranDetails['reference_no']              = @$oRequest->reference_no;
        $TranDetails['cheque_date']               = @$oRequest->cheque_date;
        $TranDetails['bank_account_ledger_id']    = @$oRequest->bank_ledger_id;
        $TranDetails['status']                    = 'completed';
        $TranDetails['tran_page_type']            = 'loan';
        
        
        $addResult = Helper::TransationDetails($TranDetails);
        if($addResult){

            $SavingAvailable  = BusinessLoan::where('id',$oRequest->account_id)->first();
            if($oRequest->transaction_type == 'credit'){
                $AvailableBalance = $SavingAvailable->available_balance + $oRequest->bank_amount;    
            }else{
                $AvailableBalance = $SavingAvailable->available_balance - $oRequest->bank_amount;    
            }
            $SavingAvailable->available_balance = $AvailableBalance;
            $SavingAvailable->save();

            return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
        }else{ 
                return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }
    /*Start :: WelcomeletterView Func */


    /* Start : Seving Account Link */

     public function linkSavingAccount(Request $oRequest){
        $data['page_title'] = 'Link Saving Account';
        $row                = BusinessLoan::with('customer','RDscheme')->where('uuid',$oRequest->id)->first();
        $Ledgers            = Helper::get_ledgers();
        $SavingAccounts     = Helper::get_ApprovedSavingAccouunt();
        return view('admin.templates.businessLoan.businessLoan',compact('SavingAccounts','data','row','Ledgers'));
    }

      public function linkSavingAccountStore(Request $oRequest)
    {
        $addResult = BusinessLoan::where('uuid',$oRequest->update_id)->update([
          'link_saving_account_id' => $oRequest->link_saving_account_id,
        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }
    /* End : Seving Account Link */

     /* Start : RD Account Deposit */
     public function preCloseAccountView(Request $oRequest){
            $data['page_title'] = 'PRE-CLOSE ACCOUNT';
            $banks = Helper::getBank();
            $Ledgers = Helper::get_ledgers();
            $row  = FixedDeposit::where('uuid',$oRequest->id)->first();
            return view('admin.templates.fixedDeposit.fixedDeposit',compact('data','row','banks','Ledgers'));
        }

        function preCloseAccountStore(Request $oRequest)
        {

            if($oRequest->interest_occured > 0){
                $TranDetailsPenalty['type']                      = 'deposit';  //deport,widthow,recurring
                $TranDetailsPenalty['transation_type']           = 'credit';  //credit,debit
                $TranDetailsPenalty['user_type']                 = Auth::guard('admin')->user()->user_type; 
                $TranDetailsPenalty['user_id']                   = Auth::guard('admin')->user()->id;
                $TranDetailsPenalty['customer_id']               = @$oRequest->customer_id;
                $TranDetailsPenalty['account_id']                = @$oRequest->account_id;
                $TranDetailsPenalty['amount']                    = @$oRequest->interest_occured;
                $TranDetailsPenalty['transation_date']           = @$oRequest->deposit_date;
                $TranDetailsPenalty['remarks']                   = "Interest deposited";
                $TranDetailsPenalty['payment_mode']              = @$oRequest->payment_mode;
                $TranDetailsPenalty['bank_id']                   = @$oRequest->bank_id;
                $TranDetailsPenalty['cheque_no']                 = @$oRequest->cheque_no;
                $TranDetailsPenalty['reference_no']              = @$oRequest->reference_no;
                $TranDetailsPenalty['cheque_date']               = @$oRequest->cheque_date;
                $TranDetailsPenalty['bank_account_ledger_id']    = @$oRequest->bank_account_ledger_id;
                $TranDetailsPenalty['status']                    = 'completed';
                $TranDetailsPenalty['closestatus']               = 1;
                $TranDetailsPenalty['tran_page_type']            = 'fixedDeposit';
                $addResultPenalty = Helper::TransationDetails($TranDetailsPenalty); 

                $PenltyAvailable  = FixedDeposit::where('id',$oRequest->account_id)->first();
                $AvailableBalance = $PenltyAvailable->available_balance + $oRequest->interest_occured;    
                $PenltyAvailable->available_balance = $AvailableBalance;
                $PenltyAvailable->save();

            }

            if($oRequest->other_charges > 0){
                $TranDetailsCharges['type']                      = 'withdrawal';  //deport,widthow,recurring
                $TranDetailsCharges['transation_type']           = 'debit';  //credit,debit
                $TranDetailsCharges['user_type']                 = Auth::guard('admin')->user()->user_type; 
                $TranDetailsCharges['user_id']                   = Auth::guard('admin')->user()->id;
                $TranDetailsCharges['customer_id']               = @$oRequest->customer_id;
                $TranDetailsCharges['account_id']                = @$oRequest->account_id;
                $TranDetailsCharges['amount']                    = @$oRequest->other_charges;
                $TranDetailsCharges['transation_date']           = @$oRequest->deposit_date;
                $TranDetailsCharges['remarks']                   = "Interest deposited";
                $TranDetailsCharges['payment_mode']              = @$oRequest->payment_mode;
                $TranDetailsCharges['bank_id']                   = @$oRequest->bank_id;
                $TranDetailsCharges['cheque_no']                 = @$oRequest->cheque_no;
                $TranDetailsCharges['reference_no']              = @$oRequest->reference_no;
                $TranDetailsCharges['cheque_date']               = @$oRequest->cheque_date;
                $TranDetailsCharges['bank_account_ledger_id']    = @$oRequest->bank_account_ledger_id;
                $TranDetailsCharges['status']                    = 'completed';
                $TranDetailsCharges['closestatus']               = 1;
                $TranDetailsCharges['tran_page_type']            = 'fixedDeposit';
                $addResultCharges = Helper::TransationDetails($TranDetailsCharges);      

                $ChargesAvailable  = FixedDeposit::where('id',$oRequest->account_id)->first();
                $AvailableBalance = $ChargesAvailable->available_balance - $oRequest->other_charges;    
                $ChargesAvailable->available_balance = $AvailableBalance;
                $ChargesAvailable->save();
            }

            $TranDetails['type']                      = 'withdrawal';  //deport,widthow,recurring
            $TranDetails['transation_type']           = 'debit';  //credit,debit
            $TranDetails['user_type']                 = Auth::guard('admin')->user()->user_type; 
            $TranDetails['user_id']                   = Auth::guard('admin')->user()->id;
            $TranDetails['customer_id']               = @$oRequest->customer_id;
            $TranDetails['account_id']                = @$oRequest->account_id;
            $TranDetails['amount']                    = @$oRequest->total_deposit;
            $TranDetails['transation_date']           = @$oRequest->deposit_date;
            $TranDetails['remarks']                   = @$oRequest->remarks;
            $TranDetails['payment_mode']              = @$oRequest->payment_mode;
            $TranDetails['bank_id']                   = @$oRequest->bank_id;
            $TranDetails['cheque_no']                 = @$oRequest->cheque_no;
            $TranDetails['reference_no']              = @$oRequest->reference_no;
            $TranDetails['cheque_date']               = @$oRequest->cheque_date;
            $TranDetails['bank_account_ledger_id']    = @$oRequest->bank_account_ledger_id;
            $TranDetails['status']                    = 'pending';
            $TranDetails['closestatus']               = 1;
            $TranDetails['tran_page_type']            = 'fixedDeposit';
            $addResult = Helper::TransationDetails($TranDetails);

            

            if($addResult){
                return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
            }else{ 
                    return response()->json(array('status' => 0,'msg'=>'Error'));
            }
        }


    /* End : RD Account Deposit */

     /*Start :: WelcomeletterView Func */
     
     public function GetJointAccount(Request $oRequest){
        $data['page_title'] = 'FD Account';
        $row  = FixedDeposit::with('customer','FDscheme')->where('uuid',$oRequest->id)->first();
        $Members = Helper::GetMembers();
        return view('admin.templates.fixedDeposit.fixedDeposit',compact('data','row','Members'));
    }

    public function UpdateJointAccountStore(Request $oRequest)
    {
        $addResult = FixedDeposit::where('uuid',$oRequest->update_id)->update([
          'joint_customer_id'      => $oRequest->update_joint_customer_id,
        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    /*End :: WelcomeletterView Func */


    /*Start :: Block Account Func */
    public function getblockAccount(Request $oRequest){
        $data['page_title'] = 'Block Account';
        $row  = BusinessLoan::with('customer','FDscheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.businessLoan.businessLoan',compact('data','row'));
    }

    public function blockAccountStore(Request $oRequest)
    {
        $addResult = BusinessLoan::where('uuid',$oRequest->update_id)->update([
          'status'          => 'block',
          'block_reason'    => $oRequest->block_reason,
        ]);
            
        if($addResult){ 
            return response()->json(array('status' => 1,'back_url'=>$oRequest->back_url,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    /*End :: Un Block Account Func */

     /*Start :: Block Account Func */
     
     public function getUnblockAccount(Request $oRequest){
        $data['page_title'] = 'Un Block Account';
        $row  = BusinessLoan::with('customer','FDscheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.businessLoan.businessLoan',compact('data','row'));
    }

    public function UnblockAccountStore(Request $oRequest)
    {
        $addResult = BusinessLoan::where('uuid',$oRequest->update_id)->update([
          'status'          => 'disburse',
        ]);
            
         if($addResult){ 
            return response()->json(array('status' => 1,'back_url'=>$oRequest->back_url,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    /*End :: Un Block Account Func */

    public function Getdisburse(Request $oRequest){
        $data['page_title'] = 'Business Loan Disbursement';
        $row  = BusinessLoan::with('customer','Loanscheme')->where('uuid',$oRequest->id)->first();
        
        $Ledgers = Helper::get_ledgers();
        $banks = Helper::getBank();
        $EMI_rows            = LoanEmi::where('loan_id',$oRequest->id)->get();
        $SavingAccounts     = Helper::get_customer_ApprovedSavingAccouunt($row->customer_id);
        return view('admin.templates.businessLoan.businessLoan',compact('SavingAccounts','EMI_rows','data','row','banks','Ledgers'));
    }

    public function GetdisburseStore(Request $oRequest)
    {
        $addResult = BusinessLoan::where('uuid',$oRequest->update_id)->update([
          'status'              => 'disburse',
          'processing_fees'     => $oRequest->processing_fees_total,
          'stamp_duty'          => $oRequest->stamp_duty_total,
          'first_emi_date'      => $oRequest->first_emi_date,
          'disburse_date'       => $oRequest->disburse_date,
        ]);
        if($addResult){ 
                
                if($oRequest->processing_fees_total > 0){
                $TranDetailsCharges['type']                      = 'withdrawal';  //deport,widthow,recurring
                $TranDetailsCharges['transation_type']           = 'debit';  //credit,debit
                $TranDetailsCharges['user_type']                 = Auth::guard('admin')->user()->user_type; 
                $TranDetailsCharges['user_id']                   = Auth::guard('admin')->user()->id;
                $TranDetailsCharges['customer_id']               = @$oRequest->customer_id;
                $TranDetailsCharges['account_id']                = @$oRequest->account_id;
                $TranDetailsCharges['amount']                    = @$oRequest->processing_fees_total;
                $TranDetailsCharges['transation_date']           = @$oRequest->disburse_date;
                $TranDetailsCharges['remarks']                   = "Processing Fee charged";
                $TranDetailsCharges['payment_mode']              = @$oRequest->payment_mode;
                $TranDetailsCharges['bank_id']                   = @$oRequest->bank_id;
                $TranDetailsCharges['cheque_no']                 = @$oRequest->cheque_no;
                $TranDetailsCharges['reference_no']              = @$oRequest->reference_no;
                $TranDetailsCharges['cheque_date']               = @$oRequest->cheque_date;
                $TranDetailsCharges['bank_account_ledger_id']    = @$oRequest->bank_account_ledger_id;
                $TranDetailsCharges['status']                    = 'completed';
                $TranDetailsCharges['tran_page_type']            = 'loan';
                $addResultCharges = Helper::TransationDetails($TranDetailsCharges);      

                $ChargesAvailable  = BusinessLoan::where('id',$oRequest->account_id)->first();
                $AvailableBalance = $ChargesAvailable->available_balance - $oRequest->processing_fees_total;    
                $ChargesAvailable->available_balance = $AvailableBalance;
                $ChargesAvailable->save();
            }

            if($oRequest->stamp_duty_total > 0){
                $TranDetailsCharges['type']                      = 'withdrawal';  //deport,widthow,recurring
                $TranDetailsCharges['transation_type']           = 'debit';  //credit,debit
                $TranDetailsCharges['user_type']                 = Auth::guard('admin')->user()->user_type; 
                $TranDetailsCharges['user_id']                   = Auth::guard('admin')->user()->id;
                $TranDetailsCharges['customer_id']               = @$oRequest->customer_id;
                $TranDetailsCharges['account_id']                = @$oRequest->account_id;
                $TranDetailsCharges['amount']                    = @$oRequest->stamp_duty_total;
                $TranDetailsCharges['transation_date']           = @$oRequest->disburse_date;
                $TranDetailsCharges['remarks']                   = "Stamp duty charged";
                $TranDetailsCharges['payment_mode']              = @$oRequest->payment_mode;
                $TranDetailsCharges['bank_id']                   = @$oRequest->bank_id;
                $TranDetailsCharges['cheque_no']                 = @$oRequest->cheque_no;
                $TranDetailsCharges['reference_no']              = @$oRequest->reference_no;
                $TranDetailsCharges['cheque_date']               = @$oRequest->cheque_date;
                $TranDetailsCharges['bank_account_ledger_id']    = @$oRequest->bank_account_ledger_id;
                $TranDetailsCharges['status']                    = 'completed';
                $TranDetailsCharges['tran_page_type']            = 'loan';
                $addResultCharges = Helper::TransationDetails($TranDetailsCharges);      

                $ChargesAvailable  = BusinessLoan::where('id',$oRequest->account_id)->first();
                $AvailableBalance = $ChargesAvailable->available_balance - $oRequest->stamp_duty_total;    
                $ChargesAvailable->available_balance = $AvailableBalance;
                $ChargesAvailable->save();
            }
            
            return response()->json(array('status' => 1,'back_url'=>$oRequest->back_url,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    public function view_santionLetter(Request $oRequest){  
        $data['page_title'] = 'Sanction Letter';
        $row                = BusinessLoan::where('uuid',$oRequest->id)->first();
        $loan_rows          = LoanEmi::where('loan_id',$oRequest->id)->get();
        return view('admin.templates.businessLoan.businessLoan',compact('data','row','loan_rows'));
    }


    /*Start :: Withdraw Func */
     
     public function PartReleaseView(Request $oRequest){
        $data['page_title'] = 'Part Release Amount';
        $banks      = Helper::getBank();
        $Ledgers    = Helper::get_ledgers();
        $row        = BusinessLoan::with('customer','Loanscheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.businessLoan.businessLoan',compact('data','row','banks','Ledgers'));
    }

    function PartReleaseStore(Request $oRequest)
    {
        $checkBalance = BusinessLoan::where('delete_status','0')
                                    ->where('uuid',$oRequest->update_id)
                                    ->first();

        if ($oRequest->advance_amount > $checkBalance->loan_amount){
            return response()->json(array('status' => 2,'msg'=> 'Account Balance note available'));
        }else{
            
            $TranDetails['type']                      = 'deposit';  //deport,widthow,
            $TranDetails['transation_type']           = 'credit';  //credit,debit
            $TranDetails['user_type']                 = Auth::guard('admin')->user()->user_type; 
            $TranDetails['user_id']                   = Auth::guard('admin')->user()->id;
            $TranDetails['customer_id']               = @$oRequest->customer_id;
            $TranDetails['account_id']                = @$oRequest->account_id;
            $TranDetails['amount']                    = @$oRequest->advance_amount;
            $TranDetails['transation_date']           = @$oRequest->transation_date;
            $TranDetails['remarks']                   = @$oRequest->remarks;
            $TranDetails['payment_mode']              = @$oRequest->payment_mode;
            $TranDetails['bank_id']                   = @$oRequest->bank_id;
            $TranDetails['cheque_no']                 = @$oRequest->cheque_no;
            $TranDetails['reference_no']              = @$oRequest->reference_no;
            $TranDetails['cheque_date']               = @$oRequest->cheque_date;
            $TranDetails['bank_account_ledger_id']    = @$oRequest->bank_account_ledger_id;
            $TranDetails['status']                    = 'pending';
            $TranDetails['tran_page_type']            = 'loan';
            $addResult = Helper::TransationDetails($TranDetails);
            if($addResult){
                return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
            }else{ 
                    return response()->json(array('status' => 0,'msg'=>'Error'));
            }

        }
    }
     /*End :: Withdraw Func */
     
     
    /*Start :: Passbook Func */
    public function GetPassbook(Request $oRequest){
        $data['page_title'] = 'Passbook Statement';
        $row  = BusinessLoan::with('customer','Loanscheme')->where('uuid',$oRequest->id)->first();
        $statements  = TransationHistory::with('customer','loan_account','ledger')
                                        ->where('tran_page_type','loan')
                                        /*->where('status','completed')*/
                                        ->where('account_id',$row->id)
                                        ->orderBy('id', 'ASC')
                                        ->get();
        
        return view('admin.templates.businessLoan.businessLoan',compact('data','row','statements'));
    }
    
    public function GetPassbookFol1(Request $oRequest){
        $data['page_title'] = 'Passbook Printing (Page Fold-1)';
        $row  = BusinessLoan::with('customer','Loanscheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.businessLoan.businessLoan',compact('data','row'));
    }
    
    public function GetPassbookFol2(Request $oRequest){
        $data['page_title'] = 'Passbook Printing (Page Fold-2)';
        $row  = BusinessLoan::with('customer','Loanscheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.businessLoan.businessLoan',compact('data','row'));
    }
    /*End :: Passbook Func */
    
    /*Start :: ClosedAccount Func */
    public function getClosedAccount(Request $oRequest){
        $data['page_title'] = 'Close Account';
        $row  = BusinessLoan::with('customer','Loanscheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.businessLoan.businessLoan',compact('data','row'));
    }
    /*END :: ClosedAccount Func */
    
    
    /* Start :: Re-Construct */
    
    public function ReConstructDepositView(Request $oRequest){   
            $data['page_title']     = 'Re-Construct EMI';
            $row                    = BusinessLoan::where('uuid',$oRequest->id)->first();
            $PendingEMI_Amount      = LoanEmi::where('delete_status','0')->where('status','pending')->where('loan_id',$oRequest->id)->sum('emi');
            $EMI_rows               = LoanEmi::where('loan_id',$oRequest->id)->get();
            
            return view('admin.templates.businessLoan.businessLoan',compact('EMI_rows','PendingEMI_Amount','data','row'));
        }
    
    public function ReConstruct_EMIUpdate(Request $oRequest)
    {
        
        $PendingEMI  = LoanEmi::where('delete_status','0')->where('status','pending')->where('loan_id',$oRequest->update_id)->get();
        if($PendingEMI){
            LoanEmi::where('delete_status','0')->where('status','pending')->where('loan_id',$oRequest->update_id)->delete();            
        }

        $Info = BusinessLoan::with('Loanscheme')->where('uuid',$oRequest->update_id)->first();
        
        $oRequest->offsetSet('emi_payout',$Info->emi_payout);
        $oRequest->offsetSet('interest_rate',$Info->annual_interest_rate);
        $oRequest->offsetSet('emi_type',$Info->Loanscheme->emi_type);
        $oRequest->offsetSet('emi_credit_period',5);
        
        //$oRequest->offsetSet('opening_date',$Info->application_date);
        //$oRequest->offsetSet('loan_tenure',$Info->tenure);
        //$oRequest->offsetSet('loan_amount',$Info->loan_amount_requested);
        $LoanEMI = Helper::LoanCalculationEMI($oRequest);
        
      
        if(1==1){
            if(count($LoanEMI['Loan_EMI']) > 0){
                    foreach ($LoanEMI['Loan_EMI'] as $key => $emi) {
                        LoanEmi::create([
                            'loan_id'               => $oRequest->update_id,
                            'emi_date'              => Helper::getFromDateForDatabase($emi['emi_date']),
                            'due_date'              => Helper::getFromDateForDatabase($emi['due_date']),
                            'emi'                   => round($emi['emi']),
                            'principal'             => $emi['principal'],
                            'interest'              => $emi['interest'],
                            'outstanding'           => $emi['outstanding'],
                            'created_by'            => Auth::guard('admin')->user()->id,
                        ]);
                    }                    
                }

            return response()->json(array('status' => 1,'back_url'=>$oRequest->back_url,'msg'=>'Loan Application successfully Approved'));
        } else { 
            return response()->json(array('status' => 0,'back_url'=>'','msg'=>'Error'));
        }
    }
    /* End :: RE- */
   
   /* Start :: Pre SantionLetter */
    public function view_pre_santionLetter(Request $oRequest){  
        $data['page_title'] = 'Pre Sanction Letter';
        $row                = BusinessLoan::where('uuid',$oRequest->id)->first();
        $loan_rows          = LoanEmi::where('loan_id',$oRequest->id)->first();
        return view('admin.templates.businessLoan.businessLoan',compact('data','row','loan_rows'));
    }
    /* End :: Pre SantionLetter */
    
 


}
