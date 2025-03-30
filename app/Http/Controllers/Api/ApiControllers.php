<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Expense;
use App\Models\User;
use App\Models\Employees;
use App\Models\SavingScheme;
use App\Models\Admin;
use App\Models\Member;
use App\Models\FdScheme;
use Illuminate\Support\Str;
use App\Models\RdScheme;
use App\Models\LoanApplication;
use Illuminate\Support\Facades\Validator;
use App\Models\Projects;
use App\Models\SavingAccount;
use App\Models\FixedDeposit;
use App\Models\RecurringDeposit;
use App\Models\BusinessLoan;
use App\Models\LoanEmi;
use App\Models\Bank;
use App\Models\Ledger;
use App\Models\TransationHistory;
use App\Models\LoanScheme;
use DB;



use Illuminate\Support\Facades\Hash;
use Excel;
use App\Exports\ReportsExportCron;
use Auth;
use Helper;
use Mail;

class ApiControllers extends Controller
{
  
    public function test()
    {
        //     $result['first_name'] = 'Abdul';
        //     $result['last_name'] = 'Hakim';
        //     $result['email'] = 'abigstudio@gmail.com';
            
            
        //     //$html = view('mail.expense_mail', compact('result'))->render();
        //     //$emails = ['alnaimi66@icloud.com','alfikradesigns@gmail.com','info.genixtech@gmail.com'];
        //     $emails = ['nirav.2d@gmail.com'];
            
        //     $mailStatus = Mail::send('mail.expense_mail', compact('result'), function($message) use ($result,$emails) {
        //         $message->to($emails, $result['first_name'] . ' ' . $result['last_name'])->subject('Welcome email ');
        //         // $message->attach($result['excel_path']);
          
        // });
        // return 5;
        //return $mailStatus;
        return response()->json([
            'success' => true,
            'message' => 'API working!',
            'status_code' => 200,
            'data' => []
        ], 200);
    }
    
    
      public function userlogin(Request $oRequest)
    {
        $user = Admin::where(['mobile' => $oRequest->mobile])->first();
        if($user){
            if (!Hash::check($oRequest->password, $user['password'])) {
                return response()->json(['status' => 1, 'message' => 'Wrong password provided'], 403);
            } 
                Admin::where('mobile',$oRequest->mobile)->update([
                  'token_id' => $oRequest->token_id,
                ]);
            $update_user = Admin::where(['mobile' => $oRequest->mobile])->first();
            return response()->json(['status' => 0,'message' => 'Successful login','data'=>$update_user], 200);
        }else{
            
        }
        return response()->json(['status' => 1,'message' => 'Invalid mobile'], 200);
        // return response()->json([
        //     'success' => true,
        //     'message' => 'API working!',
        //     'status_code' => 200,
        //     'data' => []
        // ], 200);
    
    }
    
    public function profileDetails(Request $oRequest)
    {
        $user = Admin::where(['id' => $oRequest->user_id])->first();
        if($user){
            return response()->json(['status' => 0,'message' => 'Get Profile Details','data'=>$user], 200);
        }else{
            
        }
        return response()->json(['status' => 1,'message' => 'Invalid user Id'], 200);
    }
    
    public function updateProfile(Request $oRequest)
    {
       
        $user = Admin::where(['id' => $oRequest->update_id])->first();
        if(!$user){
            return response()->json(['status' => 1,'message' => 'No User Found'], 200);
        }else{
                if(isset($oRequest->new_password) && $oRequest->new_password !=""){
                    Admin::where('id',$oRequest->update_id)->update([
                      'password'      => Hash::make($oRequest->new_password)
                    ]);
                }
            $user = Admin::where(['id' => $oRequest->update_id])->first();
            return response()->json(['status' => 0,'message' => 'Successfully Update Profile','data'=>$user], 200);
        }
        return response()->json(['status' => 1,'message' => 'Invalid mobile'], 200);
    }
    
