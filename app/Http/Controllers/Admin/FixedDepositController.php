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
use Auth;
use Helper;
use App\Models\FixedDeposit;
use App\Models\FixedDepositPayout;

class FixedDepositController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'FD Applications';
        return view('admin.templates.fixedDeposit.fixedDeposit',compact('data'));
    }

    public function create()
    {
        $data['page_title'] = 'FD Applications';
        $Members = Helper::GetMembers();
        $fd_schemes = Helper::get_fd_scheme_list();
        $Ledgers = Helper::get_ledgers();
        $banks = Helper::getBank();
        $agents = Helper::getAgents();
        return view('admin.templates.fixedDeposit.fixedDeposit',compact('data','agents','Members','fd_schemes','Ledgers','banks'));

    }

   function store(Request $oRequest)
    {
       
        $oRequest->offsetSet('created_by',Auth::guard('admin')->user()->id);
        $oRequest->offsetSet('uuid',Helper::generate_uuid());
        $NewCode =  Helper::get_FixedDeposits_number();
        $oRequest->offsetSet('application_mo',$NewCode['application_mo']);
        $oRequest->offsetSet('application_unique',$NewCode['application_unique']);
        $oRequest->offsetSet('available_balance',$oRequest->fd_amount);
        
        $addResult = FixedDeposit::create($oRequest->all());
        if($addResult){

                $TranDetails['type']                      = 'deposit';  //deport,widthow,recurring
                $TranDetails['transation_type']           = 'credit';  //credit,debit
                $TranDetails['user_type']                 = Auth::guard('admin')->user()->user_type; 
                $TranDetails['user_id']                   = Auth::guard('admin')->user()->id;
                $TranDetails['customer_id']               = @$oRequest->customer_id;
                $TranDetails['account_id']                = @$addResult->id;
                $TranDetails['amount']                    = @$oRequest->fd_amount;
                $TranDetails['transation_date']           = @$oRequest->application_date;
                $TranDetails['remarks']                   = 'DEPOSIT AS AN OPENING BALANCE';
                $TranDetails['payment_mode']              = @$oRequest->payment_mode;
                $TranDetails['bank_id']                   = @$oRequest->bank_id;
                $TranDetails['cheque_no']                 = @$oRequest->cheque_no;
                $TranDetails['reference_no']              = @$oRequest->reference_no;
                $TranDetails['cheque_date']               = @$oRequest->cheque_date;
                $TranDetails['bank_account_ledger_id']    = @$oRequest->bank_account_ledger_id;
                $TranDetails['status']                    = 'completed';
                $TranDetails['tran_page_type']            = 'fixedDeposit';
                Helper::TransationDetails($TranDetails);

              return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
        }else{ 
              return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }
    
    function list()
    {
        $rows = Helper::Get_FixedDeposits();
        $html = view('admin.templates.fixedDeposit.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

    public function edit_row(Request $oRequest){
      $data['page_title'] = 'RD Account Applications';
      $row                = FixedDeposit::where('uuid',$oRequest->id)->first();
      $Members            = Helper::GetMembers();
      $fd_schemes         = Helper::get_fd_scheme_list();
      $Ledgers            = Helper::get_ledgers();
      $banks              = Helper::getBank();
      $agents = Helper::getAgents();

      return view('admin.templates.fixedDeposit.fixedDeposit',compact('row','data','Members','fd_schemes','Ledgers','banks','agents'));
    }

     public function get_row(Request $oRequest){
        $row  = FixedDeposit::with('agent_rank')->where('unique_code',$oRequest->id)->first();
        $data['page_title'] = 'FD Applications';
        return view('admin.templates.fixedDeposit.fixedDeposit',compact('data','row'));
    }

    public function update_row(Request $oRequest)
    {
        $addResult = FixedDeposit::where('uuid',$oRequest->update_id)->update([
          'application_date'      => $oRequest->application_date,
          'customer_id'           => $oRequest->customer_id,
          'joint_customer_id'     => $oRequest->joint_customer_id,
          'minor_id'              => $oRequest->minor_id,
          'agent_id'              => $oRequest->agent_id,
          'scheme_id'             => $oRequest->scheme_id,
          'fd_amount'             => $oRequest->fd_amount,
          'fd_frequency'          => $oRequest->fd_frequency,
          'fd_tenure'             => $oRequest->fd_tenure,
        ]);

        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    public function delete_row(Request $oRequest)
    {
        $Result = FixedDeposit::where('id',$oRequest->update_id)->update([
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


    public function fixedDepositApprove_Index()
    {
     
        $data['page_title'] = 'FD Account List (Pending for approval)';
        return view('admin.templates.fixedDepositApprove.fixedDepositApprove',compact('data'));
    }

    function fixedDepositApprove_list()
    {
        $rows = Helper::Get_FixedDepositPending();
        $html = view('admin.templates.fixedDepositApprove.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

     public function ApproveManage(Request $oRequest){
        $data['page_title'] = 'RD Account';
        $row                = FixedDeposit::with('FDscheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.fixedDeposit.fixedDeposit',compact('data','row'));
    }

     public function Manage(Request $oRequest){
        $data['page_title'] = 'FD Account';
        $row                = FixedDeposit::where('uuid',$oRequest->id)->first();
        $pendingTransation = Helper::get_Pending_FD_Transation();
        return view('admin.templates.fixedDeposit.fixedDeposit',compact('pendingTransation','data','row'));
    }
    

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
        $SavingAccount = FixedDeposit::where('account_no',$accountNo)->first();
        if($SavingAccount){
            $accountNo = Helper::CreateSevingAccountNo();
        }

        $FDInfo = FixedDeposit::where('uuid',$oRequest->update_id)->first();
        $oRequest->offsetSet('fd_frequency',$FDInfo->fd_frequency);
        $oRequest->offsetSet('fd_tenure',$FDInfo->fd_tenure);
        $oRequest->offsetSet('opening_date',$FDInfo->application_date);
        $oRequest->offsetSet('interest_rate',$FDInfo->interest_rate);

        $FDAccountEMI = Helper::GetFD_Calculation($FDInfo);

        $addResult = FixedDeposit::where('uuid',$oRequest->update_id)->update([
          'status'                      => $oRequest->status,
          'fd_principal'                => $FDAccountEMI['Final_Principal'],
          'maturity_interest_amount'    => $FDAccountEMI['Final_InterestEarned'],
          'maturity_amount'             => $FDAccountEMI['Final_MaturityAmount'],
          'maturity_date'               => Helper::getFromDateForDatabase($FDAccountEMI['Final_MaturityDate']),
          'status'                      => $oRequest->status,
          'account_no'                  => $accountNo
        ]);

        if($addResult){

             if(count($FDAccountEMI['EMIList']) > 0){
                foreach ($FDAccountEMI['EMIList'] as $key => $emi) {
                    FixedDepositPayout::create([
                        'fix_deposit_id'        => $oRequest->update_id,
                        'due_date'              => Helper::getFromDateForDatabase($emi['dueDate']),
                        'to_date'               => Helper::getFromDateForDatabase($emi['CloseDate']),
                        'amount'                => $emi['total_amount'],
                        'interest'              => $emi['interest'],
                        'maturity_amount'       => $emi['maturity_amount'],
                        'payment_date'          => Helper::getFromDateForDatabase($emi['interest_due_date']),
                        'created_by'            => Auth::guard('admin')->user()->id,
                        'maturity_amount'       => $emi['maturity_amount'],
                    ]);
                }                    
            }

            return response()->json(array('status' => 1,'msg'=>'FD Application successfully Approved'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    
    public function view_emilist(Request $oRequest){
        $data['page_title'] = 'Payout';
        $row             = FixedDeposit::where('uuid',$oRequest->id)->first();
        $rows            = FixedDepositPayout::where('fix_deposit_id',$oRequest->id)->get();
        return view('admin.templates.fixedDeposit.fixedDeposit',compact('data','row','rows'));
    }


    /* Start : RD Account Deposit */
     public function DepositView(Request $oRequest){
            $data['page_title'] = 'Deposit';
            $banks = Helper::getBank();
            $Ledgers = Helper::get_ledgers();
            $row  = RecurringDeposit::where('uuid',$oRequest->id)->first();
            return view('admin.templates.recurringDeposit.recurringDeposit',compact('data','row','banks','Ledgers'));
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
        $row  = FixedDeposit::with('customer','FDscheme')->where('uuid',$oRequest->id)->first();
        $schemes = Helper::get_scheme_list();
        return view('admin.templates.fixedDeposit.fixedDeposit',compact('data','row','schemes'));
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
            $addResult = FixedDeposit::where('id',$oRequest->update_id)->update([
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
        $row  = FixedDeposit::with('customer','FDscheme','agent')->where('uuid',$oRequest->id)->first();
        $agents = Helper::getAgents($row->id);
        return view('admin.templates.fixedDeposit.fixedDeposit',compact('data','row','agents'));
    }
    
    public function GetUpdateAgentStore(Request $oRequest)
    {
        $info  = FixedDeposit::with('agent')->where('uuid',$oRequest->update_id)->first();
        $addResult = FixedDeposit::where('uuid',$oRequest->update_id)->update([
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
                    $addResult = FixedDeposit::where('uuid',$oRequest->update_id)->update([
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
        $row  = FixedDeposit::with('customer','FDscheme','collector_agent')->where('uuid',$oRequest->id)->first();
        $agents = Helper::getAgents($row->id);
        return view('admin.templates.fixedDeposit.fixedDeposit',compact('data','row','agents'));
    }
     public function GetUpdateAgentCollectorStore(Request $oRequest)
    {
        $info  = FixedDeposit::with('collector_agent')->where('uuid',$oRequest->update_id)->first();
        $addResult = FixedDeposit::where('uuid',$oRequest->update_id)->update([
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

                $addResult = FixedDeposit::where('uuid',$oRequest->update_id)->update([
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
        $row  = FixedDeposit::with('customer','RDscheme')->where('uuid',$oRequest->id)->first();
        $transations = Helper::get_FD_TransationByAccount($row->id);
        return view('admin.templates.fixedDeposit.fixedDeposit',compact('data','row','transations'));
    }
     public function GetReceipt(Request $oRequest){
        $data['page_title'] = 'TRANSACTIONS Receipt';
        $row  = TransationHistory::with('customer','fd_account','ledger')
                                        ->where('id',$oRequest->id)
                                        ->orderBy('id', 'ASC')
                                        ->first();
        return view('admin.templates.fixedDeposit.fixedDeposit',compact('data','row'));
    }
    
    /*Start :: NeftImps Func */
    
     /*Start :: Statement Func */
    public function GetStatement(Request $oRequest){
        $data['page_title'] = 'Account Statement';
        $row  = FixedDeposit::with('customer','agent','join_customer','FDscheme')->where('uuid',$oRequest->id)->first();
        $statements  = TransationHistory::with('customer','fd_account','ledger')
                                        ->where('tran_page_type','fixedDeposit')
                                        ->where('status','completed')
                                        ->where('account_id',$row->id)
                                        ->whereBetween('transation_date', [$oRequest->from_date, $oRequest->to_date])
                                        ->orderBy('id', 'ASC')
                                        ->get();
                                        
        return view('admin.templates.fixedDeposit.fixedDeposit',compact('data','row','statements'));
    }
    /*Start :: Statement Func */
    
    
    /*Start :: WelcomeletterView Func */
     
     public function DebitCreteCharges(Request $oRequest){
        $data['page_title'] = 'Debit/Credit Account';
        $row  = FixedDeposit::with('customer','FDscheme')->where('uuid',$oRequest->id)->first();
        $Ledgers = Helper::get_ledgers();
        return view('admin.templates.fixedDeposit.fixedDeposit',compact('data','row','Ledgers'));
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
        $TranDetails['status']                    = 'pending';
        $TranDetails['tran_page_type']            = 'fixedDeposit';
        
        
        $addResult = Helper::TransationDetails($TranDetails);
        if($addResult){

            $SavingAvailable  = FixedDeposit::where('id',$oRequest->account_id)->first();
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
        $row        = FixedDeposit::with('customer','FDscheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.fixedDeposit.fixedDeposit',compact('data','row','banks','Ledgers'));
    }

    function PartReleaseStore(Request $oRequest)
    {
        $checkBalance = FixedDeposit::where('delete_status','0')
                                    ->where('uuid',$oRequest->update_id)
                                    ->first();

        if ($oRequest->amount > $checkBalance->available_balance){
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
            $TranDetails['tran_page_type']            = 'fixedDeposit';
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
            $row                = FixedDeposit::where('uuid',$oRequest->id)->first();
            $maturity_interest  = FixedDepositPayout::where('fix_deposit_id',$row->uuid)
                                ->whereDate('to_date','<=',date('Y-m-d'))
                                ->orderBy('id','desc')
                                ->sum('interest');
            return view('admin.templates.fixedDeposit.fixedDeposit',compact('maturity_interest','data','row','banks','Ledgers'));
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
        $row  = FixedDeposit::with('customer','FDscheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.fixedDeposit.fixedDeposit',compact('data','row'));
    }

    public function blockAccountStore(Request $oRequest)
    {
        $addResult = FixedDeposit::where('uuid',$oRequest->update_id)->update([
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
        $row  = FixedDeposit::with('customer','FDscheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.fixedDeposit.fixedDeposit',compact('data','row'));
    }

    public function UnblockAccountStore(Request $oRequest)
    {
        $addResult = FixedDeposit::where('uuid',$oRequest->update_id)->update([
          'status'          => 'approved',
        ]);
            
         if($addResult){ 
            return response()->json(array('status' => 1,'back_url'=>$oRequest->back_url,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    /*End :: Un Block Account Func */
    
 


}
