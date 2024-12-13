<?php
namespace App\Helpers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Country;
use App\Models\LedgerTpye;
use App\Models\LedgerGroup;
use App\Models\Ledger;
use App\Models\VouchersDetails;
use App\Models\Vouchers;
use App\Models\Admin;
use App\Models\State;
use App\Models\City;
use App\Models\TransferShareCertificates;
use App\Models\AllocateShareCertificates;
use App\Models\DirectorPromoters;
use App\Models\Scheme;
use App\Models\SavingAccount;
use App\Models\TransationHistory;
use App\Models\Bank;
use App\Models\AgentRank;
use App\Models\RecurringScheme;
use App\Models\RecurringDeposit;
use App\Models\RecurringDepositEmi;
use App\Models\FixedDepositScheme;
use App\Models\FixedDeposit;
use App\Models\LoanScheme;
use App\Models\LoanSchemePenaltyCharts;
use App\Models\BusinessLoan;
use App\Models\LoanEmi;
use App\Models\Classes;
use Auth;
use Carbon\Carbon;
use DB;



class Helper{
    
     public static function getBranches(){
        $query = Admin::query();
        $rows = $query->where('delete_status','0')
                ->select('id','name')
                ->where('status','active')
                ->where('user_type','branch')
                ->orderBy('id', 'DESC')
                ->get();
        return $rows;
    }
    
     public static function get_active_customer(){
        $query = User::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->where('delete_status','0')->orderBy('id', 'DESC')->get();
        return $rows;
    }
    


     public static function GetTotalMembersCount(){
        $query = User::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->where('delete_status','0')->where('status','active')->orderBy('id', 'DESC')->count();
        return $rows;
    }
     
     public static function GetPendingMembersCount(){
        $query = User::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->where('delete_status','0')->where('status','inactive')->orderBy('id', 'DESC')->count();
        return $rows;
    }
    
    public static function get_SavingAccouuntPendingCount(){
        $query = SavingAccount::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->with('customer','scheme')
                        ->where('delete_status','0')
                        ->where('status','pending')
                        ->orderBy('id', 'DESC')->count();
        return $rows;
    }
    
     public static function get_PendingTransationCount(){
        $query = TransationHistory::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->with('customer','account','ledger')
                        ->where('delete_status','0')
                        ->whereIn('tran_page_type', ['saving'])
                        ->where('status','pending')
                        ->orderBy('id', 'DESC')->count();
        return $rows;
    }
    
     public static function get_TotalPendingLoanEMI(){
         
        $query = LoanEmi::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->where('delete_status','0')
                        ->where('status','pending')
                        ->where('emi_date','<',date('Y-m-d'))
                        ->sum('emi');

       

        return $rows;
    }


    
     public static function GetMembers(){
        $query = User::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->where('delete_status','0')->orderBy('id', 'DESC')->get();
        return $rows;
    }
    
    public static function slugify($text)
    {
        $divider = '-';
      // replace non letter or digits by divider
      $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      // trim
      $text = trim($text, $divider);

      // remove duplicate divider
      $text = preg_replace('~-+~', $divider, $text);

      // lowercase
      $text = strtolower($text);

      if (empty($text)) {
        return 'n-a';
      }

      return $text;
    }

    public static function UploadMedia($file_name,$sDestinationPath)
    {
        $oUploadedImage     = $file_name;
        $sExtension         = $oUploadedImage->getClientOriginalExtension(); // getting image extension
        $sFileName          = 'IMG_'.time().'.'.$sExtension; // renameing image
        $is_uploded         = $oUploadedImage->move($sDestinationPath, $sFileName); // uploading file to given path
        if($is_uploded)
        {
            return $sFileName;
        }else{
            return '';
        }
    }

    public static function DocUploadMedia($file_name,$sDestinationPath)
    {
        $oUploadedImage     = $file_name;
        $sExtension         = $oUploadedImage->getClientOriginalExtension(); // getting image extension
        $sFileName          = 'Doc_'.time().'.'.$sExtension; // renameing image
        $is_uploded         = $oUploadedImage->move($sDestinationPath, $sFileName); // uploading file to given path
        if($is_uploded)
        {
            return $sFileName;
        }else{
            return '';
        }
    }

    public static function getClass(){
        $rows = Classes::where('delete_status','0')
                    ->where('status','active')
                    ->orderBy('title', 'ASC')
                    ->get();
        return $rows;
    }
    
    public static function getState(){
        $rows = State::where('delete_status','0')
                    ->where('status','active')
                    ->orderBy('title', 'ASC')
                    ->get();
        return $rows;
    }
    public static function getAgentRank(){
        $rows = AgentRank::where('delete_status','0')
                    ->where('status','active')
                    ->orderBy('title', 'ASC')
                    ->get();
        return $rows;
    }

     public static function getCity_ByState($stateID){
        $rows = City::where('delete_status','0')
                    ->where('status','active')
                    ->where('state_id',$stateID)
                    ->orderBy('title', 'ASC')
                    ->get();
        return $rows;
    }

    public static function getCategory(){
        $rows = Category::where('delete_status','0')
                    ->where('status','active')
                    ->orderBy('title', 'ASC')
                    ->get();
        return $rows;
    }

    public static function getCountry(){
        $rows = Country::where('delete_status','0')
                    ->where('status','active')
                    ->orderBy('title', 'ASC')
                    ->get();
        return $rows;
    }

    public static function getLedgerType(){
        $rows = LedgerTpye::where('delete_status','0')
                    ->where('status','active')
                    ->orderBy('title', 'ASC')
                    ->get();
        return $rows;
    }

    public static function getLedgerGroup(){
        $rows = LedgerGroup::where('delete_status','0')
                    ->where('status','active')
                    ->orderBy('title', 'ASC')
                    ->get();
        return $rows;
    }

    public static function getLedger(){
        $rows = Ledger::where('delete_status','0')
                    ->where('status','active')
                    ->orderBy('title', 'ASC')
                    ->get();
        return $rows;
    }

    public static function getBank(){
        $rows = Bank::where('delete_status','0')
                    ->where('status','active')
                    ->orderBy('title', 'ASC')
                    ->get();
        return $rows;
    }
    
     public static function get_Vouchers_number(){
         
        $BranchCode = Helper::get_branch_code();
        $VouchersNumberDetails = Vouchers::orderBy('id','desc')->where('created_by',Auth::guard('admin')->user()->id)->first();
        $VouchersNumber = 11000;
        if($VouchersNumberDetails){
            $VouchersNumber = $VouchersNumberDetails->unique_number + 1;
        }
        
        $output['unique_no'] =  $VouchersNumber;
        $output['voucher_no'] =  $BranchCode.'-'.$VouchersNumber;
        
        return $output;
    }

    public static function get_MemberShipFeeTransation($custID){
        $query = TransationHistory::query();
        $query->where('customer_id',$custID);    
        $rows = $query->where('delete_status','0')
                        ->whereIn('tran_page_type', ['MemberShipFee'])
                        ->orderBy('id', 'DESC')->get();
        return $rows;
    }

    public static function get_allocate_number(){
        
        $CustomerCode = AllocateShareCertificates::orderBy('id','desc')->where('created_by',Auth::guard('admin')->user()->id)->first();
        $NewCustomerCode = 1;
        if($CustomerCode){
            $NewCustomerCode = $CustomerCode->lot_number + 1;
        }
        $NewCustomerCode = sprintf('%04d', $NewCustomerCode);
        $CustomerCode =  $NewCustomerCode;
        return $CustomerCode;
    }

    public static function get_Transfer_number(){
        
        $CustomerCode = TransferShareCertificates::orderBy('id','desc')->where('created_by',Auth::guard('admin')->user()->id)->first();
        $NewCustomerCode = 1;
        if($CustomerCode){
            $NewCustomerCode = $CustomerCode->lot_number + 1;
        }
        $NewCustomerCode = sprintf('%04d', $NewCustomerCode);
        $CustomerCode =  $NewCustomerCode;
        return $CustomerCode;
    }
    
    public static function app_Customer_number($agent_id){
         
        
        
        $agentDetails = Admin::where('delete_status','0')->where('id',$agent_id)->first();
        $rows = Admin::where('delete_status','0')->where('created_by',$agentDetails->created_by)->first();
        $BranchCode = $rows->branch_code;
        
        $CustomerCode = User::orderBy('id','desc')->where('created_by',$agent_id)->first();
        $NewCustomerCode = 1;
        if($CustomerCode){
            $NewCustomerCode = $CustomerCode->id + 1;
        }
        $NewCustomerCode = sprintf('%06d', $NewCustomerCode);
        $CustomerCode =  $BranchCode.''.$NewCustomerCode;
        $output['customer_code'] = $CustomerCode;
        $output['folio_code']    =  $NewCustomerCode;
        
        return $output;
    }
    
    

    public static function get_Customer_number(){
         
        $BranchCode = Helper::get_branch_code();
        $CustomerCode = User::orderBy('id','desc')->where('created_by',Auth::guard('admin')->user()->id)->first();
        $NewCustomerCode = 1;
        if($CustomerCode){
            $NewCustomerCode = $CustomerCode->id + 1;
        }
        $NewCustomerCode = sprintf('%06d', $NewCustomerCode);
        $CustomerCode =  $BranchCode.''.$NewCustomerCode;
        $output['customer_code'] = $CustomerCode;
        $output['folio_code']    =  $NewCustomerCode;
        
        return $output;
    }

    public static function get_SevingAccount_number(){
         
        $Code = 'SAA';
        $SavingAccount = SavingAccount::orderBy('id','desc')->where('created_by',Auth::guard('admin')->user()->id)->first();
        $NewCustomerCode = 100000;
        if($SavingAccount){
            $NewCustomerCode = $SavingAccount->application_unique + 1;
        }
        $NewApplicationCode = sprintf('%06d', $NewCustomerCode);
        $ApplicationCode =  $Code.''.$NewApplicationCode;
        $output['application_mo'] = $ApplicationCode;
        $output['application_unique']    =  $NewCustomerCode;
        
        return $output;
    }
    
    public static function app_get_SevingAccount_number(){
         
        $Code = 'SAA';
        $SavingAccount = SavingAccount::orderBy('id','desc')->first();
        $NewCustomerCode = 100000;
        if($SavingAccount){
            $NewCustomerCode = $SavingAccount->application_unique + 1;
        }
        $NewApplicationCode = sprintf('%06d', $NewCustomerCode);
        $ApplicationCode =  $Code.''.$NewApplicationCode;
        $output['application_mo'] = $ApplicationCode;
        $output['application_unique']    =  $NewCustomerCode;
        
        return $output;
    }

     public static function get_recurringDeposits_number(){
         
        $Code = 'RD';
        $SavingAccount = RecurringDeposit::orderBy('id','desc')->where('created_by',Auth::guard('admin')->user()->id)->first();
        $NewCustomerCode = 5000;
        if($SavingAccount){
            $NewCustomerCode = $SavingAccount->application_unique + 1;
        }
        $NewApplicationCode = sprintf('%06d', $NewCustomerCode);
        $ApplicationCode =  $Code.''.$NewApplicationCode;
        $output['application_mo'] = $ApplicationCode;
        $output['application_unique']    =  $NewCustomerCode;
        
        return $output;
    }

    public static function CreateSevingAccountNo(){
         
        $AccountNo = rand(11111111111,99999999999);
        return $AccountNo;
    }
    
    public static function get_branch_code(){
        $rows = Admin::where('delete_status','0')->where('id',Auth::guard('admin')->user()->id)->first();
        return $rows->branch_code;
    }
        
    public static function get_Director_number(){
         
        $BranchCode = Helper::get_branch_code();
        $CustomerCode = DirectorPromoters::orderBy('id','desc')->where('created_by',Auth::guard('admin')->user()->id)->first();
        $NewCustomerCode = 1000000;
        if($CustomerCode){
            $NewCustomerCode = $CustomerCode->id + 1;
        }
        $NewCustomerCode = sprintf('%06d', $NewCustomerCode);
        $CustomerCode =  $BranchCode.''.$NewCustomerCode;
        $output['customer_code'] = $CustomerCode;
        $output['folio_code']    =  $NewCustomerCode;
        
        return $output;
    }
     public static function getTrialBalanace($data){
        $query = VouchersDetails::query();
        
        if(isset($data['ledger_id']) && $data['ledger_id'] != ''){
            $query->where('debit_ledger_account_id',$data['ledger_id']);
            $query->orwhere('credit_ledger_account_id',$data['ledger_id']);
        }
        
        if(isset($data['start_date']) && $data['start_date'] != '' && $data['end_date'] == ''){
            $query->whereDate('created_at','=', $data['start_date']);
        }
        
        if(isset($data['end_date']) && $data['end_date'] != ''){
           $query->whereBetween('created_at', [$data['start_date'], $data['end_date']]);
        }
        
        /* Cashbook page */
        if(isset($_REQUEST['start_date']) && $_REQUEST['start_date'] != '' && $_REQUEST['end_date'] == ''){
            $query->whereDate('transation_date',$_REQUEST['start_date']);    
        }
        if(isset($_REQUEST['end_date']) && $_REQUEST['end_date'] != ''){
           
            $query->whereBetween('transation_date', [$_REQUEST['start_date'],$_REQUEST['end_date']]);
        }
        /* Cashbook page */
        
        $query->where('created_by',Auth::guard('admin')->user()->id);
        $rows = $query->with('DebitledgerAccount','CreditledgerAccount','voucher','createdBy')->get();
        return $rows;
    }
    