     public function get_customer(Request $oRequest)
    {
        $query = User::query();
        
        if(isset($oRequest->status) && $oRequest->status !=''){
            $query->where('status','=','active');
        }
        
        
        if(isset($oRequest->user_id) && $oRequest->user_id !=''){
            $query->where('created_by','=',$oRequest->user_id);
        }
       
        $rows = $query->get();
       
        if($rows){
            return response()->json(['status' => 0,'message' => 'Successful get list','data'=>$rows], 200);
        }else{
            return response()->json(['status' => 0,'message' => 'No data found','data'=>[]], 200);    
        }
        
    }
    
    public function get_account_list(Request $oRequest)
    {
        $query = SavingAccount::query();
        if(isset($oRequest->status) && $oRequest->status !=''){
            $query->where('status','=','active');
        }
        if(isset($oRequest->user_id) && $oRequest->user_id !=''){
            $query->where('customer_id','=',$oRequest->user_id);
        }
       
        $rows = $query->with('customer','scheme','agent')->get();
       
        if($rows){
            return response()->json(['status' => 0,'message' => 'Successful get list','data'=>$rows], 200);
        }else{
            return response()->json(['status' => 0,'message' => 'No data found','data'=>[]], 200);    
        }
        
    }
    
    public function get_fb_account(Request $oRequest)
    {
        $query = FixedDeposit::query();
        if(isset($oRequest->user_id) && $oRequest->user_id !=''){
            $query->where('customer_id','=',$oRequest->user_id);
        }
       
        $rows = $query->with('FDscheme')->get();
       
        if($rows){
            return response()->json(['status' => 0,'message' => 'Successful get list','data'=>$rows], 200);
        }else{
            return response()->json(['status' => 0,'message' => 'No data found','data'=>[]], 200);    
        }
        
    }
    
    public function get_rd_account(Request $oRequest)
    {
        $query = RecurringDeposit::query();
         if(isset($oRequest->user_id) && $oRequest->user_id !=''){
            $query->where('customer_id','=',$oRequest->user_id);
        }
       
        $rows = $query->with('RDscheme')->get();
       
        if($rows){
            return response()->json(['status' => 0,'message' => 'Successful get list','data'=>$rows], 200);
        }else{
            return response()->json(['status' => 0,'message' => 'No data found','data'=>[]], 200);    
        }
        
    }
    
    public function get_loan_account(Request $oRequest)
    {
        $query = BusinessLoan::query();
       
        if(isset($oRequest->user_id) && $oRequest->user_id !=''){
            $query->where('customer_id','=',$oRequest->user_id);
        }
       
        $rows = $query->with('Loanscheme')->get();
       
        if($rows){
            return response()->json(['status' => 0,'message' => 'Successful get list','data'=>$rows], 200);
        }else{
            return response()->json(['status' => 0,'message' => 'No data found','data'=>[]], 200);    
        }
        
    }
    
    public function get_loan_emi(Request $oRequest)
    {
        $query = LoanEmi::query();
       
        if(isset($oRequest->loan_uuid) && $oRequest->loan_uuid !=''){
            $query->where('loan_id','=',$oRequest->loan_uuid);
        }
       
        $rows = $query->get();
       
        if($rows){
            return response()->json(['status' => 0,'message' => 'Successful get list','data'=>$rows], 200);
        }else{
            return response()->json(['status' => 0,'message' => 'No data found','data'=>[]], 200);    
        }
        
    }
    
    
    function addSavingAccountDeposit(Request $oRequest)
    {
        $TranDetails['type']                      = 'deposit';  //deport,widthow,
        $TranDetails['transation_type']           = 'credit';  //credit,debit
        $TranDetails['user_type']                 = 'agent'; 
        $TranDetails['user_id']                   = @$oRequest->user_id;
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
        $TranDetails['remarks']                   = 'Amount Deposit';
        $TranDetails['tran_page_type']            = 'saving';
        $addResult = Helper::App_TransationDetails($TranDetails);
        
        if($addResult){
            return response()->json(['status' => 0,'message' => 'Successful add Deposit Amount'], 200);
        }else{
            return response()->json(['status' => 0,'message' => 'Somthing Wrong','data'=>[]], 200);    
        }
        
    }
    
