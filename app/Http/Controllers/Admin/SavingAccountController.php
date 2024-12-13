<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scheme;
use App\Models\SavingAccount;
use App\Models\TransationHistory;
use App\Models\Ledger;
use App\Models\Admin;
use Excel;
use Auth;
use Helper;
use Carbon\Carbon;

class SavingAccountController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Saving Account';
        return view('admin.templates.saving_account.saving_account',compact('data'));
    }

    public function indexPending()
    {
        $data['page_title'] = 'Saving Accounts for Approval ';
        return view('admin.templates.saving_account.saving_account',compact('data'));
    }


    public function create()
    {
        $data['page_title'] = 'Saving Account';
        $Members = Helper::GetMembers();
        $schemes = Helper::get_scheme_list();
        $Ledgers = Helper::get_ledgers();
        $banks = Helper::getBank();
        $agents = Helper::getAgents();
        return view('admin.templates.saving_account.saving_account',compact('agents','data','Members','schemes','Ledgers','banks'));
    }

     public function manage(Request $oRequest){
        $data['page_title'] = 'Saving Account';
        $Ledgers = Helper::get_ledgers();
        $row  = SavingAccount::with('customer','scheme','agent')->where('uuid',$oRequest->id)->first();
        $CheckExistPendingTransation = Helper::CheckExistPendingTransation($row->id);
        
        
        $pendingTransation = Helper::get_PendingTransation();
        $agents = Helper::getAgents();
        return view('admin.templates.saving_account.saving_account',compact('data','agents','row','CheckExistPendingTransation','pendingTransation'));
    }

    

    

   function store(Request $oRequest)
    {
       
        $oRequest->offsetSet('created_by',Auth::guard('admin')->user()->id);
        $oRequest->offsetSet('uuid',Helper::generate_uuid());
        $NewCustomerCode =  Helper::get_SevingAccount_number();
        $oRequest->offsetSet('application_mo',$NewCustomerCode['application_mo']);
        $oRequest->offsetSet('application_unique',$NewCustomerCode['application_unique']);
        //$oRequest->offsetSet('available_balance',$oRequest->opening_amount);

        $checkExist = SavingAccount::where('delete_status','0')
                                    ->where('customer_id',$oRequest->customer_id)
                                    ->first();
        if ($checkExist){
            return response()->json(array('status' => 2,'msg'=> 'This Customer already added'));
        }else{

            $addResult = SavingAccount::create($oRequest->all());
            if($addResult){

            $TranDetails['type']                      = 'deposit';  //deport,widthow,
            $TranDetails['transation_type']           = 'credit';  //credit,debit
            $TranDetails['user_type']                 = Auth::guard('admin')->user()->user_type; 
            $TranDetails['user_id']                   =  Auth::guard('admin')->user()->id;
            $TranDetails['customer_id']               = @$oRequest->customer_id;
            $TranDetails['account_id']                = @$addResult->id;
            $TranDetails['amount']                    = @$oRequest->opening_amount;
            $TranDetails['transation_date']           = @$oRequest->application_date;
            $TranDetails['remarks']                   = @$oRequest->remarks;
            $TranDetails['payment_mode']              = @$oRequest->payment_mode;
            $TranDetails['bank_id']                   = @$oRequest->bank_id;
            $TranDetails['cheque_no']                 = @$oRequest->cheque_no;
            $TranDetails['reference_no']              = @$oRequest->reference_no;
            $TranDetails['cheque_date']               = @$oRequest->cheque_date;
            $TranDetails['bank_account_ledger_id']    = @$oRequest->bank_account_ledger_id;
            $TranDetails['status']                    = 'pending';
            $TranDetails['remarks']                   = 'Deposit as an opening balance';
            $TranDetails['tran_page_type']            = 'saving';
            Helper::TransationDetails($TranDetails);

                return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
            }else{ 
                    return response()->json(array('status' => 0,'msg'=>'Error'));
            }
        }
    }
    
    function list()
    {
        $rows = Helper::get_SavingAccouunt();
        $html = view('admin.templates.saving_account.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

    function listPending()
    {
        $rows = Helper::get_SavingAccouuntPending();
        $html = view('admin.templates.saving_account.records-pending', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }
    
    function listAll()
    {
        $rows = Helper::get_SavingAccouuntAll();
        $html = view('admin.templates.saving_account.records-all', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

    public function edit_row(Request $oRequest){
        $data['page_title'] = 'Update Saving Account';
        $row  = SavingAccount::where('uuid',$oRequest->id)->first();
        $Members = Helper::GetMembers();
        $schemes = Helper::get_scheme_list();
        $agents = Helper::getAgents();
        return view('admin.templates.saving_account.saving_account',compact('data','agents','row','Members','schemes'));
    }

    public function ApproveManage(Request $oRequest){
        $data['page_title'] = 'Approve Saving Account Application';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
       
        return view('admin.templates.saving_account.saving_account',compact('data','row'));
    }

    
     public function get_row(Request $oRequest)
    {
        $row  = City::where('id',$oRequest->id)->first();
        
        return response()->json(['data' => $row,'status' => '1']);
    }

    

    public function update_row(Request $oRequest)
    {
        $addResult = SavingAccount::where('uuid',$oRequest->update_id)->update([
          'application_date'      => $oRequest->application_date,
          'customer_id'           => $oRequest->customer_id,
          'joint_customer_id'     => $oRequest->joint_customer_id,
          'minor_id'              => $oRequest->minor_id,
          'agent_id'              => $oRequest->agent_id,
          'opening_amount'        => $oRequest->opening_amount,
          'scheme_id'             => $oRequest->scheme_id,
          'payment_mode'          => $oRequest->payment_mode,
        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    public function updateStatus(Request $oRequest)
    {
        $accountNo = Helper::CreateSevingAccountNo();
        $SavingAccount = SavingAccount::where('account_no',$accountNo)->first();
        if($SavingAccount){
            $accountNo = Helper::CreateSevingAccountNo();
        }
        $addResult = SavingAccount::where('uuid',$oRequest->update_id)->update([
          'status'          => $oRequest->status,
          'account_no'      => $accountNo
        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Application successfully Approved'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    
    public function delete_row(Request $oRequest)
    {
        $Result = SavingAccount::where('id',$oRequest->update_id)->update([
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

     
     /*Start :: Deport Func */
     
     public function DepositView(Request $oRequest){
        $data['page_title'] = 'Depossit Amount';
        $banks = Helper::getBank();
        $Ledgers = Helper::get_ledgers();
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.saving_account.saving_account',compact('data','row','banks','Ledgers'));
    }

    function DepositStore(Request $oRequest)
    {
        $TranDetails['type']                      = 'deposit';  //deport,widthow,
        $TranDetails['transation_type']           = 'credit';  //credit,debit
        $TranDetails['user_type']                 = Auth::guard('admin')->user()->user_type; 
        $TranDetails['user_id']                   = Auth::guard('admin')->user()->id;
        $TranDetails['customer_id']               = @$oRequest->customer_id;
        $TranDetails['account_id']               = @$oRequest->account_id;
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
        $TranDetails['remarks']                   = 'Amount Deposit';
        $TranDetails['tran_page_type']            = 'saving';
        $addResult = Helper::TransationDetails($TranDetails);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
        }else{ 
                return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

     /*End :: Deport Func */

     /*Start :: Withdraw Func */
     
     public function WithdrawView(Request $oRequest){
        $data['page_title'] = 'Withdraw Amount';
        $banks = Helper::getBank();
        $Ledgers = Helper::get_ledgers();
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.saving_account.saving_account',compact('data','row','banks','Ledgers'));
    }

    function WithdrawStore(Request $oRequest)
    {
        $checkBalance = SavingAccount::where('delete_status','0')
                                    ->where('uuid',$oRequest->update_id)
                                    ->where('available_balance','<',$oRequest->amount)    
                                    ->first();
        if ($checkBalance){
            return response()->json(array('status' => 2,'msg'=> 'Account Balance note available'));
        }else{
            
            $available_balance  = SavingAccount::where('uuid',$oRequest->update_id)->select(['lien_amount','available_balance'])->first();    
            
            $lien_amount = $available_balance->lien_amount;
            $available_balance = $available_balance->available_balance;
            
            $AfterWidthBalance = $available_balance - $oRequest->amount;
            
            if($AfterWidthBalance < $lien_amount){
                $Message = 'Lien amount set ₹ '.$lien_amount.' and Available Balance is  ₹ '.$available_balance;
                return response()->json(array('status' => 2,'msg'=> $Message));
            }
            
            
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
            $TranDetails['remarks']                   = 'Amount withdrawal';
            $TranDetails['tran_page_type']            = 'saving';
            $addResult = Helper::TransationDetails($TranDetails);
            if($addResult){
                return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
            }else{ 
                    return response()->json(array('status' => 0,'msg'=>'Error'));
            }

        }
    }
     /*End :: Withdraw Func */

     /*Start :: WelcomeletterView Func */
     
     public function WelcomeletterView(Request $oRequest){
        $data['page_title'] = 'Welcome Letter Amount';
        $banks = Helper::getBank();
        $Ledgers = Helper::get_ledgers();
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.saving_account.saving_account',compact('data','row','banks','Ledgers'));
    }

    /*End :: WelcomeletterView Func */

    /*Start :: WelcomeletterView Func */
     
     public function UpgradeSchemeView(Request $oRequest){
        $data['page_title'] = 'Change Scheme';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        $schemes = Helper::get_scheme_list();
        return view('admin.templates.saving_account.saving_account',compact('data','row','schemes'));
    }

    public function UpgradeSchemeStore(Request $oRequest)
    {
        $addResult = SavingAccount::where('uuid',$oRequest->update_id)->update([
          'update_scheme_date'      => $oRequest->update_scheme_date,
          'scheme_id'           => $oRequest->scheme_id,
         
        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    /*End :: WelcomeletterView Func */

    /*Start :: NomineeView Func */
    public function NomineeView(Request $oRequest){
        $data['page_title'] = 'Nominee Detail';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        $schemes = Helper::get_scheme_list();
        return view('admin.templates.saving_account.saving_account',compact('data','row','schemes'));
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
            $addResult = SavingAccount::where('id',$oRequest->update_id)->update([
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

    

    /*Start :: Statement Func */
    public function GetStatement(Request $oRequest){
        $data['page_title'] = 'Account Statement';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        $statements  = TransationHistory::with('customer','account','ledger')
                                        ->where('account_id',$row->id)
                                        ->whereBetween('transation_date', [$oRequest->from_date, $oRequest->to_date])
                                        ->orderBy('id', 'ASC')
                                        ->get();
        return view('admin.templates.saving_account.saving_account',compact('data','row','statements'));
    }
    public function PrintStatement(Request $oRequest){
        $data['page_title'] = 'Account Statement';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        $statements  = get_TransationByAccount::with('customer','account','ledger')
                                        ->where('account_id',$row->id)
                                        ->whereBetween('transation_date', [$oRequest->from_date, $oRequest->to_date])
                                        ->orderBy('id', 'ASC')
                                        ->get();
        return view('admin.templates.saving_account.print_account_statement',compact('data','row','statements'));
    }
    
    /*Start :: Statement Func */
    
    /*Start :: NeftImps Func */
    public function Get_NeftImps(Request $oRequest){
        $data['page_title'] = 'Transfer to Beneficiary';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.saving_account.saving_account',compact('data','row'));
    }
   
    /*Start :: NeftImps Func */
    
    /*Start :: NeftImps Func */
    public function Get_transactions(Request $oRequest){
        $data['page_title'] = 'TRANSACTIONS';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        $transations = Helper::get_TransationByAccount($row->id);
        
        
        return view('admin.templates.saving_account.saving_account',compact('data','row','transations'));
    }
   
    /*Start :: NeftImps Func */
    
     /*Start :: Receipt Func */
    public function GetReceipt(Request $oRequest){
        $data['page_title'] = 'Receipt';
        $row  = TransationHistory::with('customer','ledger')
                                        ->where('id',$oRequest->id)
                                        ->orderBy('id', 'ASC')
                                        ->first();
        
        
        return view('admin.templates.saving_account.saving_account',compact('data','row'));
    }
    
    public function GetPrintReceipt(Request $oRequest){
        $data['page_title'] = 'Print Receipt';
        $row  = TransationHistory::with('customer','account','ledger')->where('id',$oRequest->id)->orderBy('id', 'ASC')->first();
        return view('admin.templates.saving_account.print-receipt',compact('data','row'));
    }
    /*Start :: Receipt Func */

    /*Start :: GetUpdateAgent Func */
    public function GetUpdateAgent(Request $oRequest){
        $data['page_title'] = 'Update Associate Information';
        $row  = SavingAccount::with('customer','scheme','agent')->where('uuid',$oRequest->id)->first();
        $agents = Helper::getAgents($row->id);
        return view('admin.templates.saving_account.saving_account',compact('data','row','agents'));
    }
     public function GetUpdateAgentStore(Request $oRequest)
    {
        $info  = SavingAccount::with('agent')->where('uuid',$oRequest->update_id)->first();
        $addResult = SavingAccount::where('uuid',$oRequest->update_id)->update([
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

                $addResult = SavingAccount::where('uuid',$oRequest->update_id)->update([
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
        $data['page_title'] = 'Update Collector Information';
        $row  = SavingAccount::with('customer','scheme','collector_agent')->where('uuid',$oRequest->id)->first();
        $agents = Helper::getAgents($row->id);
        return view('admin.templates.saving_account.saving_account',compact('data','row','agents'));
    }
     public function GetUpdateAgentCollectorStore(Request $oRequest)
    {
        $info  = SavingAccount::with('collector_agent')->where('uuid',$oRequest->update_id)->first();
        $addResult = SavingAccount::where('uuid',$oRequest->update_id)->update([
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

                $addResult = SavingAccount::where('uuid',$oRequest->update_id)->update([
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
     
     public function GetJointAccount(Request $oRequest){
        $data['page_title'] = 'Change Scheme';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        $Members = Helper::GetMembers();
        return view('admin.templates.saving_account.saving_account',compact('data','row','Members'));
    }

    public function UpdateJointAccountStore(Request $oRequest)
    {
        $addResult = SavingAccount::where('uuid',$oRequest->update_id)->update([
          'joint_customer_id'      => $oRequest->update_joint_customer_id,
        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    /*End :: WelcomeletterView Func */

    /*Start :: WelcomeletterView Func */
     
     public function DebitCreteCharges(Request $oRequest){
        $data['page_title'] = 'Debit/Credit Account';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        $Ledgers = Helper::get_ledgers();
        return view('admin.templates.saving_account.saving_account',compact('data','row','Ledgers'));
    }

    public function DebitCreteChargesStore(Request $oRequest){

        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->update_id)->first();
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
        $TranDetails['tran_page_type']            = 'saving';
        
        $addResult = Helper::TransationDetails($TranDetails);
        if($addResult){

            $SavingAvailable  = SavingAccount::where('id',$oRequest->account_id)->first();
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


     /*Start :: agentCommission Func */
     public function agentCommission(Request $oRequest){
        $data['page_title'] = 'Agent Commission detail';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.saving_account.saving_account',compact('data','row'));
    }
    /*End :: agentCommission Func */

    /*Start :: CollectionCharge Func */
    
    public function CollectionCharge(Request $oRequest){
        $data['page_title'] = 'Collection Charge detail';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.saving_account.saving_account',compact('data','row'));
    }
    
    /*End :: CollectionCharge Func */


    /*Start :: getsetLienAmount Func */
    
    public function getsetLienAmount(Request $oRequest){
        $data['page_title'] = 'Collection Charge detail';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.saving_account.saving_account',compact('data','row'));
    }

     public function setLienAmountStore(Request $oRequest)
    {
        $addResult = SavingAccount::where('uuid',$oRequest->update_id)->update([
          'lien_amount'      => $oRequest->lien_amount,
        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    /*End :: getsetLienAmount Func */



    /*Start :: setNEFTLimitAmountStore Func */
    
    public function getsetNEFTLimitAmount(Request $oRequest){
        $data['page_title'] = 'Set NEFT/Scan Pay Limit';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.saving_account.saving_account',compact('data','row'));
    }

     public function setNEFTLimitAmountStore(Request $oRequest)
    {
        $addResult = SavingAccount::where('uuid',$oRequest->update_id)->update([
          'neft_limit_amount'      => $oRequest->neft_limit_amount,
          'scan_pay_limit_amount'      => $oRequest->scan_pay_limit_amount,
        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    /*End :: setNEFTLimitAmountStore Func */


     /*Start :: WelcomeletterView Func */
     
     public function geteditMinor(Request $oRequest){
        $data['page_title'] = 'Change Scheme';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        $Members = Helper::GetMembers();
        return view('admin.templates.saving_account.saving_account',compact('data','row','Members'));
    }

    public function editMinorStore(Request $oRequest)
    {
        $addResult = SavingAccount::where('uuid',$oRequest->update_id)->update([
          'minor_id'      => $oRequest->update_minor_id,
        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    /*End :: WelcomeletterView Func */

    /*Start :: CLOSE ACCOUNT Func */
     
     public function getcloseAccount(Request $oRequest){
        $data['page_title'] = 'CLOSE ACCOUNT';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
         $schemes = Helper::get_scheme_list();
        $Ledgers = Helper::get_ledgers();
        $banks = Helper::getBank();
        return view('admin.templates.saving_account.saving_account',compact('row','data','schemes','Ledgers','banks'));
    }

    public function closeAccountStore(Request $oRequest)
    {

        $addResult = SavingAccount::where('uuid',$oRequest->update_id)->update([
          'close_date'      => $oRequest->transation_date,
        ]);
        $TranDetails['type']                      = 'withdrawal';  //deport,widthow,
        $TranDetails['transation_type']           = 'debit';  //credit,debit
        $TranDetails['user_type']                 = Auth::guard('admin')->user()->user_type; 
        $TranDetails['user_id']                   = Auth::guard('admin')->user()->id;
        $TranDetails['customer_id']               = @$oRequest->customer_id;
        $TranDetails['account_id']                = @$oRequest->account_id;
        $TranDetails['amount']                    = @$oRequest->net_amount_release;
        $TranDetails['transation_date']           = @$oRequest->transation_date;
        $TranDetails['payment_mode']              = @$oRequest->payment_mode;
        $TranDetails['bank_id']                   = @$oRequest->bank_id;
        $TranDetails['cheque_no']                 = @$oRequest->cheque_no;
        $TranDetails['reference_no']              = @$oRequest->reference_no;
        $TranDetails['cheque_date']               = @$oRequest->cheque_date;
        $TranDetails['bank_account_ledger_id']    = @$oRequest->bank_account_ledger_id;
        $TranDetails['status']                    = 'pending';
        $TranDetails['remarks']                   = 'Full & final amount';
        $TranDetails['closestatus']              = 1;
        $TranDetails['tran_page_type']            = 'saving';

        $addResult = Helper::TransationDetails($TranDetails);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
        }else{ 
                return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    /*End :: CLOSE ACCOUNT Func */
    
    /*Start :: Block Account Func */
     
     public function getblockAccount(Request $oRequest){
        $data['page_title'] = 'Block Account';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.saving_account.saving_account',compact('data','row'));
    }

    public function blockAccountStore(Request $oRequest)
    {
        $addResult = SavingAccount::where('uuid',$oRequest->update_id)->update([
          'status'          => 'block',
          'block_reason'    => 'block',
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
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.saving_account.saving_account',compact('data','row'));
    }

    public function UnblockAccountStore(Request $oRequest)
    {
        $addResult = SavingAccount::where('uuid',$oRequest->update_id)->update([
          'status'          => 'approved',
        ]);
            
         if($addResult){ 
            return response()->json(array('status' => 1,'back_url'=>$oRequest->back_url,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    /*End :: Un Block Account Func */
    
    /*Start :: Passbook Func */
    public function GetPassbook(Request $oRequest){
        $data['page_title'] = 'Account Statement';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        $statements  = TransationHistory::with('customer','account','ledger')
                                        ->where('account_id',$row->id)
                                        ->orderBy('id', 'ASC')
                                        ->get();

        return view('admin.templates.saving_account.saving_account',compact('data','row','statements'));
    }
    
     public function GetPassbookFol1(Request $oRequest){
        $data['page_title'] = 'Passbook Printing (Page Fold-1)';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.saving_account.saving_account',compact('data','row'));
    }
    
    public function GetPassbookFol2(Request $oRequest){
        $data['page_title'] = 'Passbook Printing (Page Fold-2)';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.saving_account.saving_account',compact('data','row'));
    }
    
     public function GetPassbookFol2Print(Request $oRequest){
        $data['page_title'] = 'Passbook Printing (Page Fold-1)';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.saving_account.passbook_fol2_print',compact('data','row'));
    }
     public function GetPassbookFol1Print(Request $oRequest){
        $data['page_title'] = 'Passbook Printing (Page Fold-2)';
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->id)->first();
        return view('admin.templates.saving_account.passbook_fol1_print',compact('data','row'));
    }
    
    
     /*End :: Passbook Func */
     
     
     
     public function calculateInterest(Request $oRequest)
    {
        $row  = SavingAccount::with('customer','scheme')->where('uuid',$oRequest->update_uuid)->first();

        $interest_rate          = $row->scheme->interest_rate;
        $available_balance      = $row->available_balance;
        $last_interest_cal_date = $row->last_interest_cal_date;
        $application_date       = $row->application_date;
        
        if($last_interest_cal_date != ''){
            $start = Carbon::parse($last_interest_cal_date);
            $end =  Carbon::parse($oRequest->interest_date);
            $days = $start->diffInDays($end);

        }else{
            
            $start = Carbon::parse($application_date);
            $end =  Carbon::parse($oRequest->interest_date);
            $days = $start->diffInDays($end);

        }    
        
        
        if($days != 0){

                $IntestCalculation          = $available_balance * $interest_rate / 100;
                $Final_IntestAmount_Days    = $IntestCalculation / 365; 
                $InterestCalculationYear    = $Final_IntestAmount_Days * $days;
                $available_balance          = $row->available_balance + $InterestCalculationYear;

                 SavingAccount::where('uuid',$oRequest->update_uuid)->update([
                  'last_interest_cal_date'      => $oRequest->interest_date,
                  'available_balance'           => number_format((float)$available_balance, 2, '.', ''),
                ]);

                $TranDetails['type']                      = 'deport';  //deport,widthow,
                $TranDetails['transation_type']           = 'credit';  //credit,debit
                $TranDetails['user_type']                 = Auth::guard('admin')->user()->user_type; 
                $TranDetails['user_id']                   = Auth::guard('admin')->user()->id;
                $TranDetails['customer_id']               = @$row->customer_id;
                $TranDetails['account_id']                = @$row->id;
                $TranDetails['amount']                    = number_format((float)@$InterestCalculationYear, 2, '.', '');
                $TranDetails['transation_date']           = @$oRequest->interest_date;
                $TranDetails['remarks']                   = 'DEPOSIT AS AN INTEREST';
                $TranDetails['payment_mode']              = 'DCOTH';
                $TranDetails['bank_id']                   = @$oRequest->bank_id;
                $TranDetails['cheque_no']                 = @$oRequest->cheque_no;
                $TranDetails['reference_no']              = @$oRequest->reference_no;
                $TranDetails['cheque_date']               = @$oRequest->cheque_date;
                $TranDetails['bank_account_ledger_id']    = @$oRequest->bank_ledger_id;
                $TranDetails['status']                    = 'completed';
                $TranDetails['tran_page_type']            = 'saving';
                
                $addResult = Helper::TransationDetails($TranDetails);

            return response()->json(array('status' => 1,'msg'=>'Interest Deposit successfully'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Interest Already Calculated'));
        }
    }

    

    

    
    
    
    
    

    

     
    

    




}