    public static function getLedgerTrialBalance($data){
        $query = Ledger::query();
       
        if(isset($data['ledger_id']) && $data['ledger_id'] != ''){
            $query->where('id',$data['ledger_id']);
        }
        
        if(isset($data['start_date']) && $data['start_date'] != '' && $data['end_date'] == ''){
            $query->whereDate('created_at','=', $data['start_date']);
        }
        
        if(isset($data['end_date']) && $data['end_date'] != ''){
           $query->whereBetween('created_at', [$data['start_date'], $data['end_date']]);
        }
        
        $query->where('created_by',Auth::guard('admin')->user()->id);
        
        $rows = $query->where('delete_status','0')->get();
        return $rows;
    }
    
    
    public static function get_ledgers(){
        $query = Ledger::query();
       
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        
        $rows = $query->with('ledgerTpye','ledgerGroup')->where('delete_status','0')->orderBy('id', 'DESC')->get();
        return $rows;
    }

    public static function get_vouchers(){
        $query = Vouchers::query();
       
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        
        $rows = $query->with('Vouchersdebitledger')->where('delete_status','0')->orderBy('id', 'DESC')->get();
        return $rows;
    }

    public static function get_PendingTransation(){
        $query = TransationHistory::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->with('customer','account','ledger')
                        ->where('delete_status','0')
                        ->whereIn('tran_page_type', ['saving','loan','recurring'])
                        ->where('status','pending')
                        ->orderBy('id', 'DESC')->get();
        return $rows;
    }
    
    public static function get_PaymentPendingFromAgent($agentId){
      
        $query = TransationHistory::query();
        $query->where('user_id',$agentId);    
        $rows = $query->with('customer','account','ledger')
                        ->where('delete_status','0')
                        ->whereIn('tran_page_type', ['loan'])
                        ->where('agent_payment_status','pending')
                        ->orderBy('id', 'DESC')->get();
       
       
        return $rows;
    }
    
    public static function total_PaymentPendingFromAgent($agentId){
      
        $query = TransationHistory::query();
        $query->where('user_id',$agentId);    
        $rows = $query->with('customer','account','ledger')
                        ->where('delete_status','0')
                        ->whereIn('tran_page_type', ['loan','saving','recurring'])
                        ->where('agent_payment_status','pending')
                        ->orderBy('id', 'DESC')->sum('amount');
       
       
        return $rows;
    }
    
   
    
    
    public static function CheckExistPendingTransation($accountID){
        $query = TransationHistory::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->with('customer','account','ledger')
                        ->where('delete_status','0')
                        ->where('account_id',$accountID)
                        ->whereIn('tran_page_type', ['saving'])
                        ->where('status','pending')
                        ->orderBy('id', 'DESC')->get();
        return $rows;
    }
    
    
    
    
    
    public static function get_TransationByAccount($accuntId){
        $query = TransationHistory::query();
        $query->where('account_id',$accuntId);
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->with('customer','account','ledger')
                        ->where('delete_status','0')
                        ->whereIn('tran_page_type', ['saving'])
                        ->whereIn('status', ['completed', 'pending'])

                        ->orderBy('id', 'DESC')->get();
        return $rows;
    }
    
    public static function get_RD_TransationByAccount($accuntId){
        $query = TransationHistory::query();
        $query->where('account_id',$accuntId);
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->with('customer','rd_account','ledger')
                        ->where('delete_status','0')
                        ->whereIn('tran_page_type', ['recurring'])
                        ->whereIn('status', ['completed', 'pending'])

                        ->orderBy('id', 'DESC')->get();
        return $rows;
    }
    
    public static function get_Pending_RD_Transation(){
        $query = TransationHistory::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->with('customer','rd_account','ledger')
                        ->where('delete_status','0')
                        ->whereIn('tran_page_type', ['recurring'])
                        ->where('status','pending')
                        ->orderBy('id', 'DESC')->get();
        return $rows;
    }
    
    public static function get_single_ledgers($id){
        $query = Ledger::query();
       
        if($id != ''){
            $query->where('id',$id);    
        }
        
        $rows = $query->where('delete_status','0')->first();
        return $rows;
    }