    public function get_bank_list(Request $oRequest)
    {
        $query = Bank::query();
       
        $rows = $query->get();
       
        if($rows){
            return response()->json(['status' => 0,'message' => 'Successful get list','data'=>$rows], 200);
        }else{
            return response()->json(['status' => 0,'message' => 'No data found','data'=>[]], 200);    
        }
        
    }
    
    public function get_bank_ledger(Request $oRequest)
    {
        $query = Ledger::query();
       
        $rows = $query->get();
       
        if($rows){
            return response()->json(['status' => 0,'message' => 'Successful get list','data'=>$rows], 200);
        }else{
            return response()->json(['status' => 0,'message' => 'No data found','data'=>[]], 200);    
        }
        
    }
    
    function add_FD_AccountDeposit(Request $oRequest)
    {
        $TranDetails['type']                      = 'deposit';  //deport,widthow,
        $TranDetails['transation_type']           = 'credit';  //credit,debit
        $TranDetails['user_type']                 = 'agent'; 
        $TranDetails['user_id']                   = @$oRequest->user_id;
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
        $TranDetails['remarks']                   = 'Fixed Deposit';
        $TranDetails['tran_page_type']            = 'fixedDeposit';
        $addResult = Helper::App_TransationDetails($TranDetails);
        
        if($addResult){
            return response()->json(['status' => 0,'message' => 'Successful add Fixed Deposit Amount'], 200);
        }else{
            return response()->json(['status' => 0,'message' => 'Somthing Wrong','data'=>[]], 200);    
        }
        
    }
    
    function add_LoanDeposit(Request $oRequest)
    {
      
        $TranDetails['type']                      = 'deposit';  //deport,widthow,
        $TranDetails['transation_type']           = 'credit';  //credit,debit
        $TranDetails['user_type']                 = 'agent'; 
        $TranDetails['user_id']                   = @$oRequest->user_id;
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
        $TranDetails['remarks']                   = 'Loan Deposit';
        $TranDetails['tran_page_type']            = 'loan';
        $addResult = Helper::App_TransationDetails($TranDetails);
      
        
        if($addResult){
            return response()->json(['status' => 0,'message' => 'Successful add Loan Deposit Amount'], 200);
        }else{
            return response()->json(['status' => 0,'message' => 'Somthing Wrong','data'=>[]], 200);    
        }
        
    }
    
    function add_RD_AccountDeposit(Request $oRequest)
    {
        $TranDetails['type']                      = 'deposit';  //deport,widthow,
        $TranDetails['transation_type']           = 'credit';  //credit,debit
        $TranDetails['user_type']                 = 'agent'; 
        $TranDetails['user_id']                   = @$oRequest->user_id;
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
        $TranDetails['remarks']                   = 'Recurring Deposit';
        $TranDetails['tran_page_type']            = 'recurring';
        $addResult = Helper::App_TransationDetails($TranDetails);
        
        if($addResult){
            return response()->json(['status' => 0,'message' => 'Successful Add Recurring Deposit Amount'], 200);
        }else{
            return response()->json(['status' => 0,'message' => 'Somthing Wrong','data'=>[]], 200);    
        }
        
    }
    
    
    function create_saving_account(Request $oRequest)
    {
       
        
        $checkExist = SavingAccount::where('delete_status','0')
                                    ->where('customer_id',$oRequest->customer_id)
                                    ->first();
        if ($checkExist){
            return response()->json(array('status' => 2,'message'=> 'This Customer already have saving account')); 
        }else{

            $oRequest->offsetSet('created_by',$oRequest['created_by']);
            $oRequest->offsetSet('uuid',Helper::generate_uuid());
            $NewCustomerCode =  Helper::app_get_SevingAccount_number();
            $oRequest->offsetSet('application_mo',$NewCustomerCode['application_mo']);
            $oRequest->offsetSet('application_unique',$NewCustomerCode['application_unique']);
            
            $addResult = SavingAccount::create([
                    'application_date'          => @$oRequest->application_date,
                    'customer_id'               => @$oRequest->customer_id,
                    'agent_id'                  => @$oRequest->created_by,
                    'created_by'                => @$oRequest->created_by,
                    'opening_amount'            => @$oRequest->opening_amount,
                    'uuid'                      => @$oRequest->uuid,
                    'application_mo'            => @$oRequest->application_mo,
                    'application_unique'        => @$oRequest->application_unique,
                ]);
            if($addResult){
                
                $TranDetails['type']                     = 'deposit';  //deport,widthow,
                $TranDetails['transation_type']           = 'credit';  //credit,debit
                $TranDetails['user_type']                 ='agent'; 
                $TranDetails['user_id']                   = @$oRequest['created_by'];
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
                Helper::App_TransationDetails($TranDetails);
                
                
                
                return response()->json(['status' => 0,'message' => 'Successful Create Saving account'], 200);
            }else{
                return response()->json(['status' => 0,'message' => 'Somthing Wrong','data'=>[]], 200);    
            }
        }
        
    }
    
