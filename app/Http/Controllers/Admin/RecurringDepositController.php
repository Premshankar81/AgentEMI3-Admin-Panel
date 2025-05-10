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
use Excel;
use App\Exports\CityExport;
use Auth;
use Helper;

class RecurringDepositController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'RD Account Applications';
        return view('admin.templates.recurringDeposit.recurringDeposit',compact('data'));
    }

    public function create()
    {
        $data['page_title'] = 'RD Account Applications';
        $Members = Helper::GetMembers();
        $rd_schemes = Helper::get_rd_scheme_list();
        $Ledgers = Helper::get_ledgers();
        $banks = Helper::getBank();
        $agents = Helper::getAgents();
        return view('admin.templates.recurringDeposit.recurringDeposit',compact('data','agents','Members','rd_schemes','Ledgers','banks'));

    }

   function store(Request $oRequest)
    {
       
        $oRequest->offsetSet('created_by',Auth::guard('admin')->user()->id);
        $oRequest->offsetSet('uuid',Helper::generate_uuid());
        $NewCode =  Helper::get_recurringDeposits_number();
        $oRequest->offsetSet('application_mo',$NewCode['application_mo']);
        $oRequest->offsetSet('application_unique',$NewCode['application_unique']);
        
        $addResult = RecurringDeposit::create($oRequest->all());
        if($addResult){

                $TranDetails['type']                      = 'deposit';  //deport,widthow,recurring
                $TranDetails['transation_type']           = 'credit';  //credit,debit
                $TranDetails['user_type']                 = Auth::guard('admin')->user()->user_type; 
                $TranDetails['user_id']                   = Auth::guard('admin')->user()->id;
                $TranDetails['customer_id']               = @$oRequest->customer_id;
                $TranDetails['account_id']                = @$addResult->id;
                $TranDetails['amount']                    = @$oRequest->transaction_amount;
                $TranDetails['transation_date']           = @$oRequest->application_date;
                $TranDetails['remarks']                   = 'Recurring Deposit';
                $TranDetails['payment_mode']              = @$oRequest->payment_mode;
                $TranDetails['bank_id']                   = @$oRequest->bank_id;
                $TranDetails['cheque_no']                 = @$oRequest->cheque_no;
                $TranDetails['reference_no']              = @$oRequest->reference_no;
                $TranDetails['cheque_date']               = @$oRequest->cheque_date;
                $TranDetails['bank_account_ledger_id']    = @$oRequest->bank_account_ledger_id;
                $TranDetails['status']                    = 'pending';
                $TranDetails['tran_page_type']            = 'recurring';
                
                Helper::TransationDetails($TranDetails);

              return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
        }else{ 
              return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }
    
    function list()
    {
        $rows = Helper::Get_RecurringDeposit();
        
        
        $html = view('admin.templates.recurringDeposit.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

    public function edit_row(Request $oRequest){
      $data['page_title'] = 'RD Account Applications';
      $row                = RecurringDeposit::where('uuid',$oRequest->id)->first();
      $Members            = Helper::GetMembers();
      $rd_schemes         = Helper::get_rd_scheme_list();
      $Ledgers            = Helper::get_ledgers();
      $banks              = Helper::getBank();
      return view('admin.templates.recurringDeposit.recurringDeposit',compact('row','data','Members','rd_schemes','Ledgers','banks'));
    }

     public function get_row(Request $oRequest){
        $row  = RecurringDeposit::with('agent_rank')->where('unique_code',$oRequest->id)->first();
        $data['page_title'] = 'RD Account Scheme';
        return view('admin.templates.recurringDeposit.recurringDeposit',compact('data','row'));
    }

    public function update_row(Request $oRequest)
    {
        $addResult = RecurringDeposit::where('uuid',$oRequest->update_id)->update([
          'application_date'      => $oRequest->application_date,
          'customer_id'           => $oRequest->customer_id,
          'joint_customer_id'     => $oRequest->joint_customer_id,
          'minor_id'              => $oRequest->minor_id,
          'agent_id'              => $oRequest->agent_id,
          'scheme_id'             => $oRequest->scheme_id,
          'transaction_amount'    => $oRequest->transaction_amount,
          'rd_amount'             => $oRequest->rd_amount,
          'rd_frequency'          => $oRequest->rd_frequency,
          'rd_tenure'             => $oRequest->rd_tenure,
        ]);

        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    public function delete_row(Request $oRequest)
    {
        $Result = RecurringDeposit::where('id',$oRequest->update_id)->update([
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
        return view('admin.templates.recurringScheme.recurringScheme',compact('data','row','PenaltyCharts'));
    }


    public function recurringDepositApprove_Index()
    {
        $data['page_title'] = 'RD Account List (Pending for approval)';
        return view('admin.templates.recurringDepositApprove.recurringDepositApprove',compact('data'));
    }

    function recurringDepositApprove_list()
    {
        $rows = Helper::Get_RecurringDepositPending();
        $html = view('admin.templates.recurringDepositApprove.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

     public function ApproveManage(Request $oRequest){
        $data['page_title'] = 'RD Account';
        $row                = RecurringDeposit::where('uuid',$oRequest->id)->first();
        return view('admin.templates.recurringDeposit.recurringDeposit',compact('data','row'));
    }

     public function Manage(Request $oRequest){
        $data['page_title'] = 'RD Account';
        $row                = RecurringDeposit::with('customer')->where('uuid',$oRequest->id)->first();
        
        $pendingTransation = Helper::get_Pending_RD_Transation();

        $PendingEmiTotal = Helper::Get_Paid_RecurringDepositTotal($oRequest->id);
        $PaidEmiTotal = Helper::Get_Pending_RecurringDepositTotal($oRequest->id);

        return view('admin.templates.recurringDeposit.recurringDeposit',compact('PaidEmiTotal','PendingEmiTotal','pendingTransation','data','row'));
    }
    

    public function recurringDepositApproved_Index()
    {
        $data['page_title'] = 'RD Account ';
        return view('admin.templates.recurringDepositApproved.recurringDepositApproved',compact('data'));
    }

    function recurringDepositApproved_list()
    {
        $rows = Helper::Get_RecurringDepositApproved();
        $html = view('admin.templates.recurringDepositApproved.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

    public function updateStatus(Request $oRequest)
    {
        
        $accountNo = Helper::CreateSevingAccountNo();
        $SavingAccount = RecurringDeposit::where('account_no',$accountNo)->first();
        if($SavingAccount){
            $accountNo = Helper::CreateSevingAccountNo();
        }

        $RDInfo = RecurringDeposit::where('uuid',$oRequest->update_id)->first();
        
        $oRequest->offsetSet('rd_frequency',$RDInfo->rd_frequency);
        $oRequest->offsetSet('rd_tenure',$RDInfo->rd_tenure);
        $oRequest->offsetSet('opening_date',$RDInfo->application_date);
        $oRequest->offsetSet('interest_rate',$RDInfo->RDscheme->interest_rate);

        $RDAccountEMI = Helper::GetRD_Calculation($RDInfo);
       
        $addResult = RecurringDeposit::where('uuid',$oRequest->update_id)->update([
          'status'                      => $oRequest->status,
          'rd_principal'                => $RDAccountEMI['Final_Principal'],
          'maturity_interest_amount'    => $RDAccountEMI['Final_InterestEarned'],
          'maturity_amount'             => $RDAccountEMI['Final_MaturityAmount'],
          'maturity_date'               => Helper::getFromDateForDatabase($RDAccountEMI['Final_MaturityDate']),
          'status'                      => $oRequest->status,
          'account_no'                  => $accountNo
        ]);
        if($addResult){

            if(count($RDAccountEMI['EMIList']) > 0){
                foreach ($RDAccountEMI['EMIList'] as $key => $emi) {
                    RecurringDepositEmi::create([
                        'recurring_deposit_id'  => $oRequest->update_id,
                        'due_date'              => Helper::getFromDateForDatabase($emi['dueDate']),
                        'to_date'               => Helper::getFromDateForDatabase($emi['CloseDate']),
                        'amount'                => $RDAccountEMI['EMI_amount'],
                        'interest'              => $emi['interest'],
                        'created_by'            => Auth::guard('admin')->user()->id,
                        'maturity_amount'       => $emi['maturity_amount'],
                    ]);
                }                    
            }
            return response()->json(array('status' => 1,'msg'=>'RD Application successfully Approved'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    
    public function view_emilist(Request $oRequest){
        $data['page_title'] = 'EMI Chart';
           $row                = RecurringDeposit::where('uuid',$oRequest->id)->first();
        $rows         = RecurringDepositEmi::where('recurring_deposit_id',$oRequest->id)->get();
        return view('admin.templates.recurringDeposit.recurringDeposit',compact('data','row','rows'));
    }


    /* Start : RD Account Deposit */
     public function DepositView(Request $oRequest){
            $data['page_title'] = 'Deposit';
            $banks = Helper::getBank();
            $Ledgers = Helper::get_ledgers();
            $row  = RecurringDeposit::where('uuid',$oRequest->id)->first();
            $due_amount = Helper::get_PaymentCollectionDeposite_single($oRequest->id);
            return view('admin.templates.recurringDeposit.recurringDeposit',compact('data','row','banks','Ledgers','due_amount'));
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
             $TranDetails['tran_page_type']            = 'recurring';
            $TranDetails['remarks']                   = 'Recurring Deposit';
            $addResult = Helper::TransationDetails($TranDetails);
            if($addResult){
                return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
            }else{ 
                    return response()->json(array('status' => 0,'msg'=>'Error'));
            }
        }


    /* End : RD Account Deposit */
    
    /*Start :: NomineeView Func */
    
    public function NomineeView(Request $oRequest){
       
        $data['page_title'] = 'Nominee Detail';
        $row  = RecurringDeposit::with('customer','RDscheme')->where('uuid',$oRequest->id)->first();
        $schemes = Helper::get_scheme_list();
        return view('admin.templates.recurringDeposit.recurringDeposit',compact('data','row','schemes'));
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
            $addResult = RecurringDeposit::where('id',$oRequest->update_id)->update([
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
        $row  = RecurringDeposit::with('customer','RDscheme','agent')->where('uuid',$oRequest->id)->first();
        $agents = Helper::getAgents($row->id);
        return view('admin.templates.recurringDeposit.recurringDeposit',compact('data','row','agents'));
    }
    
    public function GetUpdateAgentStore(Request $oRequest)
    {
        $info  = RecurringDeposit::with('agent')->where('uuid',$oRequest->update_id)->first();
        $addResult = RecurringDeposit::where('uuid',$oRequest->update_id)->update([
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
                    $addResult = RecurringDeposit::where('uuid',$oRequest->update_id)->update([
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
        $row  = RecurringDeposit::with('customer','RDscheme','collector_agent')->where('uuid',$oRequest->id)->first();
        $agents = Helper::getAgents($row->id);
        return view('admin.templates.recurringDeposit.recurringDeposit',compact('data','row','agents'));
    }
     public function GetUpdateAgentCollectorStore(Request $oRequest)
    {
        $info  = RecurringDeposit::with('collector_agent')->where('uuid',$oRequest->update_id)->first();
        $addResult = RecurringDeposit::where('uuid',$oRequest->update_id)->update([
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

                $addResult = RecurringDeposit::where('uuid',$oRequest->update_id)->update([
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
     public function RDBondView(Request $oRequest){
       
        $data['page_title'] = 'RDBond Letter';
        $banks = Helper::getBank();
        $Ledgers = Helper::get_ledgers();
        $row  = RecurringDeposit::with('customer','RDscheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.recurringDeposit.recurringDeposit',compact('data','row','banks','Ledgers'));
     }
    /*End :: WelcomeletterView Func */
    
     /*Start :: NeftImps Func */
    public function Get_transactions(Request $oRequest){
        $data['page_title'] = 'TRANSACTIONS';
        $row  = RecurringDeposit::with('customer','RDscheme')->where('uuid',$oRequest->id)->first();
        $transations = Helper::get_RD_TransationByAccount($row->id);
        return view('admin.templates.recurringDeposit.recurringDeposit',compact('data','row','transations'));
    }
     public function GetReceipt(Request $oRequest){
        $data['page_title'] = 'TRANSACTIONS Receipt';
        $row  = TransationHistory::with('customer','rd_account','ledger')
                                        ->where('id',$oRequest->id)
                                        ->orderBy('id', 'ASC')
                                        ->first();
        return view('admin.templates.recurringDeposit.recurringDeposit',compact('data','row'));
    }
    
    /*Start :: NeftImps Func */
    
     /*Start :: Statement Func */
    public function GetStatement(Request $oRequest){
        $data['page_title'] = 'Account Statement';
        $row  = RecurringDeposit::with('customer','agent','join_customer','RDscheme')->where('uuid',$oRequest->id)->first();
        $statements  = TransationHistory::with('customer','rd_account','ledger')
                                        ->where('tran_page_type','recurring')
                                        ->where('account_id',$row->id)
                                        ->whereBetween('transation_date', [$oRequest->from_date, $oRequest->to_date])
                                        ->orderBy('id', 'ASC')
                                        ->get();
                                        
        $PaidEMI = RecurringDepositEmi::where('recurring_deposit_id',$oRequest->id)->where('status','paid')->sum('amount');                                
        return view('admin.templates.recurringDeposit.recurringDeposit',compact('PaidEMI','data','row','statements'));
    }
    /*Start :: Statement Func */
    
    
    /*Start :: WelcomeletterView Func */
     
     public function DebitCreteCharges(Request $oRequest){
        $data['page_title'] = 'Debit/Credit Account';
        $row  = RecurringDeposit::with('customer','RDscheme')->where('uuid',$oRequest->id)->first();
        $Ledgers = Helper::get_ledgers();
        return view('admin.templates.recurringDeposit.recurringDeposit',compact('data','row','Ledgers'));
    }

    public function DebitCreteChargesStore(Request $oRequest){

        $row  = RecurringDeposit::with('customer','RDscheme')->where('uuid',$oRequest->update_id)->first();
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
        $TranDetails['status']                    = 'pending';
        $TranDetails['tran_page_type']            = 'recurring';
        
        
        $addResult = Helper::TransationDetails($TranDetails);
        if($addResult){

            $SavingAvailable  = RecurringDeposit::where('id',$oRequest->account_id)->first();
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
        $row                = RecurringDeposit::with('customer','RDscheme')->where('uuid',$oRequest->id)->first();
        $Ledgers            = Helper::get_ledgers();
        $SavingAccounts     = Helper::get_ApprovedSavingAccouunt();
        return view('admin.templates.recurringDeposit.recurringDeposit',compact('SavingAccounts','data','row','Ledgers'));
    }

      public function linkSavingAccountStore(Request $oRequest)
    {
        $addResult = RecurringDeposit::where('uuid',$oRequest->update_id)->update([
          'link_saving_account_id' => $oRequest->link_saving_account_id,
        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }
    /* End : Seving Account Link */


     /*Start :: Withdraw Func */
     
     public function PartReleaseView(Request $oRequest){
        $data['page_title'] = 'Part Release Amount';
        $banks      = Helper::getBank();
        $Ledgers    = Helper::get_ledgers();
        $row        = RecurringDeposit::with('customer','RDscheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.recurringDeposit.recurringDeposit',compact('data','row','banks','Ledgers'));
    }

    function PartReleaseStore(Request $oRequest)
    {
        $checkBalance = RecurringDeposit::where('delete_status','0')
                                    ->where('uuid',$oRequest->update_id)
                                    ->where('available_balance','<',$oRequest->amount)    
                                    ->first();
        if ($checkBalance){
            return response()->json(array('status' => 2,'msg'=> 'Account Balance note available'));
        }else{
            
            $TranDetails['type']                      = 'withdrawal';  //deport,widthow,
            $TranDetails['transation_type']           = 'debit';  //credit,debit
            $TranDetails['user_type']                 = Auth::guard('admin')->user()->user_type; 
            $TranDetails['user_id']                   = Auth::guard('admin')->user()->id;
            $TranDetails['customer_id']               = @$oRequest->customer_id;
            $TranDetails['account_id']                = @$oRequest->account_id;
            $TranDetails['amount']                    = @$oRequest->amount;
            $TranDetails['transation_date']           = @$oRequest->transation_date;
            $TranDetails['remarks']                   = @$oRequest->remarks;
            $TranDetails['payment_mode']              = @$oRequest->payment_mode;
            $TranDetails['bank_id']                   = @$oRequest->bank_id;
            $TranDetails['cheque_no']                 = @$oRequest->cheque_no;
            $TranDetails['reference_no']              = @$oRequest->reference_no;
            $TranDetails['cheque_date']               = @$oRequest->cheque_date;
            $TranDetails['bank_account_ledger_id']    = @$oRequest->bank_account_ledger_id;
            $TranDetails['status']                    = 'pending';
            $TranDetails['tran_page_type']            = 'recurring';
            $addResult = Helper::TransationDetails($TranDetails);
            if($addResult){
                return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
            }else{ 
                    return response()->json(array('status' => 0,'msg'=>'Error'));
            }

        }
    }
     /*End :: Withdraw Func */


     /* Start : RD Account Deposit */
      public function preCloseAccountView(Request $oRequest){
            $data['page_title'] = 'PRE-CLOSE ACCOUNT';
            $banks              = Helper::getBank();
            $Ledgers            = Helper::get_ledgers();
            $row                = RecurringDeposit::where('uuid',$oRequest->id)->first();
            $total_rd_interest  = Helper::get_preclose_recuring_deposit($oRequest->id);
            return view('admin.templates.recurringDeposit.recurringDeposit',compact('data','row','banks','Ledgers','total_rd_interest'));
        }

        function preCloseAccountStore(Request $oRequest)
        {
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
            
            $TranDetails['tran_page_type']            = 'recurring';
            
            $addResult = Helper::TransationDetails($TranDetails);
            if($addResult){
                return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
            }else{ 
                    return response()->json(array('status' => 0,'msg'=>'Error'));
            }
        }


    /* End : RD Account Deposit */
    
 


}