    public static function generate_uuid() {
        return sprintf( '%04x-%04x-%04x-%04x-%04x',
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0C2f ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0x2Aff )
        );

    }

    public static function GetTransferShareCertificates(){
        $query = TransferShareCertificates::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->with('memberDetails','memberFromDetails')->where('delete_status','0')->orderBy('id', 'DESC')->get();
        return $rows;
    }
    public static function GetAllocateShareCertificates(){
        $query = AllocateShareCertificates::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->with('memberDetails')->where('delete_status','0')->orderBy('id', 'DESC')->get();
        return $rows;
    }
    public static function GetAllocateShareCertificatesByMember($custID){
        $query = AllocateShareCertificates::query();
        $query->where('member_id',$custID);    
        $rows = $query->with('memberDetails')->where('delete_status','0')->orderBy('id', 'DESC')->get();
        return $rows;
    }
    public static function GetTransaferShareCertificatesByMember($custID){
        $query = TransferShareCertificates::query();
        $query->where('member_id',$custID);    
        $rows = $query->with('memberDetails','memberFromDetails')->where('delete_status','0')->orderBy('id', 'DESC')->get();
        return $rows;
    }


     public static function get_director_promoters(){
        $query = DirectorPromoters::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->where('delete_status','0')->orderBy('id', 'DESC')->get();
        return $rows;
    }

     
    

    /* Start  :: Seving acoount function */

    public static function get_SavingAccouunt(){
        $query = SavingAccount::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->with('customer','scheme')->where('delete_status','0')->orderBy('id', 'DESC')->get();
        return $rows;
    }

     public static function get_SavingAccouuntPending(){
        $query = SavingAccount::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->with('customer','scheme')
                        ->where('delete_status','0')
                        ->where('status','pending')
                        ->orderBy('id', 'DESC')->get();
        return $rows;
    }

     public static function get_PendingVoucherEntry(){
        $query = SavingAccount::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->with('customer','scheme')
                        ->where('delete_status','0')
                        ->where('status','pending')
                        ->orderBy('id', 'DESC')->get();
        return $rows;
    }


     public static function get_PendingMembers(){
        $query = User::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->where('delete_status','0')
                        ->where('status','inactive')
                        ->orderBy('id', 'DESC')->get();
        return $rows;
    }

    public static function get_PaymentCollectionDeposite(){

        $rows = DB::table('recurring_deposit_emis')
                ->where('created_by',Auth::guard('admin')->user()->id)
                ->where('due_date','<',date('Y-m-d'))
                ->select('recurring_deposit_id','due_date','to_date','amount','interest','maturity_amount','advance_amount','payment_date', DB::raw('count(*) as total'), DB::raw('SUM(amount) as total_amount'))
                ->groupBy('recurring_deposit_id')
                ->get();

        return $rows;
    }
    
    public static function get_SavingAccouuntAll(){
        $query = SavingAccount::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->with('customer','scheme')
                        ->where('delete_status','0')
                        ->where('status','approved')
                        ->orderBy('id', 'DESC')->get();
        return $rows;
    }

    public static function get_ApprovedSavingAccouunt(){
        $query = SavingAccount::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->with('customer','scheme')->where('status','approved')->where('delete_status','0')->orderBy('id', 'DESC')->get();
        return $rows;
    }
    
    public static function get_customer_ApprovedSavingAccouunt($custID){
        $query = SavingAccount::query();
        $query->where('customer_id',$custID);    
        $rows = $query->with('customer','scheme')->where('status','approved')->where('delete_status','0')->orderBy('id', 'DESC')->get();
        return $rows;
    }


    /* End  :: Seving acoount function */


    /* Start  :: Scheme function */
    public static function get_scheme(){
        $query = Scheme::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->where('delete_status','0')->orderBy('id', 'DESC')->get();
        return $rows;
    }

    public static function get_scheme_list(){
        $query = Scheme::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->where('delete_status','0')
                        ->where('delete_status','0')
                        ->orderBy('id', 'DESC')
                        ->get();
        return $rows;
    }
    /* End  :: Scheme function */
    
    
    
    

  
    public static function getToken(){
        $token = substr(md5(mt_rand()), 0, 10);
        return $token;
    }

    public static function getFromDate($value) {
        if($value != ''){
            return \Carbon\Carbon::parse($value)->format('d M Y');    
        }else{
            $blank = '';
            return $blank;
        }
        
    }
    public static function getFromDate_simple($value) {
        if($value != ''){
            return \Carbon\Carbon::parse($value)->format('d-m-Y');
        }else{
            $blank = '';
            return $blank;
        }
    }
    public static function getFromDateForDatabase($value) {
        
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }



    public static function  TransationDetails($data){
        $user = TransationHistory::create([
            'type'                      => @$data['type'],  //deport,widthow,
            'user_type'                 => @$data['user_type'], //agent,system,user,admin
            'user_id'                   => @$data['user_id'],
            'customer_id'               => @$data['customer_id'],
            'account_id'                => @$data['account_id'],
            'transation_type'           => @$data['transation_type'],  //credit,debit
            'amount'                    => @$data['amount'],
            'transation_date'           => @$data['transation_date'],
            'remarks'                   => @$data['remarks'],
            'payment_mode'              => @$data['payment_mode'],
            'bank_id'                   => @$data['bank_id'],
            'cheque_no'                 => @$data['cheque_no'],
            'reference_no'              => @$data['reference_no'],
            'cheque_date'               => @$data['cheque_date'],
            'bank_account_ledger_id'    => @$data['bank_account_ledger_id'],
            'status'                    => @$data['status'],
            'close_status'              => @$data['closestatus'],
            'tran_page_type'           => @$data['tran_page_type'],
            'created_by'                => Auth::guard('admin')->user()->id,
        ]);

        if($user){
            return true;
        }else{
            return false;
        }
    }
    
    public static function  App_TransationDetails($data){
          
        $branchAdmin  = Admin::where('id',$data['user_id'])->first();
        $branchID = @$data['user_id'];
        if($branchAdmin){
            $branchID = $branchAdmin->created_by;
        }
        
        $user = TransationHistory::create([
            'type'                      => @$data['type'],  //deport,widthow,
            'user_type'                 => @$data['user_type'], //agent,system,user,admin
            'user_id'                   => @$data['user_id'],
            'customer_id'               => @$data['customer_id'],
            'account_id'                => @$data['account_id'],
            'transation_type'           => @$data['transation_type'],  //credit,debit
            'amount'                    => @$data['amount'],
            'transation_date'           => @$data['transation_date'],
            'remarks'                   => @$data['remarks'],
            'payment_mode'              => @$data['payment_mode'],
            'bank_id'                   => @$data['bank_id'],
            'cheque_no'                 => @$data['cheque_no'],
            'reference_no'              => @$data['reference_no'],
            'cheque_date'               => @$data['cheque_date'],
            'bank_account_ledger_id'    => @$data['bank_account_ledger_id'],
            'status'                    => @$data['status'],
            'close_status'              => @$data['closestatus'],
            'tran_page_type'            => @$data['tran_page_type'],
            'created_by'                => @$branchID,
        ]);

        if($user){
            return true;
        }else{
            return false;
        }
    }

     public static function getAgents(){
        $query = Admin::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->with('state','city','agent_rank')->where('delete_status','0')->where('user_type','agent')->orderBy('id', 'DESC')->get();
        return $rows;
    }


    /* Start  :: Recurring Scheme function */
    public static function getRecurringScheme(){
        $query = RecurringScheme::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
           // $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->where('delete_status','0')->orderBy('id', 'DESC')->get();
        return $rows;
    }


     public static function get_rd_scheme_list(){
        $query = RecurringScheme::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->where('delete_status','0')
                        ->where('delete_status','0')
                        ->orderBy('id', 'DESC')
                        ->get();
        return $rows;
    }

    /* End  :: Recurring Scheme function */


     /* Start  :: Loan Scheme function */
    public static function getLoanScheme(){
        $query = LoanScheme::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
           // $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->where('delete_status','0')->orderBy('id', 'DESC')->get();
        return $rows;
    }


     public static function get_loan_scheme_list(){
        $query = LoanScheme::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->where('delete_status','0')
                        ->where('delete_status','0')
                        ->orderBy('id', 'DESC')
                        ->get();
        return $rows;
    }
    /* End  :: Recurring Scheme function */


    


      /* Start  :: RecurringDeposit function */
        public static function Get_RecurringDeposit(){
            $query = RecurringDeposit::query();
            if(Auth::guard('admin')->user()->user_type != 'admin'){
                $query->where('created_by',Auth::guard('admin')->user()->id);    
            }
            $rows = $query->where('delete_status','0')->orderBy('id', 'DESC')->get();
            return $rows;
        }

        public static function Get_RecurringDepositPending(){
            $query = RecurringDeposit::query();
            if(Auth::guard('admin')->user()->user_type != 'admin'){
                $query->where('created_by',Auth::guard('admin')->user()->id);    
            }
            $rows = $query->where('delete_status','0')->where('status','pending')->orderBy('id', 'DESC')->get();
            return $rows;
        }
        public static function Get_RecurringDepositApproved(){
            $query = RecurringDeposit::query();
            if(Auth::guard('admin')->user()->user_type != 'admin'){
                $query->where('created_by',Auth::guard('admin')->user()->id);    
            }
            $rows = $query->where('delete_status','0')->where('status','approved')->orderBy('id', 'DESC')->get();
            return $rows;
        }

        public static function Get_Paid_RecurringDepositTotal($accountID){
            $query = RecurringDepositEmi::query();
            $query->where('recurring_deposit_id',$accountID);    
            $rows = $query->where('delete_status','0')->where('status','pending')->sum('amount');
            return $rows;
        }

        public static function Get_Pending_RecurringDepositTotal($accountID){
            $query = RecurringDepositEmi::query();
            $query->where('recurring_deposit_id',$accountID);    
            $rows = $query->where('delete_status','0')->where('status','paid')->sum('amount');
            return $rows;
        }

         public function RecurringDepositDetails($uuid){
            $row  = RecurringDeposit::with('customer','agent')->where('uuid',$uuid)->first();
            return $row;
        }


        /* End  :: RecurringDeposit function */
        
        
        /*  Start :: Loan EMI Function  */
        public static function Get_Paid_LoanAccountTotal($accountID){
            $query = LoanEmi::query();
            $query->where('loan_id',$accountID);    
            $rows = $query->where('delete_status','0')->where('status','pending')->sum('emi');
            return $rows;
        }
        
        public static function Get_Pending_LoanAccountTotal($accountID){
            $query = LoanEmi::query();
            $query->where('loan_id',$accountID);    
            $rows = $query->where('delete_status','0')->where('status','paid')->sum('emi');
            return $rows;
        }
        
        /*  Start :: Loan EMI Function  */
        
        
        



        /* Start Fixed Deposit */

          public static function Get_FixedDeposits(){
            $query = FixedDeposit::query();
            if(Auth::guard('admin')->user()->user_type != 'admin'){
                $query->where('created_by',Auth::guard('admin')->user()->id);    
            }
            $rows = $query->where('delete_status','0')->orderBy('id', 'DESC')->get();
            return $rows;
        }

        public static function get_FixedDeposits_number(){
             
            $Code = 'FD';
            $SavingAccount = FixedDeposit::orderBy('id','desc')->where('created_by',Auth::guard('admin')->user()->id)->first();
            $NewCustomerCode = 5000;
            if($SavingAccount){
                $NewCustomerCode = $SavingAccount->application_unique + 1;
            }
            $NewApplicationCode = sprintf('%06d', $NewCustomerCode);
            $ApplicationCode =  $Code.''.$NewApplicationCode;
            $output['application_mo'] = $ApplicationCode;
            $output['application_unique']    =  $NewCustomerCode;
            
            return $output;
        }

        public static function get_fd_scheme_list(){
            $query = FixedDepositScheme::query();
            if(Auth::guard('admin')->user()->user_type != 'admin'){
                $query->where('created_by',Auth::guard('admin')->user()->id);    
            }
            $rows = $query->where('delete_status','0')
                            ->where('delete_status','0')
                            ->orderBy('id', 'DESC')
                            ->get();
            return $rows;
        }

        public static function Get_FixedDepositPending(){
            $query = FixedDeposit::query();
            if(Auth::guard('admin')->user()->user_type != 'admin'){
                $query->where('created_by',Auth::guard('admin')->user()->id);    
            }
            $rows = $query->where('delete_status','0')->where('status','pending')->orderBy('id', 'DESC')->get();
            return $rows;
        }

         public static function Get_FixedDepositApproved(){
            $query = FixedDeposit::query();
            if(Auth::guard('admin')->user()->user_type != 'admin'){
                $query->where('created_by',Auth::guard('admin')->user()->id);    
            }
            $rows = $query->where('delete_status','0')->where('status','approved')->orderBy('id', 'DESC')->get();
            return $rows;
        }

         public static function get_Pending_FD_Transation(){
                $query = TransationHistory::query();
                if(Auth::guard('admin')->user()->user_type != 'admin'){
                    $query->where('created_by',Auth::guard('admin')->user()->id);    
                }
                $rows = $query->with('customer','fd_account','ledger')
                                ->where('delete_status','0')
                                ->whereIn('tran_page_type', ['fixedDeposit'])
                                ->where('status','pending')
                                ->orderBy('id', 'DESC')->get();
                return $rows;
            }
            
            public static function get_FD_TransationByAccount($accuntId){
                $query = TransationHistory::query();
                $query->where('account_id',$accuntId);
                if(Auth::guard('admin')->user()->user_type != 'admin'){
                    $query->where('created_by',Auth::guard('admin')->user()->id);    
                }
                $rows = $query->with('customer','rd_account','ledger')
                                ->where('delete_status','0')
                                ->whereIn('tran_page_type', ['fixedDeposit'])
                                ->whereIn('status', ['completed', 'pending'])
        
                                ->orderBy('id', 'DESC')->get();
                return $rows;
            }


        /* End : Fixed Deposit */

        
    public static function GetRD_Calculation($oRequest)
    {

        $Final_Principal = 0;
        $Final_InterestEarned = 0;
        $Final_MaturityAmount = 0;
        $Final_MaturityDate    = '';

        $rdCalcualtionArr = array();

        if($oRequest->rd_frequency == 'daily'){

            if($oRequest->rd_tenure != ''){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $CloseingDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $OpeningAmount = $oRequest->rd_amount;
              
                $IntestCalculation = 0;
                $IntestAmount = 0;
                $MaturityAmount = 0;
                $Final_IntestAmount = 0;

                for ($i=1; $i <= $oRequest->rd_tenure; $i++) { 

                    $Final_Principal    += $oRequest->rd_amount;
                    $IntestCalculation   = $Final_Principal * $oRequest->interest_rate / 100;
                    $Final_IntestAmount  = $IntestCalculation / 365; 
                    
                    $InterestDueDate =  Carbon::parse($oRequest->opening_date)->addDays($i)->format('d-m-Y');
                    $MaturityAmount = $OpeningAmount + $Final_IntestAmount;

                    $rdCalcualtionObj['dueDate']                    = $OpeningDate;
                    $rdCalcualtionObj['CloseDate']                  = $CloseingDate;
                    $rdCalcualtionObj['period']                     = $OpeningDate.' - '.$CloseingDate;
                    $rdCalcualtionObj['total_amount']               = round($OpeningAmount,2);
                    $rdCalcualtionObj['comp_interest']              = '';//round($Final_IntestAmount,2);
                    $rdCalcualtionObj['interest']                   = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['maturity_amount']            = round($MaturityAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = $InterestDueDate;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningDate =  Carbon::parse($oRequest->opening_date)->addDays($i)->format('d-m-Y');
                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->addDays($i)->format('d-m-Y');
                    $OpeningAmount = $OpeningAmount + $oRequest->rd_amount;

                    $Final_InterestEarned += $Final_IntestAmount;
                    $Final_MaturityAmount = $MaturityAmount;
                    $Final_MaturityDate   = $InterestDueDate;
                }
                $Final_MaturityAmount = $Final_InterestEarned + $Final_Principal;
            }

        }else if($oRequest->rd_frequency == '10_days'){

            if($oRequest->rd_tenure != ''){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $CloseingDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $OpeningAmount = $oRequest->rd_amount;
              
                $IntestCalculation = 0;
                $IntestAmount = 0;
                $MaturityAmount = 0;
                $Final_IntestAmount = 0;
                $rd_frequency_days  = 0;
                $Final_IntestAmount_Days   = 0;


                for ($i=1; $i <= $oRequest->rd_tenure; $i++) { 

                    $Final_Principal    += $oRequest->rd_amount;
                    $IntestCalculation          = $Final_Principal * $oRequest->interest_rate / 100;
                    $Final_IntestAmount_Days    = $IntestCalculation / 365; 
                    $Final_IntestAmount         = $Final_IntestAmount_Days * 10;

                    $rd_frequency_days          = $rd_frequency_days + 10;
                    
                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->subDays(1)->addDays($rd_frequency_days)->format('d-m-Y');
                    $InterestDueDate =  Carbon::parse($oRequest->opening_date)->addDays($i)->format('d-m-Y');
                    $MaturityAmount = $OpeningAmount + $Final_IntestAmount;

                    $rdCalcualtionObj['dueDate']                    = $OpeningDate;
                    $rdCalcualtionObj['CloseDate']                  = $CloseingDate;
                    $rdCalcualtionObj['period']                     = $OpeningDate.' - '.$CloseingDate;
                    $rdCalcualtionObj['total_amount']               = round($OpeningAmount,2);
                    $rdCalcualtionObj['comp_interest']              = '';//round($Final_IntestAmount,2);
                    $rdCalcualtionObj['interest']                   = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['maturity_amount']            = round($MaturityAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = $InterestDueDate;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningDate =  Carbon::parse($oRequest->opening_date)->addDays($rd_frequency_days)->format('d-m-Y');
                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->addDays($rd_frequency_days)->format('d-m-Y');
                    $OpeningAmount = $OpeningAmount + $oRequest->rd_amount;

                    $Final_InterestEarned += $Final_IntestAmount;
                    $Final_MaturityAmount = $MaturityAmount;
                    $Final_MaturityDate   = $InterestDueDate;
                }
                $Final_MaturityAmount = $Final_InterestEarned + $Final_Principal;
            }


        }else if($oRequest->rd_frequency == '14_days'){


            if($oRequest->rd_tenure != ''){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $CloseingDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $OpeningAmount = $oRequest->rd_amount;
              
                $IntestCalculation = 0;
                $IntestAmount = 0;
                $MaturityAmount = 0;
                $Final_IntestAmount = 0;
                $rd_frequency_days  = 0;
                $Final_IntestAmount_Days   = 0;


                for ($i=1; $i <= $oRequest->rd_tenure; $i++) { 

                    $Final_Principal    += $oRequest->rd_amount;
                    $IntestCalculation          = $Final_Principal * $oRequest->interest_rate / 100;
                    $Final_IntestAmount_Days    = $IntestCalculation / 365; 
                    $Final_IntestAmount         = $Final_IntestAmount_Days * 14;

                    $rd_frequency_days          = $rd_frequency_days + 14;
                    
                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->subDays(1)->addDays($rd_frequency_days)->format('d-m-Y');
                    $InterestDueDate =  Carbon::parse($oRequest->opening_date)->addDays($i)->format('d-m-Y');
                    $MaturityAmount = $OpeningAmount + $Final_IntestAmount;

                    $rdCalcualtionObj['dueDate']                    = $OpeningDate;
                    $rdCalcualtionObj['CloseDate']                  = $CloseingDate;
                    $rdCalcualtionObj['period']                     = $OpeningDate.' - '.$CloseingDate;
                    $rdCalcualtionObj['total_amount']               = round($OpeningAmount,2);
                    $rdCalcualtionObj['comp_interest']              = '';//round($Final_IntestAmount,2);
                    $rdCalcualtionObj['interest']                   = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['maturity_amount']            = round($MaturityAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = $InterestDueDate;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningDate =  Carbon::parse($oRequest->opening_date)->addDays($rd_frequency_days)->format('d-m-Y');
                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->addDays($rd_frequency_days)->format('d-m-Y');
                    $OpeningAmount = $OpeningAmount + $oRequest->rd_amount;

                    $Final_InterestEarned += $Final_IntestAmount;
                    $Final_MaturityAmount = $MaturityAmount;
                    $Final_MaturityDate   = $InterestDueDate;
                }
                $Final_MaturityAmount = $Final_InterestEarned + $Final_Principal;
            }


        }else if($oRequest->rd_frequency == '28_days'){


            if($oRequest->rd_tenure != ''){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $CloseingDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $OpeningAmount = $oRequest->rd_amount;
              
                $IntestCalculation = 0;
                $IntestAmount = 0;
                $MaturityAmount = 0;
                $Final_IntestAmount = 0;
                $rd_frequency_days  = 0;
                $Final_IntestAmount_Days   = 0;
                $comp_interest  = 0;


                for ($i=1; $i <= $oRequest->rd_tenure; $i++) { 

                    $Final_Principal            += $oRequest->rd_amount;
                    $IntestCalculation          = $Final_Principal * $oRequest->interest_rate / 100;
                    $Final_IntestAmount_Days    = $IntestCalculation / 365; 
                    $Final_IntestAmount         = $Final_IntestAmount_Days * 28;

                    $rd_frequency_days          = $rd_frequency_days + 28;
                    
                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->subDays(1)->addDays($rd_frequency_days)->format('d-m-Y');
                    $InterestDueDate =  Carbon::parse($oRequest->opening_date)->addDays($i)->format('d/m/Y');
                    $MaturityAmount = $OpeningAmount + $Final_IntestAmount;

                    $rdCalcualtionObj['dueDate']                    = $OpeningDate;
                    $rdCalcualtionObj['CloseDate']                  = $CloseingDate;
                    $rdCalcualtionObj['period']                     = $OpeningDate.' - '.$CloseingDate;
                    $rdCalcualtionObj['total_amount']               = round($OpeningAmount,2);
                    $rdCalcualtionObj['comp_interest']              = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['interest']                   = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['maturity_amount']            = round($MaturityAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = $InterestDueDate;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningDate =  Carbon::parse($oRequest->opening_date)->addDays($rd_frequency_days)->format('d-m-Y');
                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->addDays($rd_frequency_days)->format('d-m-Y');
                    $OpeningAmount   = $OpeningAmount + $oRequest->rd_amount;
                    $OpeningAmount   = $OpeningAmount + $Final_IntestAmount;

                    $Final_InterestEarned += $Final_IntestAmount;
                    $Final_MaturityAmount = $MaturityAmount;
                    $Final_MaturityDate   = $InterestDueDate;
                }
                $Final_MaturityAmount = $Final_InterestEarned + $Final_Principal;
            }




        }else if($oRequest->rd_frequency == 'weekly'){


            if($oRequest->rd_tenure != ''){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $CloseingDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $OpeningAmount = $oRequest->rd_amount;
              
                $IntestCalculation = 0;
                $IntestAmount = 0;
                $MaturityAmount = 0;
                $Final_IntestAmount = 0;
                $rd_frequency_days  = 0;
                $Final_IntestAmount_Days   = 0;
                $comp_interest  = 0;


                for ($i=1; $i <= $oRequest->rd_tenure; $i++) { 

                    $Final_Principal            += $oRequest->rd_amount;
                    $IntestCalculation          = $Final_Principal * $oRequest->interest_rate / 100;
                    $Final_IntestAmount_Days    = $IntestCalculation / 365; 
                    $Final_IntestAmount         = $Final_IntestAmount_Days * 7;

                    $rd_frequency_days          = $rd_frequency_days + 7;
                    
                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->subDays(1)->addDays($rd_frequency_days)->format('d-m-Y');
                    $InterestDueDate =  Carbon::parse($oRequest->opening_date)->addDays($i)->format('d-m-Y');
                    $MaturityAmount = $OpeningAmount + $Final_IntestAmount;

                    $rdCalcualtionObj['dueDate']                    = $OpeningDate;
                    $rdCalcualtionObj['CloseDate']                  = $CloseingDate;
                    $rdCalcualtionObj['period']                     = $OpeningDate.' - '.$CloseingDate;
                    $rdCalcualtionObj['total_amount']               = round($OpeningAmount,2);
                    $rdCalcualtionObj['comp_interest']              = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['interest']                   = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['maturity_amount']            = round($MaturityAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = $InterestDueDate;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningDate =  Carbon::parse($oRequest->opening_date)->addDays($rd_frequency_days)->format('d-m-Y');
                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->addDays($rd_frequency_days)->format('d-m-Y');
                    $OpeningAmount   = $OpeningAmount + $oRequest->rd_amount;
                    $OpeningAmount   = $OpeningAmount + $Final_IntestAmount;

                    $Final_InterestEarned += $Final_IntestAmount;
                    $Final_MaturityAmount = $MaturityAmount;
                    $Final_MaturityDate   = $InterestDueDate;
                }
                $Final_MaturityAmount = $Final_InterestEarned + $Final_Principal;
            }



        }else if($oRequest->rd_frequency == 'bi_weekly'){

            if($oRequest->rd_tenure != ''){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $CloseingDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $OpeningAmount = $oRequest->rd_amount;
              
                $IntestCalculation = 0;
                $IntestAmount = 0;
                $MaturityAmount = 0;
                $Final_IntestAmount = 0;
                $rd_frequency_days  = 0;
                $Final_IntestAmount_Days   = 0;
                $comp_interest  = 0;


                for ($i=1; $i <= $oRequest->rd_tenure; $i++) { 

                    $Final_Principal            += $oRequest->rd_amount;
                    $IntestCalculation          = $Final_Principal * $oRequest->interest_rate / 100;
                    $Final_IntestAmount_Days    = $IntestCalculation / 365; 
                    $Final_IntestAmount         = $Final_IntestAmount_Days * 15;

                    $rd_frequency_days          = $rd_frequency_days + 15;
                    
                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->subDays(1)->addDays($rd_frequency_days)->format('d-m-Y');
                    $InterestDueDate =  Carbon::parse($oRequest->opening_date)->addDays($i)->format('d-m-Y');
                    $MaturityAmount = $OpeningAmount + $Final_IntestAmount;

                    $rdCalcualtionObj['dueDate']                    = $OpeningDate;
                    $rdCalcualtionObj['CloseDate']                  = $CloseingDate;
                    $rdCalcualtionObj['period']                     = $OpeningDate.' - '.$CloseingDate;
                    $rdCalcualtionObj['total_amount']               = round($OpeningAmount,2);
                    $rdCalcualtionObj['comp_interest']              = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['interest']                   = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['maturity_amount']            = round($MaturityAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = $InterestDueDate;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningDate =  Carbon::parse($oRequest->opening_date)->addDays($rd_frequency_days)->format('d-m-Y');
                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->addDays($rd_frequency_days)->format('d-m-Y');
                    $OpeningAmount   = $OpeningAmount + $oRequest->rd_amount;
                    $OpeningAmount   = $OpeningAmount + $Final_IntestAmount;

                    $Final_InterestEarned += $Final_IntestAmount;
                    $Final_MaturityAmount = $MaturityAmount;
                    $Final_MaturityDate   = $InterestDueDate;
                }
                $Final_MaturityAmount = $Final_InterestEarned + $Final_Principal;
            }



        }else if($oRequest->rd_frequency == 'monthly'){
            if($oRequest->rd_tenure != ''){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $OpeningAmount = $oRequest->rd_amount;

                $IntestCalculation = 0;
                $IntestAmount = 0;
                $MaturityAmount = 0;


                $IntestCalculation = $oRequest->rd_amount * $oRequest->interest_rate / 100;
                $IntestAmount = $IntestCalculation / $oRequest->rd_tenure; 

                for ($i=1; $i <= $oRequest->rd_tenure; $i++) { 

                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->subDays(1)->addMonth($i)->format('d-m-Y');
                    $InterestDueDate =  Carbon::parse($oRequest->opening_date)->addMonth($i)->format('d-m-Y');
                    $MaturityAmount = $OpeningAmount + $IntestAmount;
                    $Final_Principal += $oRequest->rd_amount;

                    $rdCalcualtionObj['dueDate']                    = $OpeningDate;
                    $rdCalcualtionObj['CloseDate']                  = $CloseingDate;
                    $rdCalcualtionObj['period']                     = $OpeningDate.' - '.$CloseingDate;
                    $rdCalcualtionObj['total_amount']               = round($OpeningAmount,2);
                    $rdCalcualtionObj['comp_interest']              = round($IntestAmount,2);
                    $rdCalcualtionObj['interest']                   = round($IntestAmount,2);
                    $rdCalcualtionObj['maturity_amount']            = round($MaturityAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = $InterestDueDate;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningDate =  Carbon::parse($oRequest->opening_date)->addMonth($i)->format('d-m-Y');
                    $OpeningAmount = $OpeningAmount + $oRequest->rd_amount;

                    $OpeningAmount      = $OpeningAmount + $IntestAmount;
                    $IntestCalculation  = $OpeningAmount * $oRequest->interest_rate / 100;
                    $IntestAmount       = $IntestCalculation / $oRequest->rd_tenure; 
                    
                    $Final_MaturityAmount = $MaturityAmount;
                    $Final_MaturityDate   = $InterestDueDate;

                }
                $Final_InterestEarned = $Final_MaturityAmount - $Final_Principal;

            }

        }else if($oRequest->rd_frequency == 'quarterly'){


            if($oRequest->rd_tenure != ''){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $OpeningAmount = $oRequest->rd_amount;

                $IntestCalculation = 0;
                $IntestAmount = 0;
                $MaturityAmount = 0;
                $quarterlyMonth = 0;
                $Final_IntestAmount = 0;
                $Final_IntestAmount_Days   = 0;

                $IntestCalculation = $oRequest->rd_amount * $oRequest->interest_rate / 100;
                $IntestAmount = $IntestCalculation / $oRequest->rd_tenure; 

                for ($i=1; $i <= $oRequest->rd_tenure; $i++) { 

                    $quarterlyMonth = $quarterlyMonth + 3;

                    $Final_Principal            += $oRequest->rd_amount;
                    $IntestCalculation          = $Final_Principal * $oRequest->interest_rate / 100;
                    $Final_IntestAmount_Days    = $IntestCalculation / 365; 
                    $Final_IntestAmount         = $Final_IntestAmount_Days * 92;

                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->subDays(1)->addMonth($quarterlyMonth)->format('d-m-Y');
                    $InterestDueDate =  Carbon::parse($oRequest->opening_date)->addMonth($quarterlyMonth)->format('d-m-Y');

                    $MaturityAmount = $OpeningAmount + $IntestAmount;

                    $rdCalcualtionObj['dueDate']                    = $OpeningDate;
                    $rdCalcualtionObj['CloseDate']                  = $CloseingDate;
                    $rdCalcualtionObj['period']                     = $OpeningDate.' - '.$CloseingDate;
                    $rdCalcualtionObj['total_amount']               = round($OpeningAmount,2);
                    $rdCalcualtionObj['comp_interest']              = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['interest']                   = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['maturity_amount']            = round($MaturityAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = $InterestDueDate;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningDate =  Carbon::parse($oRequest->opening_date)->addMonth($quarterlyMonth)->format('d-m-Y');
                    $OpeningAmount = $OpeningAmount + $oRequest->rd_amount;

                    $OpeningAmount      = $OpeningAmount + $Final_IntestAmount;
                    
                    $Final_MaturityAmount = $MaturityAmount;
                    $Final_MaturityDate   = $InterestDueDate;

                }
                $Final_InterestEarned = $Final_MaturityAmount - $Final_Principal;

            }

    
        }else if($oRequest->rd_frequency == 'half_yearly'){

            if($oRequest->rd_tenure != ''){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $OpeningAmount = $oRequest->rd_amount;

                $IntestCalculation = 0;
                $IntestAmount = 0;
                $MaturityAmount = 0;
                $half_yearly_Month = 0;
                $Final_IntestAmount = 0;
                $Final_IntestAmount_Days   = 0;

                $IntestCalculation = $oRequest->rd_amount * $oRequest->interest_rate / 100;
                $IntestAmount = $IntestCalculation / $oRequest->rd_tenure; 

                for ($i=1; $i <= $oRequest->rd_tenure; $i++) { 

                    $half_yearly_Month = $half_yearly_Month + 6;

                    $Final_Principal            += $oRequest->rd_amount;
                    $IntestCalculation          = $Final_Principal * $oRequest->interest_rate / 100;
                    $Final_IntestAmount_Days    = $IntestCalculation / 365; 
                    $Final_IntestAmount         = $Final_IntestAmount_Days * 183;

                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->subDays(1)->addMonth($half_yearly_Month)->format('d-m-Y');
                    $InterestDueDate =  Carbon::parse($oRequest->opening_date)->addMonth($half_yearly_Month)->format('d-m-Y');

                    $MaturityAmount = $OpeningAmount + $IntestAmount;

                    $rdCalcualtionObj['dueDate']                    = $OpeningDate;
                    $rdCalcualtionObj['CloseDate']                  = $CloseingDate;
                    $rdCalcualtionObj['period']                     = $OpeningDate.' - '.$CloseingDate;
                    $rdCalcualtionObj['total_amount']               = round($OpeningAmount,2);
                    $rdCalcualtionObj['comp_interest']              = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['interest']                   = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['maturity_amount']            = round($MaturityAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = $InterestDueDate;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningDate =  Carbon::parse($oRequest->opening_date)->addMonth($half_yearly_Month)->format('d-m-Y');
                    $OpeningAmount = $OpeningAmount + $oRequest->rd_amount;

                    $OpeningAmount      = $OpeningAmount + $Final_IntestAmount;
                    
                    $Final_MaturityAmount = $MaturityAmount;
                    $Final_MaturityDate   = $InterestDueDate;

                }
                $Final_InterestEarned = $Final_MaturityAmount - $Final_Principal;

            }

    
        }else if($oRequest->rd_frequency == 'yearly'){

            if($oRequest->rd_tenure != ''){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $OpeningAmount = $oRequest->rd_amount;

                $IntestCalculation = 0;
                $IntestAmount = 0;
                $MaturityAmount = 0;

                $IntestCalculation = $oRequest->rd_amount * $oRequest->interest_rate / 100;
                $IntestAmount = $IntestCalculation / $oRequest->rd_tenure; 

                for ($i=1; $i <= $oRequest->rd_tenure; $i++) { 

                    $Final_Principal            += $oRequest->rd_amount;
                    $Final_IntestAmount          = $Final_Principal * $oRequest->interest_rate / 100;

                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->subDays(1)->addYear($i)->format('d-m-Y');
                    $InterestDueDate =  Carbon::parse($oRequest->opening_date)->addYear($i)->format('d-m-Y');
                    $MaturityAmount = $OpeningAmount + $IntestAmount;
                    
                    $rdCalcualtionObj['dueDate']                    = $OpeningDate;
                    $rdCalcualtionObj['CloseDate']                  = $CloseingDate;
                    $rdCalcualtionObj['period']                     = $OpeningDate.' - '.$CloseingDate;
                    $rdCalcualtionObj['total_amount']               = round($OpeningAmount,2);
                    $rdCalcualtionObj['comp_interest']              = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['interest']                   = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['maturity_amount']            = round($MaturityAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = $InterestDueDate;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningDate =  Carbon::parse($oRequest->opening_date)->addYear($i)->format('d-m-Y');
                    $OpeningAmount = $OpeningAmount + $oRequest->rd_amount;

                    $OpeningAmount      = $OpeningAmount + $Final_IntestAmount;
                    $IntestCalculation  = $OpeningAmount * $oRequest->interest_rate / 100;
                    $Final_IntestAmount = $IntestCalculation / $oRequest->rd_tenure; 
                    
                    $Final_MaturityAmount = $MaturityAmount;
                    $Final_MaturityDate   = $InterestDueDate;

                }
                $Final_InterestEarned = $Final_MaturityAmount - $Final_Principal;

            }

        }   

        $RDInfo['opening_date']             = Carbon::parse($oRequest->opening_date)->format('d-m-Y');
        $RDInfo['rd_amount']                = round($oRequest->rd_amount,2);
        $RDInfo['interest_rate']            = $oRequest->interest_rate;
        $RDInfo['rd_frequency']             = str_replace('_',' ',ucfirst($oRequest->rd_frequency));
        $RDInfo['tenure']                   = $oRequest->rd_tenure;
        $RDInfo['Final_InterestEarned']     = round($Final_InterestEarned,2);
        $RDInfo['Final_MaturityAmount']     = round($Final_MaturityAmount,2);
        $RDInfo['Final_MaturityDate']       = $Final_MaturityDate;
        $RDInfo['Final_Principal']          = round($Final_Principal,2);
        $RDInfo['EMI_amount']               = round($oRequest->rd_amount,2);
        $RDInfo['EMIList']                  = $rdCalcualtionArr;
        return $RDInfo;

        }

        public static function GetFD_Calculation($oRequest)
        {
    
     
        $Final_Principal = 0;
        $Final_InterestEarned = 0;
        $Final_MaturityAmount = 0;
        $Final_MaturityDate    = '';

        $rdCalcualtionArr = array();

        if($oRequest->fd_frequency == 'daily'){

            if($oRequest->rd_tenure != ''){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $CloseingDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $OpeningAmount = $oRequest->fd_amount;
              
                $IntestCalculation = 0;
                $IntestAmount = 0;
                $MaturityAmount = 0;
                $Final_IntestAmount = 0;

                for ($i=1; $i <= $oRequest->fd_tenure; $i++) { 

                    $Final_Principal    += $oRequest->fd_amount;
                    $IntestCalculation   = $Final_Principal * $oRequest->interest_rate / 100;
                    $Final_IntestAmount  = $IntestCalculation / 365; 
                    
                    $InterestDueDate =  Carbon::parse($oRequest->opening_date)->addDays($i)->format('d-m-Y');
                    $MaturityAmount = $OpeningAmount + $Final_IntestAmount;

                    $rdCalcualtionObj['dueDate']                    = $OpeningDate;
                    $rdCalcualtionObj['CloseDate']                  = $CloseingDate;
                    $rdCalcualtionObj['period']                     = $OpeningDate.' - '.$CloseingDate;
                    $rdCalcualtionObj['total_amount']               = round($OpeningAmount,2);
                    $rdCalcualtionObj['comp_interest']              = '';//round($Final_IntestAmount,2);
                    $rdCalcualtionObj['interest']                   = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['maturity_amount']            = round($MaturityAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = $InterestDueDate;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningDate =  Carbon::parse($oRequest->opening_date)->addDays($i)->format('d-m-Y');
                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->addDays($i)->format('d-m-Y');
                    $OpeningAmount = $OpeningAmount + $oRequest->fd_amount;

                    $Final_InterestEarned += $Final_IntestAmount;
                    $Final_MaturityAmount = $MaturityAmount;
                    $Final_MaturityDate   = $InterestDueDate;
                }
                $Final_MaturityAmount = $Final_InterestEarned + $Final_Principal;
            }

        }
        
        
        
         else if($oRequest->fd_frequency == 'yearly'){
           
            if($oRequest->fd_tenure != ''){

                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $OpeningAmount = $oRequest->fd_amount;

                $IntestCalculation = 0;
                $IntestAmount = 0;
                $MaturityAmount = 0;


                $IntestCalculation = $oRequest->fd_amount * $oRequest->interest_rate / 100;
                
                $IntestAmount = $IntestCalculation;
                //$IntestAmount = $IntestCalculation / $oRequest->fd_tenure; 
                
                $Final_Principal = $oRequest->fd_amount;
                for ($i=1; $i <= $oRequest->fd_tenure; $i++) { 

                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->subDays(1)->addYear($i)->format('d-m-Y');
                    $InterestDueDate =  Carbon::parse($oRequest->opening_date)->addYear($i)->format('d-m-Y');
                    $MaturityAmount = $OpeningAmount + $IntestAmount;
                    $Final_MaturityAmount = $MaturityAmount;

                    $rdCalcualtionObj['dueDate']                    = $OpeningDate;
                    $rdCalcualtionObj['CloseDate']                  = $CloseingDate;
                    $rdCalcualtionObj['period']                     = $OpeningDate.' - '.$CloseingDate;
                    $rdCalcualtionObj['total_amount']               = round($OpeningAmount,2);
                    $rdCalcualtionObj['comp_interest']              = round($IntestAmount,2);
                    $rdCalcualtionObj['interest']                   = round($IntestAmount,2);
                    $rdCalcualtionObj['maturity_amount']            = round($MaturityAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = $InterestDueDate;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningDate        =  Carbon::parse($oRequest->opening_date)->addYear($i)->format('d-m-Y');
                    $OpeningAmount      = $OpeningAmount + $IntestAmount;
                    $IntestCalculation  = $OpeningAmount * $oRequest->interest_rate / 100;
                    
                    $IntestAmount = $IntestCalculation;
                    //$IntestAmount       = $IntestCalculation / $oRequest->fd_tenure; 
                    $MaturityAmount     = $OpeningAmount + $IntestAmount;
                    
                    $Final_MaturityDate   = $InterestDueDate;
                }
                $Final_InterestEarned = $Final_MaturityAmount - $oRequest->fd_amount;
            }
        }
        
        
        else if($oRequest->fd_frequency == 'monthly'){
            if($oRequest->fd_tenure != ''){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $OpeningAmount = $oRequest->fd_amount;

                $IntestCalculation = 0;
                $IntestAmount = 0;
                $MaturityAmount = 0;


                $IntestCalculation = $oRequest->fd_amount * $oRequest->interest_rate / 100;
                
               
                
                $IntestAmount = $IntestCalculation / $oRequest->fd_tenure; 
                $Final_Principal = $oRequest->fd_amount;
                for ($i=1; $i <= $oRequest->fd_tenure; $i++) { 

                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->subDays(1)->addMonth($i)->format('d-m-Y');
                    $InterestDueDate =  Carbon::parse($oRequest->opening_date)->addMonth($i)->format('d-m-Y');
                    $MaturityAmount = $OpeningAmount + $IntestAmount;
                    $Final_MaturityAmount = $MaturityAmount;

                    $rdCalcualtionObj['dueDate']                    = $OpeningDate;
                    $rdCalcualtionObj['CloseDate']                  = $CloseingDate;
                    $rdCalcualtionObj['period']                     = $OpeningDate.' - '.$CloseingDate;
                    $rdCalcualtionObj['total_amount']               = round($OpeningAmount,2);
                    $rdCalcualtionObj['comp_interest']              = round($IntestAmount,2);
                    $rdCalcualtionObj['interest']                   = round($IntestAmount,2);
                    $rdCalcualtionObj['maturity_amount']            = round($MaturityAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = $InterestDueDate;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningDate        =  Carbon::parse($oRequest->opening_date)->addMonth($i)->format('d-m-Y');
                    $OpeningAmount      = $OpeningAmount + $IntestAmount;
                    $IntestCalculation  = $OpeningAmount * $oRequest->interest_rate / 100;
                    $IntestAmount       = $IntestCalculation / $oRequest->fd_tenure; 
                    $MaturityAmount     = $OpeningAmount + $IntestAmount;
                    
                    $Final_MaturityDate   = $InterestDueDate;
                }
                $Final_InterestEarned = $Final_MaturityAmount - $oRequest->fd_amount;
            }
        }else if($oRequest->fd_frequency == 'no_compounding'){
            if($oRequest->fd_tenure != ''){

                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $OpeningAmount = $oRequest->fd_amount;

                $IntestCalculation = 0;
                $IntestAmount = 0;
                $MaturityAmount = 0;


                $IntestCalculation = $oRequest->fd_amount * $oRequest->interest_rate / 100;
                $IntestAmount = $IntestCalculation; 
                $Final_Principal = $oRequest->fd_amount;
                
                $CloseingDate =  Carbon::parse($oRequest->opening_date)->subDays(1)->addMonth($oRequest->fd_tenure)->format('d-m-Y');
                $InterestDueDate =  Carbon::parse($CloseingDate)->addDays(1)->format('d-m-Y');
                $MaturityAmount = $OpeningAmount + $IntestAmount;
                $Final_MaturityAmount = $MaturityAmount;

                $rdCalcualtionObj['dueDate']                    = $OpeningDate;
                $rdCalcualtionObj['CloseDate']                  = $CloseingDate;
                $rdCalcualtionObj['period']                     = $OpeningDate.' - '.$CloseingDate;
                $rdCalcualtionObj['total_amount']               = round($OpeningAmount,2);
                $rdCalcualtionObj['comp_interest']              = round($IntestAmount,2);
                $rdCalcualtionObj['interest']                   = round($IntestAmount,2);
                $rdCalcualtionObj['maturity_amount']            = round($MaturityAmount,2);
                $rdCalcualtionObj['interest_due_date']          = $InterestDueDate;
                $rdCalcualtionArr[]                             = $rdCalcualtionObj;
                $Final_MaturityDate   = $InterestDueDate;
                $Final_InterestEarned = $IntestAmount;
                
            }
        }   

        $RDInfo['opening_date']             = Carbon::parse($oRequest->opening_date)->format('d-m-Y');
        $RDInfo['rd_amount']                = round($oRequest->fd_amount,2);
        $RDInfo['interest_rate']            = $oRequest->interest_rate;
        $RDInfo['rd_frequency']             = str_replace('_',' ',ucfirst($oRequest->fd_frequency));
        $RDInfo['tenure']                   = $oRequest->fd_tenure;
        $RDInfo['Final_InterestEarned']     = round($Final_InterestEarned,2);
        $RDInfo['Final_MaturityAmount']     = round($Final_MaturityAmount,2);
        $RDInfo['Final_MaturityDate']       = $Final_MaturityDate;
        $RDInfo['Final_Principal']          = round($Final_Principal,2);
        $RDInfo['FD_amount']               = round($oRequest->fd_amount,2);
        $RDInfo['EMIList']                  = $rdCalcualtionArr;
        return $RDInfo;

        }


    public static function LoanCalculationEMI(Request $oRequest)
    {


        $Final_Principal = 0;
        $Final_InterestEarned = 0;
        $Final_MaturityAmount = 0;
        $Final_MaturityDate    = '';

        $rdCalcualtionArr = array();

        if($oRequest->emi_payout == 'daily'){

            if($oRequest->loan_tenure != ''){
                
                if($oRequest->emi_type == 'reducing'){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d/m/Y');
                $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('d/m/Y');
                $OpeningAmount = $oRequest->loan_amount;
              
                $Final_IntestAmount = 0;

                for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 

                    $amount = $oRequest->loan_amount;
                    $rate = ( $oRequest->interest_rate / 365 ) / 100; // Monthly interest rate
                    
                    $term = $oRequest->loan_tenure; // Term in months
                    $emi = $amount * $rate * (pow(1 + $rate, $term) / (pow(1 + $rate, $term) - 1));

                    $InterestCalculation    = 0;
                    $SingleDayInterest      = 0;
                    $PrincipalAmount        = 0;
                    $OutstandingAmount      = 0;

                    if($OpeningAmount < $emi){ $emi = $OpeningAmount; }

                    $InterestCalculation    = ( $OpeningAmount * $oRequest->interest_rate ) / 100;
                    $SingleDayInterest      = $InterestCalculation / 365;
                    $PrincipalAmount        = round($emi) - $SingleDayInterest;
                    $OutstandingAmount      = $OpeningAmount - round($PrincipalAmount);
                    
                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount,2);
                    $rdCalcualtionObj['interest']                   = number_format($SingleDayInterest,2);
                    $rdCalcualtionObj['outstanding']                = number_format($OutstandingAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningAmount = $OutstandingAmount;

                    $emi_credit_period = $i + $oRequest->emi_credit_period;
                    $OpeningDate    =  Carbon::parse($oRequest->opening_date)->addDays($i)->format('d/m/Y');
                    $DueDate        =  Carbon::parse($oRequest->opening_date)->addDays($emi_credit_period)->format('d/m/Y');

                    $Final_InterestEarned += $SingleDayInterest;
                }
                
            }else{
                
               $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('Y-m-d');
                $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('Y-m-d');
                $OpeningAmount = $oRequest->loan_amount;
              
                $Final_IntestAmount = 0;
                $frequency_days = 0;

                for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 

                    $amount = $oRequest->loan_amount;
                    $term = $oRequest->loan_tenure; 
                    $SingleDayInterest      = 0;
                    $PrincipalAmount        = 0;
                    $OutstandingAmount      = 0;
                    $singleWeekInterest      = 0;
                    $frequency_days         = $frequency_days + 1;

                    $InterestAmountrate     = ( $amount * $oRequest->interest_rate ) / 100; // Monthly interest rate
                    $SingleDayInterest      = $InterestAmountrate / 365;
                    $singleWeekInterest     = $SingleDayInterest * 1;

                    $PrincipalAmount        = $OpeningAmount  / $term;
                    $emi                    = $PrincipalAmount + $singleWeekInterest;
                    $PrincipalAmount        = round($emi) -  $singleWeekInterest;
                    $OutstandingAmount      = round($OpeningAmount) - ( $PrincipalAmount * $i );

                    if($oRequest->loan_tenure == $i){
                        if($OutstandingAmount != 0){
                            $emi = $emi + $OutstandingAmount;
                            $OutstandingAmount = 0;
                        }
                    }
                    

                    $totalLoanAmountWithInterest = ( $singleWeekInterest * $term ) + $OpeningAmount;
                    $Final_Principal             = $totalLoanAmountWithInterest;
                    
                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount,2);
                    $rdCalcualtionObj['interest']                   = number_format($singleWeekInterest,2);
                    $rdCalcualtionObj['outstanding']                = number_format($OutstandingAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $emi_credit_period = $i + $oRequest->emi_credit_period;
                    $OpeningDate    =  Carbon::parse($oRequest->opening_date)->addDays($frequency_days)->format('Y-m-d');
                    $DueDate        =  Carbon::parse($oRequest->opening_date)->addDays($emi_credit_period)->format('Y-m-d');

                    $Final_InterestEarned += $SingleDayInterest;
                }
                
            }
            
            
        }

        }else if($oRequest->emi_payout == 'weekly'){

            if($oRequest->loan_tenure != ''){
                
                if($oRequest->emi_type == 'reducing'){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('Y-m-d');
                $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('Y-m-d');
                $OpeningAmount = $oRequest->loan_amount;
              
                $Final_IntestAmount     = 0;
                $frequency_days         = 0;

                for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 

                    $amount = $oRequest->loan_amount;
                    $rate = ( $oRequest->interest_rate / 52 ) / 100; // Monthly interest rate
                    $term = $oRequest->loan_tenure; // Term in months
                    $emi = $amount * $rate * (pow(1 + $rate, $term) / (pow(1 + $rate, $term) - 1));

                    $InterestCalculation    = 0;
                    $SingleDayInterest      = 0;
                    $PrincipalAmount        = 0;
                    $OutstandingAmount      = 0;
                    
                    if($OpeningAmount < $emi){ 
                        $emi = $OpeningAmount; 
                    }


                    $frequency_days         = $frequency_days + 7;
                    $InterestCalculation    = ( $OpeningAmount * $oRequest->interest_rate ) / 100;
                    $SingleDayInterest      = ( $InterestCalculation / 365 ) * 7;
                    $PrincipalAmount        = round($emi) - $SingleDayInterest;
                    $OutstandingAmount      = round($OpeningAmount,2) - $PrincipalAmount;
                    
                    if($OutstandingAmount < $emi){
                        $emi = $emi + $OutstandingAmount;
                        $OutstandingAmount = 0;
                    }
                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount,2);
                    $rdCalcualtionObj['interest']                   = number_format($SingleDayInterest,2);
                    $rdCalcualtionObj['outstanding']                = number_format($OutstandingAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningAmount = $OutstandingAmount;

                    $emi_credit_period = $frequency_days + $oRequest->emi_credit_period;
                    $OpeningDate    =  Carbon::parse($oRequest->opening_date)->addDays($frequency_days)->format('Y-m-d');
                    $DueDate        =  Carbon::parse($oRequest->opening_date)->addDays($emi_credit_period)->format('Y-m-d');

                    $Final_InterestEarned += $SingleDayInterest;
                }
                
                
            }else{
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('Y-m-d');
                $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('Y-m-d');
                $OpeningAmount = $oRequest->loan_amount;
              
                $Final_IntestAmount = 0;
                $frequency_days = 0;

                for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 

                    $amount = $oRequest->loan_amount;
                    $term = $oRequest->loan_tenure; 
                    $SingleDayInterest      = 0;
                    $PrincipalAmount        = 0;
                    $OutstandingAmount      = 0;
                    $singleWeekInterest      = 0;
                    $frequency_days         = $frequency_days + 7;

                    $InterestAmountrate     = ( $amount * $oRequest->interest_rate ) / 100; // Monthly interest rate
                    $SingleDayInterest      = $InterestAmountrate / 365;
                    $singleWeekInterest     = $SingleDayInterest * 7;

                    $PrincipalAmount        = $OpeningAmount  / $term;
                    $emi                    = $PrincipalAmount + $singleWeekInterest;
                    $PrincipalAmount        = round($emi) -  $singleWeekInterest;
                    $OutstandingAmount      = round($OpeningAmount) - ( $PrincipalAmount * $i );

                    if($OutstandingAmount < 0){
                        $emi = $emi + $OutstandingAmount;
                        $OutstandingAmount = 0;
                    }

                    $totalLoanAmountWithInterest = ( $singleWeekInterest * $term ) + $OpeningAmount;
                    $Final_Principal             = $totalLoanAmountWithInterest;
                    
                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount,2);
                    $rdCalcualtionObj['interest']                   = number_format($singleWeekInterest,2);
                    $rdCalcualtionObj['outstanding']                = number_format($OutstandingAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $emi_credit_period  =  $frequency_days + $oRequest->emi_credit_period;
                    $OpeningDate        =  Carbon::parse($oRequest->opening_date)->addDays($frequency_days)->format('Y-m-d');
                    $DueDate            =  Carbon::parse($oRequest->opening_date)->addDays($emi_credit_period)->format('Y-m-d');

                    $Final_InterestEarned += $SingleDayInterest;
                   
           		}
                
                
                
            }
    
            }



        }else if($oRequest->emi_payout == 'bi_weekly'){

            if($oRequest->loan_tenure != ''){
                
                if($oRequest->emi_type == 'reducing'){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('Y-m-d');
                $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('Y-m-d');
                $OpeningAmount = $oRequest->loan_amount;
              
                $Final_IntestAmount     = 0;
                $frequency_days         = 0;

                for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 

                    $amount = $oRequest->loan_amount;
                    $rate = ( $oRequest->interest_rate / 52 ) / 100; // Monthly interest rate
                    $term = $oRequest->loan_tenure; // Term in months
                    $emi = $amount * $rate * (pow(1 + $rate, $term) / (pow(1 + $rate, $term) - 1));

                    $InterestCalculation    = 0;
                    $SingleDayInterest      = 0;
                    $PrincipalAmount        = 0;
                    $OutstandingAmount      = 0;
                    
                    if($OpeningAmount < $emi){ 
                        $emi = $OpeningAmount; 
                    }


                    $frequency_days         = $frequency_days + 14;
                    $InterestCalculation    = ( $OpeningAmount * $oRequest->interest_rate ) / 100;
                    $SingleDayInterest      = ( $InterestCalculation / 365 ) * 10.4;
                    $PrincipalAmount        = round($emi) - $SingleDayInterest;
                    $OutstandingAmount      = round($OpeningAmount,2) - $PrincipalAmount;
                    
                    if($OutstandingAmount < $emi){
                        $emi = $emi + $OutstandingAmount;
                        $OutstandingAmount = 0;
                    }
                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount,2);
                    $rdCalcualtionObj['interest']                   = number_format($SingleDayInterest,2);
                    $rdCalcualtionObj['outstanding']                = number_format($OutstandingAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningAmount = $OutstandingAmount;

                    $emi_credit_period = $frequency_days + $oRequest->emi_credit_period;
                    $OpeningDate    =  Carbon::parse($oRequest->opening_date)->addDays($frequency_days)->format('Y-m-d');
                    $DueDate        =  Carbon::parse($oRequest->opening_date)->addDays($emi_credit_period)->format('Y-m-d');

                    $Final_InterestEarned += $SingleDayInterest;
                }
                
            }else{
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('Y-m-d');
                $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('Y-m-d');
                $OpeningAmount = $oRequest->loan_amount;
              
                $Final_IntestAmount = 0;
                $frequency_days = 0;

                for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 

                    $amount = $oRequest->loan_amount;
                    $term = $oRequest->loan_tenure; 
                    $SingleDayInterest      = 0;
                    $PrincipalAmount        = 0;
                    $OutstandingAmount      = 0;
                    $singleWeekInterest      = 0;
                    $frequency_days         = $frequency_days + 14;

                    $InterestAmountrate     = ( $amount * $oRequest->interest_rate ) / 100; // Monthly interest rate
                    $SingleDayInterest      = $InterestAmountrate / 365;
                    $singleWeekInterest     = $SingleDayInterest * 14;

                    $PrincipalAmount        = $OpeningAmount  / $term;
                    $emi                    = $PrincipalAmount + $singleWeekInterest;
                    $PrincipalAmount        = round($emi) -  $singleWeekInterest;
                    $OutstandingAmount      = round($OpeningAmount) - ( $PrincipalAmount * $i );

                    if($OutstandingAmount < 0){
                        $emi = $emi + $OutstandingAmount;
                        $OutstandingAmount = 0;
                    }

                    $totalLoanAmountWithInterest = ( $singleWeekInterest * $term ) + $OpeningAmount;
                    $Final_Principal             = $totalLoanAmountWithInterest;
                    
                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount,2);
                    $rdCalcualtionObj['interest']                   = number_format($singleWeekInterest,2);
                    $rdCalcualtionObj['outstanding']                = number_format($OutstandingAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $emi_credit_period = $i + $oRequest->emi_credit_period;
                    $OpeningDate    =  Carbon::parse($oRequest->opening_date)->addDays($frequency_days)->format('Y-m-d');
                    $DueDate        =  Carbon::parse($oRequest->opening_date)->addDays($emi_credit_period)->format('Y-m-d');

                    $Final_InterestEarned += $SingleDayInterest;
                }
            }
        }



        }else if($oRequest->emi_payout == 'monthly'){
            if($oRequest->loan_tenure != ''){
                
               
                
            if($oRequest->emi_type == 'reducing'){    
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('Y-m-d');
                $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('Y-m-d');
                $OpeningAmount = $oRequest->loan_amount;
              
                $Final_IntestAmount = 0;

                for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 

                    $amount = $oRequest->loan_amount;
                    $rate = ( $oRequest->interest_rate / 12 ) / 100; // Monthly interest rate
                    
                    $term = $oRequest->loan_tenure; // Term in months
                    $emi = $amount * $rate * (pow(1 + $rate, $term) / (pow(1 + $rate, $term) - 1));

                    $InterestCalculation    = 0;
                    $SingleDayInterest      = 0;
                    $PrincipalAmount        = 0;
                    $OutstandingAmount      = 0;

                    if($OpeningAmount < $emi){ $emi = $OpeningAmount; }

                    $InterestCalculation    = ( $OpeningAmount * $oRequest->interest_rate ) / 100;
                    $SingleDayInterest      = $InterestCalculation / 12;
                    $PrincipalAmount        = round($emi) - $SingleDayInterest;
                    
                    $OutstandingAmount      = $OpeningAmount - round($PrincipalAmount);


                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount,2);
                    $rdCalcualtionObj['interest']                   = number_format($SingleDayInterest,2);
                    $rdCalcualtionObj['outstanding']                = $OutstandingAmount;
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningAmount = $OutstandingAmount;

                   //$emi_credit_period = $i + $oRequest->emi_credit_period;
                    $OpeningDate    =  Carbon::parse($oRequest->opening_date)->addMonth($i)->format('Y-m-d');
                    $DueDate        =  Carbon::parse($OpeningDate)->addDays($oRequest->emi_credit_period)->format('Y-m-d');

                    $Final_InterestEarned += $SingleDayInterest;
                }
                
                
            } else {
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('Y-m-d');
                $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('Y-m-d');
                $OpeningAmount = $oRequest->loan_amount;
              
                $Final_IntestAmount = 0;
                

                for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 

                    $amount = $oRequest->loan_amount;
                    $term = $oRequest->loan_tenure; 
                    $SingleDayInterest      = 0;
                    $PrincipalAmount        = 0;
                    $OutstandingAmount      = 0;
                    
                    $InterestAmountrate     = ( $amount * $oRequest->interest_rate ) / 100; // Monthly interest rate
                    $emi                    = ( $amount + $InterestAmountrate ) / $term;
                   
                    $totalLoanAmountWithInterest = $InterestAmountrate + $oRequest->loan_amount;
                    $SingleDayInterest      = $InterestAmountrate / $term;
                    $PrincipalAmount        = $oRequest->loan_amount  / $term;
                    $OutstandingAmount      = round($amount) -  ( $PrincipalAmount * $i );
                    
                    
                    
                    $Final_Principal = $totalLoanAmountWithInterest;
                    
                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = $PrincipalAmount;
                    $rdCalcualtionObj['interest']                   = $SingleDayInterest;
                    $rdCalcualtionObj['outstanding']                = $OutstandingAmount;
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    //$emi_credit_period = $i + $oRequest->emi_credit_period;
                    $OpeningDate    =  Carbon::parse($oRequest->opening_date)->addMonth($i)->format('Y-m-d');
                    $DueDate        =  Carbon::parse($OpeningDate)->addDays($oRequest->emi_credit_period)->format('Y-m-d');

                    $Final_InterestEarned += $SingleDayInterest;
                   
           		}
                  
            }    


            }

        }else if($oRequest->rd_frequency == 'quarterly'){


            if($oRequest->rd_tenure != ''){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d/m/Y');
                $OpeningAmount = $oRequest->rd_amount;

                $IntestCalculation = 0;
                $IntestAmount = 0;
                $MaturityAmount = 0;
                $quarterlyMonth = 0;
                $Final_IntestAmount = 0;
                $Final_IntestAmount_Days   = 0;

                $IntestCalculation = $oRequest->rd_amount * $oRequest->interest_rate / 100;
                $IntestAmount = $IntestCalculation / $oRequest->rd_tenure; 

                for ($i=1; $i <= $oRequest->rd_tenure; $i++) { 

                    $quarterlyMonth = $quarterlyMonth + 3;

                    $Final_Principal            += $oRequest->rd_amount;
                    $IntestCalculation          = $Final_Principal * $oRequest->interest_rate / 100;
                    $Final_IntestAmount_Days    = $IntestCalculation / 365; 
                    $Final_IntestAmount         = $Final_IntestAmount_Days * 92;

                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->subDays(1)->addMonth($quarterlyMonth)->format('d/m/Y');
                    $InterestDueDate =  Carbon::parse($oRequest->opening_date)->addMonth($quarterlyMonth)->format('d/m/Y');

                    $MaturityAmount = $OpeningAmount + $IntestAmount;

                    $rdCalcualtionObj['period']                     = $OpeningDate.' - '.$CloseingDate;
                    $rdCalcualtionObj['total_amount']               = round($OpeningAmount,2);
                    $rdCalcualtionObj['comp_interest']              = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['interest']                   = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['maturity_amount']            = round($MaturityAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = $InterestDueDate;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningDate =  Carbon::parse($oRequest->opening_date)->addMonth($quarterlyMonth)->format('d/m/Y');
                    $OpeningAmount = $OpeningAmount + $oRequest->rd_amount;

                    $OpeningAmount      = $OpeningAmount + $Final_IntestAmount;
                    
                    $Final_MaturityAmount = $MaturityAmount;
                    $Final_MaturityDate   = $InterestDueDate;

                }
                $Final_InterestEarned = $Final_MaturityAmount - $Final_Principal;

            }

    
        }else if($oRequest->rd_frequency == 'half_yearly'){

            if($oRequest->rd_tenure != ''){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d/m/Y');
                $OpeningAmount = $oRequest->rd_amount;

                $IntestCalculation = 0;
                $IntestAmount = 0;
                $MaturityAmount = 0;
                $half_yearly_Month = 0;
                $Final_IntestAmount = 0;
                $Final_IntestAmount_Days   = 0;

                $IntestCalculation = $oRequest->rd_amount * $oRequest->interest_rate / 100;
                $IntestAmount = $IntestCalculation / $oRequest->rd_tenure; 

                for ($i=1; $i <= $oRequest->rd_tenure; $i++) { 

                    $half_yearly_Month = $half_yearly_Month + 6;

                    $Final_Principal            += $oRequest->rd_amount;
                    $IntestCalculation          = $Final_Principal * $oRequest->interest_rate / 100;
                    $Final_IntestAmount_Days    = $IntestCalculation / 365; 
                    $Final_IntestAmount         = $Final_IntestAmount_Days * 183;

                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->subDays(1)->addMonth($half_yearly_Month)->format('d/m/Y');
                    $InterestDueDate =  Carbon::parse($oRequest->opening_date)->addMonth($half_yearly_Month)->format('d/m/Y');

                    $MaturityAmount = $OpeningAmount + $IntestAmount;

                    $rdCalcualtionObj['period']                     = $OpeningDate.' - '.$CloseingDate;
                    $rdCalcualtionObj['total_amount']               = round($OpeningAmount,2);
                    $rdCalcualtionObj['comp_interest']              = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['interest']                   = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['maturity_amount']            = round($MaturityAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = $InterestDueDate;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningDate =  Carbon::parse($oRequest->opening_date)->addMonth($half_yearly_Month)->format('d/m/Y');
                    $OpeningAmount = $OpeningAmount + $oRequest->rd_amount;

                    $OpeningAmount      = $OpeningAmount + $Final_IntestAmount;
                    
                    $Final_MaturityAmount = $MaturityAmount;
                    $Final_MaturityDate   = $InterestDueDate;

                }
                $Final_InterestEarned = $Final_MaturityAmount - $Final_Principal;

            }

    
        }else if($oRequest->rd_frequency == 'yearly'){

            if($oRequest->rd_tenure != ''){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d/m/Y');
                $OpeningAmount = $oRequest->rd_amount;

                $IntestCalculation = 0;
                $IntestAmount = 0;
                $MaturityAmount = 0;

                $IntestCalculation = $oRequest->rd_amount * $oRequest->interest_rate / 100;
                $IntestAmount = $IntestCalculation / $oRequest->rd_tenure; 

                for ($i=1; $i <= $oRequest->rd_tenure; $i++) { 

                    $Final_Principal            += $oRequest->rd_amount;
                    $Final_IntestAmount          = $Final_Principal * $oRequest->interest_rate / 100;

                    $CloseingDate =  Carbon::parse($oRequest->opening_date)->subDays(1)->addYear($i)->format('d/m/Y');
                    $InterestDueDate =  Carbon::parse($oRequest->opening_date)->addYear($i)->format('d/m/Y');
                    $MaturityAmount = $OpeningAmount + $IntestAmount;
                    
                    $rdCalcualtionObj['period']                     = $OpeningDate.' - '.$CloseingDate;
                    $rdCalcualtionObj['total_amount']               = round($OpeningAmount,2);
                    $rdCalcualtionObj['comp_interest']              = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['interest']                   = round($Final_IntestAmount,2);
                    $rdCalcualtionObj['maturity_amount']            = round($MaturityAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = $InterestDueDate;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningDate =  Carbon::parse($oRequest->opening_date)->addYear($i)->format('d/m/Y');
                    $OpeningAmount = $OpeningAmount + $oRequest->rd_amount;

                    $OpeningAmount      = $OpeningAmount + $Final_IntestAmount;
                    $IntestCalculation  = $OpeningAmount * $oRequest->interest_rate / 100;
                    $Final_IntestAmount = $IntestCalculation / $oRequest->rd_tenure; 
                    
                    $Final_MaturityAmount = $MaturityAmount;
                    $Final_MaturityDate   = $InterestDueDate;

                }
                $Final_InterestEarned = $Final_MaturityAmount - $Final_Principal;
            }

        }   

        $RDInfo['opening_date']             = Carbon::parse($oRequest->opening_date)->format('d-m-Y');
        $RDInfo['rd_amount']                = round($oRequest->rd_amount,2);
        $RDInfo['interest_rate']            = $oRequest->interest_rate;
        $RDInfo['emi_payout']               = str_replace('_',' ',ucfirst($oRequest->emi_payout));
        $RDInfo['tenure']                   = $oRequest->rd_tenure;
        $RDInfo['Final_InterestEarned']     = round($Final_InterestEarned,2);
        $RDInfo['Final_MaturityAmount']     = round($Final_MaturityAmount,2);
        $RDInfo['Final_MaturityDate']       = $Final_MaturityDate;
        $RDInfo['Final_Principal']          = round($Final_Principal,2);
        $RDInfo['EMI_amount']               = round($oRequest->rd_amount,2);
        $RDInfo['Loan_EMI']                 = $rdCalcualtionArr;
        
        return $RDInfo;
    }
        
        
    /* Start  :: Fix Deposit Scheme function */
    public static function getFixedDepositScheme(){
        $query = FixedDepositScheme::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
           // $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->where('delete_status','0')->orderBy('id', 'DESC')->get();
        return $rows;
    }
    /* End  :: Fix Deposit Scheme function */


    /* Start Business Loan  */

    public static function Get_BusinessLoan(){
        $query = BusinessLoan::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->where('delete_status','0')->orderBy('id', 'DESC')->get();
        return $rows;
    }

     public static function get_businessLoan_number(){
             
        $Code = 'LOAN';
        $LoanAccount = BusinessLoan::orderBy('id','desc')->where('created_by',Auth::guard('admin')->user()->id)->first();
        $NewCustomerCode = 1000;
        if($LoanAccount){
            $NewCustomerCode = $LoanAccount->application_unique + 1;
        }
        $NewApplicationCode = sprintf('%06d', $NewCustomerCode);
        $ApplicationCode =  $Code.''.$NewApplicationCode;
        $output['application_mo'] = $ApplicationCode;
        $output['application_unique']    =  $NewCustomerCode;
        return $output;
    }
    
     public static function app_get_businessLoan_number(){
             
        $Code = 'LOAN';
        $LoanAccount = BusinessLoan::orderBy('id','desc')->first();
        $NewCustomerCode = 1000;
        if($LoanAccount){
            $NewCustomerCode = $LoanAccount->application_unique + 1;
        }
        $NewApplicationCode = sprintf('%06d', $NewCustomerCode);
        $ApplicationCode =  $Code.''.$NewApplicationCode;
        $output['application_mo'] = $ApplicationCode;
        $output['application_unique']    =  $NewCustomerCode;
        return $output;
    }

    public static function Get_BusinessLoanPending(){
        $query = BusinessLoan::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->where('delete_status','0')->where('status','pending')->orderBy('id', 'DESC')->get();
        return $rows;
    }

    public static function Get_BusinessLoandisburse(){
        $query = BusinessLoan::query();
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        $rows = $query->where('delete_status','0')->where('status','approved')->orderBy('id', 'DESC')->get();
        return $rows;
    }
    
        public static function get_Pending_Loan_Transation(){
          $query = TransationHistory::query();
            if(Auth::guard('admin')->user()->user_type != 'admin'){
                $query->where('created_by',Auth::guard('admin')->user()->id);    
            }
            $rows = $query->with('customer','loan_account','ledger')
                            ->where('delete_status','0')
                            ->whereIn('tran_page_type', ['loan'])
                            ->where('status','pending')
                            ->orderBy('id', 'DESC')->get();
            return $rows;
        }

        public static function get_Loan_TransationByAccount($accuntId){
                $query = TransationHistory::query();
                $query->where('account_id',$accuntId);
                if(Auth::guard('admin')->user()->user_type != 'admin'){
                    $query->where('created_by',Auth::guard('admin')->user()->id);    
                }
                $rows = $query->with('customer','rd_account','ledger')
                                ->where('delete_status','0')
                                ->whereIn('tran_page_type', ['loan'])
                                ->whereIn('status', ['completed', 'pending'])
                                ->orderBy('id', 'DESC')->get();
                return $rows;
            }
            
            
        public static function Get_AccountAssociatedRows($custID){
        
        $SevingAccountQuery = SavingAccount::query();
        $SevingAccountQuery->where('customer_id',$custID);    
        $SevingAccountRows = $SevingAccountQuery->where('delete_status','0')
                            ->orderBy('id', 'DESC')
                            ->get();
       
                 
        foreach ($SevingAccountRows as $key => $SevingAccountRow) {

            $Branch_code           = Admin::where('id', $SevingAccountRow->created_by)->pluck('branch_code')->first();

            $Output['branch_code']      = $Branch_code;
            $Output['application_no']   = $SevingAccountRow->application_mo;
            $Output['account_no']       = $SevingAccountRow->account_no;
            $Output['account_date']     = Helper::getFromDate_simple($SevingAccountRow->application_date);
            $Output['account_type']     = 'Saving Account';
            $Output['member_role']      = 'Self';
            $Output['balance']          = $SevingAccountRow->available_balance;
            $Output['status']           = ucfirst($SevingAccountRow->status);
            $OutputArr[] = $Output;
        }
        $JointAccountQuery = SavingAccount::query();
        $JointAccountQuery->where('joint_customer_id',$custID);    
        $JointAccountRows = $JointAccountQuery->where('delete_status','0')->orderBy('id', 'DESC')->get();
        foreach ($JointAccountRows as $key => $JointAccountRow) {

            $Branch_code           = Admin::where('id', @$JointAccountRow->created_by)->pluck('branch_code')->first();

            $Output['branch_code']      = $Branch_code;
            $Output['application_no']   = $JointAccountRow->application_mo;
            $Output['account_no']       = $JointAccountRow->account_no;
            $Output['account_date']     = Helper::getFromDate_simple($JointAccountRow->application_date);
            $Output['account_type']     = 'Joint Account Holder';
            $Output['member_role']      = 'Self';
            $Output['balance']          = $JointAccountRow->available_balance;
            $Output['status']           = ucfirst($JointAccountRow->status);
            $OutputArr[] = $Output;
        }

        $RDQuery = RecurringDeposit::query();
        $RDQuery->where('customer_id',$custID);    
        $RDRows = $RDQuery->where('delete_status','0')->orderBy('id', 'DESC')->get();

        foreach ($RDRows as $key => $RDRow) {
            $Branch_code                = Admin::where('id', @$RDRow->created_by)->pluck('branch_code')->first();

            $Output['branch_code']      = $Branch_code;
            $Output['application_no']   = $RDRow->application_mo;
            $Output['account_no']       = $RDRow->account_no;
            $Output['account_date']     = Helper::getFromDate_simple($RDRow->application_date);
            $Output['account_type']     = 'RD Account';
            $Output['member_role']      = 'Self';
            $Output['balance']          = $RDRow->available_balance;
            $Output['status']           = ucfirst($RDRow->status);
            $OutputArr[] = $Output;
        }

        $RDJointQuery = RecurringDeposit::query();
        $RDJointQuery->where('joint_customer_id',$custID);    
        $RDJointRows = $RDJointQuery->where('delete_status','0')->orderBy('id', 'DESC')->get();

        foreach ($RDJointRows as $key => $RDJointRow) {
            $Branch_code                = Admin::where('id', @$RDJointRow->created_by)->pluck('branch_code')->first();

            $Output['branch_code']      = $Branch_code;
            $Output['application_no']   = $RDJointRow->application_mo;
            $Output['account_no']       = $RDJointRow->account_no;
            $Output['account_date']     = Helper::getFromDate_simple($RDJointRow->application_date);
            $Output['account_type']     = 'RD Joint Account Holder';
            $Output['member_role']      = 'Self';
            $Output['balance']          = $RDJointRow->available_balance;
            $Output['status']           = ucfirst($RDJointRow->status);
            $OutputArr[] = $Output;
        }

        $FDQuery = FixedDeposit::query();
        $FDQuery->where('customer_id',$custID);    
        $FDRows = $FDQuery->where('delete_status','0')->orderBy('id', 'DESC')->get();

        foreach ($FDRows as $key => $FDRow) {
            $Branch_code                = Admin::where('id', @$FDRow->created_by)->pluck('branch_code')->first();

            $Output['branch_code']      = $Branch_code;
            $Output['application_no']   = $FDRow->application_mo;
            $Output['account_no']       = $FDRow->account_no;
            $Output['account_date']     = Helper::getFromDate_simple($FDRow->application_date);
            $Output['account_type']     = 'FD Account';
            $Output['member_role']      = 'Self';
            $Output['balance']          = $FDRow->available_balance;
            $Output['status']           = ucfirst($FDRow->status);
            $OutputArr[] = $Output;
        }

        $FDJointQuery = FixedDeposit::query();
        $FDJointQuery->where('joint_customer_id',$custID);    
        $FDJointRows = $FDJointQuery->where('delete_status','0')->orderBy('id', 'DESC')->get();

        foreach ($FDJointRows as $key => $FDJointRow) {
            $Branch_code                = Admin::where('id', @$FDJointRow->created_by)->pluck('branch_code')->first();
            $Output['branch_code']      = $Branch_code;
            $Output['application_no']   = $FDJointRow->application_mo;
            $Output['account_no']       = $FDJointRow->account_no;
            $Output['account_date']     = Helper::getFromDate_simple($FDJointRow->application_date);
            $Output['account_type']     = 'FD Joint Account Holder';
            $Output['member_role']      = 'Self';
            $Output['balance']          = $FDJointRow->available_balance;
            $Output['status']           = ucfirst($FDJointRow->status);
            $OutputArr[] = $Output;
        }


        $BusinessLoanQuery = BusinessLoan::query();
        $BusinessLoanQuery->where('customer_id',$custID);    
        $BusinessLoanRows = $BusinessLoanQuery->where('delete_status','0')->orderBy('id', 'DESC')->get();
        foreach ($BusinessLoanRows as $key => $BusinessLoanRow) {

            $Branch_code           = Admin::where('id', @$BusinessLoanRow->created_by)->pluck('branch_code')->first();
            $Output['branch_code']      = $Branch_code;
            $Output['application_no']   = $BusinessLoanRow->application_mo;
            $Output['account_no']       = $BusinessLoanRow->account_no;
            $Output['account_date']     = Helper::getFromDate_simple($BusinessLoanRow->application_date);
            $Output['account_type']     = 'Business Loan';
            $Output['member_role']      = 'Self';
            $Output['balance']          = $BusinessLoanRow->available_balance;
            $Output['status']           = ucfirst($BusinessLoanRow->status);
            $OutputArr[] = $Output;
        }

        return $OutputArr;
    }


     public static function updateCustomer_NoOfShare($memberID,$no_of_share,$type){
        $ShareDetails           = User::where('id',$memberID)->first();
        if($type == 'add'){
            $UpdatedShareDetails = $ShareDetails->no_of_share + $no_of_share;
        }else{
            $UpdatedShareDetails = $ShareDetails->no_of_share - $no_of_share;
        }
        $addResult = User::where('id',$memberID)->update([
          'no_of_share'      => $UpdatedShareDetails,
        ]);

        return $addResult;
    }

     public static function get_ledgersName($LedgerID){
        $query = Ledger::query();
        $query->where('id',$LedgerID);    
        $rows = $query->first();
        return $rows->title;
    }
    
    
    public static function get_PaymentCollectionLoan(){

        $rows = DB::table('loan_emis')
                ->where('status','pending')
                ->where('created_by',Auth::guard('admin')->user()->id)
                ->where('emi_date','<',date('Y-m-d'))
                ->select('loan_id','due_date','emi_date','emi','interest','outstanding','advance_amount','payment_date', DB::raw('count(*) as total'), DB::raw('SUM(emi) as total_amount'))
                ->groupBy('loan_id')
                ->orderBy('id', 'DESC')
                ->get();

        return $rows;
    }

    public static function get_PaymentCollectionLoan_by_loan($loan_id){

        $rows = DB::table('loan_emis')
                ->where('status','pending')
                ->where('loan_id',$loan_id)
                ->where('created_by',Auth::guard('admin')->user()->id)
                ->where('emi_date','<',date('Y-m-d'))
                ->select('loan_id','due_date','emi_date','emi','interest','outstanding','advance_amount','payment_date', DB::raw('count(*) as total'), DB::raw('SUM(emi) as total_amount'))
                ->groupBy('loan_id')
                ->orderBy('id', 'DESC')
                ->first();

        $total_amount = 0;    
        if($rows){
            if($rows->total_amount){
                $total_amount = $rows->total_amount;
            }    
        }
        
        return $total_amount;
    }
    
      public static function PenaltyCalculation($loan_id){

        $loan_details  = BusinessLoan::where('uuid',$loan_id)->first();
        $scheme_id = $loan_details->scheme_id;
        $SchemePenaltyDetails  = LoanSchemePenaltyCharts::where('loan_scheme_id',$scheme_id)->first();
        $rows = DB::table('loan_emis')
                ->where('status','pending')
                ->where('loan_id',$loan_id)
                ->where('created_by',Auth::guard('admin')->user()->id)
                ->where('due_date','<',date('Y-m-d'))
                ->get();
        $penaltyCharges = 0;
        if ($rows) {
            foreach ($rows as $key => $row) {
                $PenaltyCountDays   = $SchemePenaltyDetails->from_days;
                $PenaltyAmount      = $SchemePenaltyDetails->parameter;
                $FinalDueDate       =  Carbon::parse($row->due_date)->addDays($PenaltyCountDays)->format('Y-m-d');
                if($row->due_date < $FinalDueDate){
                    $penaltyCharges += $PenaltyAmount;
                }
            }
        }

        return $penaltyCharges;
    }

    public static function get_PaymentCollectionDeposite_single($RD_ID){

        $rows = DB::table('recurring_deposit_emis')
                ->where('recurring_deposit_id',$RD_ID)
                ->where('created_by',Auth::guard('admin')->user()->id)
                ->where('due_date','<',date('Y-m-d'))
                ->select('recurring_deposit_id','due_date','to_date','amount','interest','maturity_amount','advance_amount','payment_date', DB::raw('count(*) as total'), DB::raw('SUM(amount) as total_amount'))
                ->groupBy('recurring_deposit_id')
                ->first();

         $total_amount = 0;    
        if($rows->total_amount){
            $total_amount = $rows->total_amount;
        }
        return $total_amount;
    }
    
     public static function SingleEmiPenaltyCalculation($loan_id,$EmiID){

        $loan_details  = BusinessLoan::where('uuid',$loan_id)->first();
        $scheme_id = $loan_details->scheme_id;
        $SchemePenaltyDetails  = LoanSchemePenaltyCharts::where('loan_scheme_id',$scheme_id)->first();
        $rows = DB::table('loan_emis')
                ->where('status','pending')
                ->where('id',$EmiID)
                ->where('created_by',Auth::guard('admin')->user()->id)
                ->get();
        $penaltyCharges = 0;
        if ($rows) {
            foreach ($rows as $key => $row) {
                $PenaltyCountDays   = $SchemePenaltyDetails->from_days;
                $PenaltyAmount      = $SchemePenaltyDetails->parameter;
                $FinalDueDate       =  Carbon::parse($row->due_date)->addDays($PenaltyCountDays)->format('Y-m-d');
                if($row->due_date < $FinalDueDate){
                    $penaltyCharges += $PenaltyAmount;
                }
            }
        }

        return $penaltyCharges;
    }

    
        public function BusinessLoanDetails($uuid){
            $row  = BusinessLoan::with('customer','agent')->where('uuid',$uuid)->first();
            return $row;
        }

        
      public static function get_customer_address($custID,$address_type){
        $query = User::query();
        $query->where('id',$custID);    
        $rows = $query->with('state','city','permanent_state','permanent_city')->first();
        
        $address = '';
        
        if($address_type == 'present'){
            
            $address .= !empty($rows->present_address1) ? $rows->present_address1.',' : '';
            $address .= !empty($rows->present_address2) ? $rows->present_address2.',' : '';
            $address .= !empty($rows->present_ward) ? $rows->present_ward.',' : '';
            $address .= !empty($rows->present_area) ? $rows->present_area.',' : '';
            $address .= !empty($rows->state->title) ? $rows->state->title.',' : '';
            $address .= !empty($rows->city->title) ? $rows->city->title.',' : '';
            $address .= !empty($rows->present_pin_code) ? $rows->present_pin_code.',' : '';
            
        }else{
            
           $address .= !empty($rows->permanent_address1) ? $rows->permanent_address1.',' : '';
            $address .= !empty($rows->permanent_address2) ? $rows->permanent_address2.',' : '';
            $address .= !empty($rows->permanent_ward) ? $rows->permanent_ward.',' : '';
            $address .= !empty($rows->permanent_area) ? $rows->permanent_area.',' : '';
            $address .= !empty($rows->permanent_state->title) ? $rows->permanent_state->title.',' : '';
            $address .= !empty($rows->permanent_city->title) ? $rows->permanent_city->title.',' : '';
            $address .= !empty($rows->present_pin_code) ? $rows->present_pin_code.',' : '';
        }
        
        
        return $address;
    }
    
     public static function get_preclose_recuring_deposit($rd_id){


        $rows = DB::table('recurring_deposit_emis')
                ->where('recurring_deposit_id',@$rd_id)
                ->where('created_by',Auth::guard('admin')->user()->id)
                ->where('due_date','<',date('Y-m-d'))
                ->select('recurring_deposit_id','due_date','to_date','amount','interest','maturity_amount','advance_amount','payment_date', DB::raw('count(*) as total'), DB::raw('SUM(interest) as total_interest'))
                ->groupBy('recurring_deposit_id')
                ->first();
        $total_interest = 0;    
        if(!empty($rows->total_interest)){
            $total_interest = $rows->total_interest;
        }
        return $total_interest;
    }
    
    public static function get_cashbook_Transation(){
          $query = TransationHistory::query();
            if(Auth::guard('admin')->user()->user_type != 'admin'){
                $query->where('created_by',Auth::guard('admin')->user()->id);    
            }
            $rows = $query->with('customer','createdBy','account','rd_account','fd_account','loan_account')
                            ->where('delete_status','0')
                            ->whereIn('tran_page_type', ['loan','fixedDeposit','recurring','saving','MemberShipFee'])
                            ->orderBy('id', 'DESC')->get();
            return $rows;
        }
         

     function getTenureLabel($emiPayout)
        {
            switch ($emiPayout) {
                case 'Daily':
                    return 'Days';
                case 'Weekly':
                    return 'Weeks';
                case 'Bi weekly':
                        return 'BiWeeks';  
                case 'Monthly':
                        return 'Months'; 
                case 'Quarterly':
                        return 'Quarters';
                case 'Half yearly':
                        return 'Half Years';
                case 'Yearly':
                        return 'Years';                                 
                default:
                    return 'Month';
            }
        }
        
        


    /* end Business Loan  */




}