    public function get_member_transation(Request $oRequest)
    {
        $query = TransationHistory::query();
        if(isset($oRequest->member_id) && $oRequest->member_id !=''){
            $query->where('created_by',$oRequest->member_id);    
        }
        $rows = $query->where('delete_status','0')
                        ->whereIn('tran_page_type', ['saving'])
                        ->whereIn('status', ['completed', 'pending'])
                        ->orderBy('id', 'DESC')->get();
                        
        if($rows){
            return response()->json(['status' => 0,'message' => 'Successful get list','data'=>$rows], 200);
        }else{
            return response()->json(['status' => 0,'message' => 'No data found','data'=>[]], 200);    
        }
        
    }
    
    public function get_agent_transation(Request $oRequest)
    {
        $query = TransationHistory::query();
        if(isset($oRequest->agent_id) && $oRequest->agent_id !=''){
            $query->where('created_by',$oRequest->agent_id);    
        }
        $rows = $query->with('customer')->where('delete_status','0')
                        ->whereIn('tran_page_type', ['saving'])
                        ->whereIn('status', ['completed', 'pending'])
                        ->orderBy('id', 'DESC')->get();
                        
        if($rows){
            return response()->json(['status' => 0,'message' => 'Successful get list','data'=>$rows], 200);
        }else{
            return response()->json(['status' => 0,'message' => 'No data found','data'=>[]], 200);    
        }
        
    }
    
    
    function apply_loan(Request $oRequest)
    {
     
            $oRequest->offsetSet('created_by',$oRequest['created_by']);
            $oRequest->offsetSet('uuid',Helper::generate_uuid());
            $NewCustomerCode =  Helper::app_get_businessLoan_number();
            $oRequest->offsetSet('application_mo',$NewCustomerCode['application_mo']);
            $oRequest->offsetSet('application_unique',$NewCustomerCode['application_unique']);
            
            $addResult = BusinessLoan::create([
                    'application_date'          => @$oRequest->application_date,
                    'customer_id'               => @$oRequest->customer_id,
                    'agent_id'                  => @$oRequest->created_by,
                    'created_by'                => @$oRequest->created_by,
                    
                    'co_applicant_member_id'    => @$oRequest->co_applicant_member_id,
                    'scheme_id'                 => @$oRequest->scheme_id,
                    'emi_payout'                => @$oRequest->emi_payout,
                    'security_type'             => @$oRequest->security_type,
                    'reference_no'              => @$oRequest->reference_no,
                    'loan_amount_requested'     => @$oRequest->loan_amount_requested,
                    'collection_charge'         => @$oRequest->collection_charge,
                    'nature_of_business'        => @$oRequest->nature_of_business,
                    'purpose_of_loan'           => @$oRequest->purpose_of_loan,
                    
                    'collection_charge_value'       => @$oRequest->collection_charge_value,
                    'guaranter_first'               => @$oRequest->guaranter_first,
                    'guaranter_second'              => @$oRequest->guaranter_second,
                    'name_of_witness_first'         => @$oRequest->name_of_witness_first,
                    'name_of_witness_first_address' => @$oRequest->name_of_witness_first_address,
                    'name_of_witness_second'        => @$oRequest->name_of_witness_second,
                    'name_of_witness_second_address'=> @$oRequest->name_of_witness_second_address,
                    
                    'application_mo'            => @$oRequest->application_mo,
                    'application_unique'        => @$oRequest->application_unique,
                ]);
            if($addResult){
                
               
                return response()->json(['status' => 0,'message' => 'Successful Applay Loan'], 200);
            }else{
                return response()->json(['status' => 0,'message' => 'Somthing Wrong','data'=>[]], 200);    
            }
        
    }
    
    public function get_loan_scheme(Request $oRequest)
    {
        $user = LoanScheme::get();
        if($user){
            return response()->json(['status' => 0,'message' => 'Get loan scheme list','data'=>$user], 200);
        }else{
            
        }
        return response()->json(['status' => 1,'message' => 'Invalid user Id'], 200);
    }
    
    
     public function get_agent_profile(Request $oRequest)
    {
        $user = Admin::where(['id' => $oRequest->agent_id])->first();
        if($user){
            $update_user = Admin::where(['mobile' => $oRequest->mobile])->first();
            return response()->json(['status' => 0,'message' => 'Successful get','data'=>$user], 200);
        }else{
            return response()->json(['status' => 1,'message' => 'No Agent Found'], 200);    
        }
        
    }
    
    
    function add_member(Request $oRequest)
    {
     
    
        $customer_id = Helper::generate_uuid();
        $NewCustomerCode =  Helper::app_Customer_number($oRequest->agent_id);

        $customer_code = $NewCustomerCode['customer_code'];
        $folio_code   = $NewCustomerCode['folio_code'];
        
        
        $addResult = User::create([
            
                      'customer_id'         => $customer_id,
                      'customer_code'       => $customer_code,
                      'folio_code'          => $folio_code,
                      
                      'joining_date'        => $oRequest->joining_date,
                      'prifix_name'         => $oRequest->prifix_name,
                      'name'                => $oRequest->name,
                      'gender'              => $oRequest->gender,
                      'dob'                 => $oRequest->dob,
                      'age'                 => $oRequest->age,
                      'marital_status'      => $oRequest->marital_status,
                      'mobile'              => $oRequest->mobile,
                      'alternate_mobile'    => $oRequest->alternate_mobile,
                      'email'               => $oRequest->email,
                      'relative_relation'   => $oRequest->relative_relation,
                      'mother_Name'         => $oRequest->mother_Name,
                      'religion'            => $oRequest->religion,
                      'member_cast'         => $oRequest->member_cast,
                      'rating'              => $oRequest->rating,
                      'agent_id'            => $oRequest->agent_id,
                      'latitude'            => $oRequest->latitude,
                      'longitude'           => $oRequest->longitude,
                      'aadharcard_no'       => $oRequest->aadharcard_no,
                      'pan'                 => $oRequest->pan,
                      'voter_id_no'         => $oRequest->voter_id_no,
                      'ration_card_no'      => $oRequest->ration_card_no,
                      'driving_license_no'  => $oRequest->driving_license_no,
                      'passport_no'         => $oRequest->passport_no,
                      'class_id'            => $oRequest->class_id,
                      'created_by'          => $oRequest->agent_id,
                      
                ]);
        if($addResult){
            
           
            return response()->json(['status' => 0,'message' => 'Successful Register Member'], 200);
        }else{
            return response()->json(['status' => 0,'message' => 'Somthing Wrong','data'=>[]], 200);    
        }
    
    }
    
    
     
    public static function get_PaymentCollectionLoan(Request $oRequest){

        $rows = DB::table('loan_emis')
                ->where('status','pending')
                ->where('created_by',$oRequest->agent_id)
                ->where('emi_date','<',date('Y-m-d'))
                ->select('loan_id','due_date','emi_date','emi','interest','outstanding','advance_amount','payment_date', DB::raw('count(*) as total'), DB::raw('SUM(emi) as amount'))
                ->groupBy('loan_id')
                ->orderBy('id', 'DESC')
                ->get();
                
        $data = array();
        
        foreach($rows as $key=>$row){
            
            $loan_details = BusinessLoan::where('uuid',$row->loan_id)->first();
            
            $row->customer_id = @$loan_details->customer_id;
            $row->account_id = @$loan_details->id;
          
            $data[]    = $row;
            
        }
                
        

       if($data){
            
           
            return response()->json(['status' => 0,'message' => 'Successful Register Member','data'=>$data], 200);
        }else{
            return response()->json(['status' => 0,'message' => 'Somthing Wrong','data'=>[]], 200);    
        }
    }
    
    public function get_total_collection_payment(Request $oRequest)
    {
        $user = Admin::where(['id' => $oRequest->agent_id])->first();
        $total_collection_amount  =  Helper::total_PaymentPendingFromAgent($oRequest->agent_id);
        if($user){
            
            return response()->json(['status' => 0,'message' => 'Successful get','total_collection_amount'=>$total_collection_amount], 200);
        }else{
            return response()->json(['status' => 1,'message' => 'No Agent Found','total_collection_amount'=>0], 200);    
        }
        
    }
    
    
     public function getActiveEmployees(Request $request)
    {
        try {
            // Get the status from the query string, default is 'active'
            $status = $request->query('status', 'active');

            // Fetch only 'id' and 'employee_name' of employees with given status
            $employees = Employees::where('status', $status)
                                  ->select('id', 'employee_name')
                                  ->get();

            // Check if employees exist
            if ($employees->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No employees found with the given status.',
                    'status_code' => 404,
                ], 404);
            }

            // Return response as JSON
            return response()->json([
                'success' => true,
                'message' => 'Agent data get Successfully',
                'status_code' => 200,
                'employees' => $employees
            ], 200);

        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Error fetching employees: ' . $e->getMessage());

            // Return JSON error response
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching employees.',
                'status_code' => 500,
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
     public function getClasses(Request $request)
    {
        try {
            // Get the status from the query string, default is 'active'
             $classes   = Helper::getClass();

            // Check if employees exist
            if ($classes->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No classes found .',
                    'status_code' => 404,
                ], 404);
            }

            // Return response as JSON
            return response()->json([
                'success' => true,
                'message' => 'Class data get Successfully',
                'status_code' => 200,
                'classes' => $classes
            ], 200);

        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Error fetching employees: ' . $e->getMessage());

            // Return JSON error response
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching classes.',
                'status_code' => 500,
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    
     public function getNewMember(Request $request)
    {
        try {
            // Get the status from the query string, default is 'active'
            $members = Member::where('delete_status', '0')->where('status', 'Approved')->where('is_active', 'false')->select('id', 'name', 'mobile_no')->get();

            // Check if employees exist
            if ($members->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No Member found .',
                    'status_code' => 404,
                ], 404);
            }

            // Return response as JSON
            return response()->json([
                'success' => true,
                'message' => 'Members data fetched Successfully',
                'status_code' => 200,
                'members' => $members
            ], 200);

        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Error fetching employees: ' . $e->getMessage());

            // Return JSON error response
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching classes.',
                'status_code' => 500,
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
     public function getFixedDepositScheme(Request $request)
    {
        try {
            // Get the status from the query string, default is 'active'
            $fdScheme = FdScheme::where('delete_status', '0')->select('id', 'scheme_name', 'interest_rate')->get();

            // Check if employees exist
            if ($fdScheme->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No FD Scheme found .',
                    'status_code' => 404,
                ], 404);
            }

            // Return response as JSON
            return response()->json([
                'success' => true,
                'message' => 'FD Scheme data fetched Successfully',
                'status_code' => 200,
                'fdScheme' => $fdScheme
            ], 200);

        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Error fetching fd scheme: ' . $e->getMessage());

            // Return JSON error response
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching fd scheme.',
                'status_code' => 500,
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
     public function getRecurringDepositScheme(Request $request)
    {
        try {
            // Get the status from the query string, default is 'active'
            $rdScheme = RdScheme::where('delete_status', '0')->select('id', 'scheme_name', 'interest_rate')->get();

            // Check if employees exist
            if ($rdScheme->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No FD Scheme found .',
                    'status_code' => 404,
                ], 404);
            }

            // Return response as JSON
            return response()->json([
                'success' => true,
                'message' => 'RD Scheme data fetched Successfully',
                'status_code' => 200,
                'rdScheme' => $rdScheme
            ], 200);

        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Error fetching rd scheme: ' . $e->getMessage());

            // Return JSON error response
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching rd scheme.',
                'status_code' => 500,
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
     public function getSavingAccountScheme(Request $request)
    {
        try {
            // Get the status from the query string, default is 'active'
            $savingAccountScheme = SavingScheme::where('delete_status', '0')->select('id', 'scheme_name', 'interest_rate')->get();

            // Check if employees exist
            if ($savingAccountScheme->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No FD Scheme found .',
                    'status_code' => 404,
                ], 404);
            }

            // Return response as JSON
            return response()->json([
                'success' => true,
                'message' => 'Saving Account Scheme data fetched Successfully',
                'status_code' => 200,
                'savingAccountScheme' => $savingAccountScheme
            ], 200);

        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Error fetching saving account scheme: ' . $e->getMessage());

            // Return JSON error response
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching saving account scheme.',
                'status_code' => 500,
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    
     public function storeSavingAccount(Request $request) {
        try {
            // Validate the request
            $validator = Validator::make($request->all(), [
                'application_date'   => 'required|date',
                'customer_id'        => 'required|exists:members,id',
                'scheme_id'          => 'required|exists:saving_schemes,id',
                'agent_id'           => 'required|exists:employees,id',
                'opening_amount'     => 'required|numeric|min:0',
                'available_balance'  => 'required|numeric|min:0',
                'close_date'         => 'nullable|date',
                'status'             => 'required|in:active,inactive',
                'paymode'            => 'required|in:cash,cheque,online',
               
            ]);

            if ($validator->fails()) {
                 return response()->json([
                    'success' => false,
                    'status_code' => 400,
                    'error' => $validator->errors()
                ], 400);
            }

            // Create a new saving account record
            $savingAccount = SavingAccount::create([
                'uuid'               => Str::uuid(),
                'application_date'   => $request->application_date,
                'customer_id'        => $request->customer_id,
                'scheme_id'          => $request->scheme_id,
                'agent_id'           => $request->agent_id,
                'opening_amount'     => $request->opening_amount,
                'available_balance'  => $request->available_balance,
                'close_date'         => $request->close_date,
                'status'             => $request->status,
                'paymode'            => $request->paymode,
                'delete_status'      => $request->delete_status ?? 0,
            
            ]);
            
              return response()->json([
                'success' => true,
                'message' => 'Saving account created successfully',
                'status_code' => 200,
                'savingAccount' => $savingAccount
            ], 200);

        } catch (Exception $e) {
           
              return response()->json([
                  'success' => false,
                  'error'   => 'Something went wrong!',
                 'status_code' => 500,
                 'message' => $e->getMessage()
            ], 500);
        }
    }
    
    
      public function storeRecurringDeposit(Request $request)
    {
        try {
            // Validate request data
            $validator = Validator::make($request->all(), [
                'uuid'              => 'required|unique:recurring_deposits,uuid',
                'application_date'  => 'required|date',
                'customer_id'       => 'required|exists:members,id',
                'scheme_id'         => 'required|exists:rd_schemes,id',
                'agent_id'          => 'required|exists:employees,id',
                'rd_amount'         => 'required|numeric|min:0',
                'rd_frequency'      => 'required|in:monthly,quarterly,half-yearly,yearly',
                'rd_tenure'         => 'required|integer|min:1',
                'maturity_amount'   => 'required|numeric|min:0',
                'maturity_date'     => 'required|date',
                'interest_rate'     => 'required|numeric|min:0',
                'status'            => 'required|in:active,inactive',
                'paymode'           => 'required|in:cash,cheque,online',
                'claose_date'       => 'nullable|date',
                'available_balance' => 'required|numeric|min:0',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation errors',
                     'status_code' => 422,
                    'errors'  => $validator->errors(),
                ], 422);
            }

            // Create a new RecurringDeposit entry
            $recurringDeposit = RecurringDeposit::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Recurring deposit stored successfully',
                 'status_code' => 200,
                'recurringDeposit'    => $recurringDeposit,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!',
                'status_code' => 500,
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
    
    
    public function storeFixedDeposit(Request $request)
    {
        try {
            // Validate Request Data
            $validator = Validator::make($request->all(), [
                'uuid'             => 'required|uuid',
                'customer_id'      => 'required|exists:members,id',
                'scheme_id'        => 'required|exists:fd_schemes,id',
                'agent_id'        => 'required|exists:employees,id',
                'application_date' => 'required|date',
                'fd_amount'        => 'required|numeric|min:0',
                'fd_frequency'     => 'required|string',
                'fd_tenure'        => 'required|integer|min:1',
                'maturity_amount'  => 'required|numeric|min:0',
                'maturity_date'    => 'required|date',
                'status'           => 'required|in:active,inactive',
                'close_date'       => 'nullable|date',
                'paymode'          => 'required|in:cash,cheque,online',
                'interest_rate'    => 'required|numeric|min:0',
                'available_balance'=> 'required|numeric|min:0',
            ]);

            // If validation fails, return errors
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'status_code' => 422,
                    'errors'  => $validator->errors()
                ], 422);
            }

            // Create New Fixed Deposit Entry
            $fixedDeposit = FixedDeposit::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Fixed Deposit created successfully',
                'fixedDeposit'    => $fixedDeposit,
                'status_code' => 200,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!',
                'status_code' => 500,
                'error'   => $e->getMessage()
            ], 500);
        }
    }
    
        public function loanApplication(Request $request)
    {
        try {
            // Validate request data
            $request->validate([
                'opening_date' => 'required|date',
                'customer_id' => 'required|integer',
                'scheme_id' => 'required|integer',
                'agent_id' => 'required|integer',
                'loan_purpose' => 'required|string',
                'loan_amount' => 'required|numeric|min:0',
                'interest_rate' => 'required|numeric|min:0',
                'loan_payout' => 'required|string',
                'loan_tenure' => 'required|integer|min:1',
                'loan_type' => 'required|in:flat,reducing',
                'witness_name_1' => 'nullable|string|max:255',
                'witness_address_1' => 'nullable|string',
                'witness_name_2' => 'nullable|string|max:255',
                'witness_address_2' => 'nullable|string',
            ]);

            // Store data
            $loanApplication = LoanApplication::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Loan application created successfully',
                 'status_code' => 200,
                'data' => $loanApplication
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                 'status_code' => 200,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function getCollactLoanData(Request $request)
    {
        try {
            // Get the status from the query string, default is 'active'
                $emiPayout = "daily";
                $currentDate = Carbon::today()->toDateString(); // Get the current date (YYYY-MM-DD)
                $demandSheet = ActiveLoan::where('delete_status', '0')
               ->where(function ($query) use ($currentDate, $emiPayout) {
                $query->where('next_due_date', $currentDate)
                      ->orWhere('emi_payout', $emiPayout);
            })->get();
        

            // Check if employees exist
            if ($demandSheet->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No active loan found .',
                    'status_code' => 404,
                ], 404);
            }

            // Return response as JSON
            return response()->json([
                'success' => true,
                'message' => 'Data fetched Successfully',
                'status_code' => 200,
                'data' => $demandSheet
            ], 200);

        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Error fetching acctive loan: ' . $e->getMessage());

            // Return JSON error response
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching saving account scheme.',
                'status_code' => 500,
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
     
    

}
