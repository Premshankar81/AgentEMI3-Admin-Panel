<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TransationHistory;
use Excel;
use App\Exports\CustomerExport;
use Auth;
use Helper;

class CustomerController extends Controller
{
  
    public function index()
    {
        $data['page_title'] = 'Customer';
        $NewCustomerCode =  Helper::get_Customer_number();
        
        return view('admin.templates.customer.customer',compact('data','NewCustomerCode'));
    }

    public function create()
    {
        $data['page_title'] = 'Add Customer';
        $NewCustomerCode =  Helper::get_Customer_number();
        $Classes =  Helper::getClass();
        $Ledgers = Helper::get_ledgers();
        $banks = Helper::getBank();
        return view('admin.templates.customer.customer',compact('data','NewCustomerCode','Classes','Ledgers','banks'));
    }

    function store_record(Request $oRequest)
    {
       
        $oRequest->offsetSet('created_by',Auth::guard('admin')->user()->id);
        $oRequest->offsetSet('customer_id',Helper::generate_uuid());

        $NewCustomerCode =  Helper::get_Customer_number();

        $oRequest->offsetSet('customer_code',$NewCustomerCode['customer_code']);
        $oRequest->offsetSet('folio_code',$NewCustomerCode['folio_code']);

        $checkExist = User::where('delete_status','0')->where('customer_code',$oRequest->customer_code)->first();
        if ($checkExist){
            return response()->json(array('status' => 2,'msg'=> 'This customer already added'));
        }else{

	        $addResult = User::create($oRequest->all());
	        if($addResult){
	        	return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
	    	}else{ 
	                return response()->json(array('status' => 0,'msg'=>'Error'));
	        }
    	}
    }
    
    function list()
    {
        $rows =  Helper::get_active_customer();
        //$rows = User::where('delete_status','0')->orderBy('id', 'DESC')->get();
        $html = view('admin.templates.customer.records', compact('rows'))->render();
         $NewCustomerCode =  Helper::get_Customer_number();
        return response()->json(array('html'=>$html,'code'=>$NewCustomerCode,'status' => 1,'msg'=>'Successfully Inserted'));
    }
   
    public function get_row(Request $oRequest){
        $row  = User::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Customer';
        return view('admin.templates.customer.customer',compact('data','row'));
    }

    public function manage_row(Request $oRequest){
        $row  = User::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Customer Basic Info';
          $Classes =  Helper::getClass();
        return view('admin.templates.customer.customer',compact('data','row','Classes'));
    }
    public function update_row(Request $oRequest)
    {
        $addResult = User::where('customer_id',$oRequest->update_id)->update([
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
          
          'class_id'         => $oRequest->class_id,

        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }

    

    public function export()
    {
        $file_name = 'Customer'.rand().'.xlsx';
          return Excel::download(new CustomerExport,$file_name);
    }

    public function delete_row(Request $oRequest)
    {
        //
        $Result = User::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }


     /* Start :: Address Get & update */

     public function address_row(Request $oRequest){
        $row  = User::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Customer Address Detail';
        $states =  Helper::getState();
        $present_cities =  Helper::getCity_ByState($row['present_state_id']);
        $permanent_cities =  Helper::getCity_ByState($row['permanent_state_id']);
        return view('admin.templates.customer.customer',compact('data','row','states','present_cities','permanent_cities'));
    }
    public function update_address(Request $oRequest)
    {
        $addResult = User::where('customer_id',$oRequest->update_id)->update([
          'residense_type'              => $oRequest->residense_type,
          'stability'                   => $oRequest->stability,
          'present_residence_type'      => $oRequest->present_residence_type,
          'present_address1'            => $oRequest->present_address1,
          'present_address2'            => $oRequest->present_address2,
          'present_ward'                => $oRequest->present_ward,
          'present_area'                => $oRequest->present_area,
          'present_state_id'            => $oRequest->present_state_id,
          'present_city_id'             => $oRequest->present_city_id,
          'present_pin_code'            => $oRequest->present_pin_code,
          'permanent_residence_type'    => $oRequest->permanent_residence_type,
          'permanent_address1'          => $oRequest->permanent_address1,
          'permanent_address2'          => $oRequest->permanent_address2,
          'permanent_ward'              => $oRequest->permanent_ward,
          'permanent_area'              => $oRequest->permanent_area,
          'permanent_state_id'          => $oRequest->permanent_state_id,
          'permanent_city_id'           => $oRequest->permanent_city_id,
          'permanent_pin_code'          => $oRequest->permanent_pin_code,

        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }

    /* End :: Address Get & update */
    
    /* Start :: BankDetails Get & update */

    public function bankDetail_row(Request $oRequest){
        $row  = User::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Bank Details';
        return view('admin.templates.customer.customer',compact('data','row'));
    }
    public function update_bankDetail(Request $oRequest)
    {
        $addResult = User::where('customer_id',$oRequest->update_id)->update([
          'ifsc_code'         => $oRequest->ifsc_code,
          'bank_name'         => $oRequest->bank_name,
          'bank_address'      => $oRequest->bank_address,
          'account_type'      => $oRequest->account_type,
          'account_no'        => $oRequest->account_no,

        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }
    
    /* End :: BankDetails Get & update */

    /* Start :: professionDetail Get & update */

    public function professionDetail_row(Request $oRequest){
        $row  = User::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Profession Detail';
        $states =  Helper::getState();
        $cities =  Helper::getCity_ByState($row['cust_prof_state_id']);
        return view('admin.templates.customer.customer',compact('data','row','states','cities'));
    }

    public function professionDetail_update(Request $oRequest)
    {
        $addResult = User::where('customer_id',$oRequest->update_id)->update([
          'cust_prof_occupation'        => $oRequest->cust_prof_occupation,
          'cust_prof_type'              => $oRequest->cust_prof_type,
          'cust_prof_business'          => $oRequest->cust_prof_business,
          'cust_prof_address1'          => $oRequest->cust_prof_address1,
          'cust_prof_address2'          => $oRequest->cust_prof_address2,

          'cust_prof_state_id'          => $oRequest->cust_prof_state_id,
          'cust_prof_city_id'           => $oRequest->cust_prof_city_id,
          'cust_prof_pin_code'          => $oRequest->cust_prof_pin_code,
          'cust_prof_mobile'            => $oRequest->cust_prof_mobile,
          'cust_prof_email'             => $oRequest->cust_prof_email,
          'cust_prof_monthly_income'    => $oRequest->cust_prof_monthly_income,

        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }
    /* End :: professionDetail Get & update */
    
    /* Start :: electricBillDetail Get & update */

    public function electricBillDetail_row(Request $oRequest){
        $row  = User::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Electric Bill Detail';
        return view('admin.templates.customer.customer',compact('data','row'));
    }

     public function electricBillDetail_update(Request $oRequest)
    {
        $addResult = User::where('customer_id',$oRequest->update_id)->update([
          'electric_meterno'            => $oRequest->electric_meterno,
          'electric_consumer_id'        => $oRequest->electric_consumer_id,
          'electric_owner_name'         => $oRequest->electric_owner_name,
          'electric_relation'           => $oRequest->electric_relation,
          'electric_last_bill_date'     => $oRequest->electric_last_bill_date,

        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }
    
    /* end :: electricBillDetail Get & update */


    /* Start :: memberNominee Get & update */
    public function memberNominee_row(Request $oRequest){
        $row  = User::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Member Nominee';
        return view('admin.templates.customer.customer',compact('data','row'));
    }

    public function memberNominee_update(Request $oRequest)
    {
        if(count($oRequest->nominee_name) > 0){
            for ($i=0; $i < count($oRequest->nominee_name) ; $i++) { 
                $Nominee['nominee_name']        = $oRequest['nominee_name'][$i];
                $Nominee['nominee_relation']    = $oRequest['nominee_relation'][$i];
                $Nominee['nominee_dob']         = $oRequest['nominee_dob'][$i];
                $Nominee['nominee_age']         = $oRequest['nominee_age'][$i];
                $Nominee['nominee_mobile']      = $oRequest['nominee_mobile'][$i];
                $Nominee['nominee_address']     = $oRequest['nominee_address'][$i];

                $Nominee['nominee_aadhar_no']   = $oRequest['nominee_aadhar_no'][$i];
                $Nominee['nominee_pan']         = $oRequest['nominee_pan'][$i];
                $Nominee['nominee_voter_id']    = $oRequest['nominee_voter_id'][$i];
                $Nominee['nominee_ration_card'] = $oRequest['nominee_ration_card'][$i];

                $Nominee_array1[] = $Nominee;    
            }
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
              'member_nominee'     => json_encode($Nominee_array1),
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
    /* End :: memberNominee Get & update */
 
    /* Start :: KYCManage Get & update */
    public function KYCManage_row(Request $oRequest){
        $row  = User::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'KYC Manage';
        return view('admin.templates.customer.customer',compact('data','row'));
    }

    public function KYCManage_update(Request $oRequest)
    {
         if($oRequest->file('kyc_passport') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_passport,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_passport'            => $file_name,
            ]);
        }
        if($oRequest->file('kyc_aadhaar_card_front') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_aadhaar_card_front,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_aadhaar_card_front'            => $file_name,
            ]);
        }
         if($oRequest->file('kyc_aadhaar_card_back') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_aadhaar_card_back,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_aadhaar_card_back'            => $file_name,
            ]);
        }

         if($oRequest->file('kyc_pan') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_pan,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_pan'            => $file_name,
            ]);
        }

        if($oRequest->file('kyc_voter_card') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_voter_card,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_voter_card'            => $file_name,
            ]);
        }

        if($oRequest->file('kyc_driving_license') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_driving_license,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_driving_license'            => $file_name,
            ]);
        }

        if($oRequest->file('kyc_ration_card') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_ration_card,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_ration_card'            => $file_name,
            ]);
        }

        if($oRequest->file('kyc_address_passport') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_passport,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_address_passport'            => $file_name,
            ]);
        }

        if($oRequest->file('kyc_address_aadhaar_card_front') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_aadhaar_card_front,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_address_aadhaar_card_front'            => $file_name,
            ]);
        }

        if($oRequest->file('kyc_address_aadhaar_card_back') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_aadhaar_card_back,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_address_aadhaar_card_back'            => $file_name,
            ]);
        }

        if($oRequest->file('kyc_address_kyc_voter_card') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_kyc_voter_card,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_address_kyc_voter_card'            => $file_name,
            ]);
        }
        if($oRequest->file('kyc_address_driving_license') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_driving_license,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_address_driving_license'            => $file_name,
            ]);
        }

        if($oRequest->file('kyc_address_ration_card') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_ration_card,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_address_ration_card'            => $file_name,
            ]);
        }

        if($oRequest->file('kyc_address_telephone_bill') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_telephone_bill,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_address_telephone_bill'            => $file_name,
            ]);
        }
         if($oRequest->file('kyc_address_bank_statement') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_bank_statement,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_address_bank_statement'            => $file_name,
            ]);
        }

        if($oRequest->file('kyc_address_electricity_bill') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_electricity_bill,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_address_electricity_bill'            => $file_name,
            ]);
        }

         if($oRequest->file('kyc_address_lpg_gas') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_lpg_gas,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_address_lpg_gas'            => $file_name,
            ]);
        }

        if($oRequest->file('kyc_address_trade_license') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_trade_license,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_address_trade_license'            => $file_name,
            ]);
        }

         if($oRequest->file('kyc_address_other_government_id') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_other_government_id,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_address_other_government_id'            => $file_name,
            ]);
        }

         if($oRequest->file('kyc_passport_photograph') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_passport_photograph,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_passport_photograph'            => $file_name,
            ]);
        }

        if($oRequest->file('kyc_signature') != ''){
            $img_path = public_path().config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_signature,$img_path);
            $addResult = User::where('customer_id',$oRequest->update_id)->update([
                'kyc_signature'            => $file_name,
            ]);
        }

        return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
     }
    /* End :: KYCManage Get & update */


     /* Start :: welcomeLetter Get & update */

    public function welcomeLetter_row(Request $oRequest){
        $row  = User::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Welcome Letter';
        return view('admin.templates.customer.customer',compact('data','row'));
    }

    public function welcomeLetter_print_row(Request $oRequest){
        $row  = User::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Welcome Letter';
        return view('admin.templates.customer.print_welcomeLetter',compact('data','row'));
    }

    /* End :: welcomeLetter Get & update */

    /* Start ::  applicationForm Get & update */
    public function applicationForm_row(Request $oRequest) {
        $row  = User::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Application Form';
        return view('admin.templates.customer.customer',compact('data','row'));
    }
    /* End ::  applicationForm Get & update */

    /* Start :: ApplicationForm Get & update */
    public function applicationForm_print_row(Request $oRequest){
        $row  = User::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Application Form';
        return view('admin.templates.customer.print_applicationForm',compact('data','row'));
    }

    /* End :: ApplicationForm Get & update */


    /* Start ::  MemberShipFeeManage Get & update */
    
    public function MemberShipFeeDetail(Request $oRequest) {
        $row  = User::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Member Fee';
        $Transations = Helper::get_MemberShipFeeTransation($row->id);
        return view('admin.templates.customer.customer',compact('data','row','Transations'));
    }


    public function MemberShipFeeManage_row(Request $oRequest) {
        $row  = User::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Member Fee';
        $Ledgers = Helper::get_ledgers();
        $banks = Helper::getBank();
        return view('admin.templates.customer.customer',compact('data','row','Ledgers','banks'));
    }
 public function delete_MemberShipFee_row(Request $oRequest)
    {
        //
        $Result = TransationHistory::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }


    
    function MemberShipFeeManage_add(Request $oRequest)
    {
       
        $TranDetails['type']                      = 'deposit';  //deport,widthow,recurring
        $TranDetails['transation_type']           = 'debit';  //credit,debit
        $TranDetails['user_type']                 = Auth::guard('admin')->user()->user_type; 
        $TranDetails['user_id']                   = Auth::guard('admin')->user()->id;
        $TranDetails['customer_id']               = @$oRequest->customer_id;
        $TranDetails['account_id']                = @$oRequest->customer_id;
        $TranDetails['amount']                    = @$oRequest->amount;
        $TranDetails['transation_date']           = @$oRequest->transation_date;
        $TranDetails['remarks']                   = 'Membership Fees Details';
        $TranDetails['payment_mode']              = @$oRequest->payment_mode;
        $TranDetails['bank_id']                   = @$oRequest->bank_id;
        $TranDetails['cheque_no']                 = @$oRequest->cheque_no;
        $TranDetails['reference_no']              = @$oRequest->reference_no;
        $TranDetails['cheque_date']               = @$oRequest->cheque_date;
        $TranDetails['bank_account_ledger_id']    = @$oRequest->bank_account_ledger_id;
        $TranDetails['status']                    = 'completed';
        $TranDetails['tran_page_type']            = 'MemberShipFee';
        $addResult = Helper::TransationDetails($TranDetails);
        if($addResult){
              return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
        }else{ 
              return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }


    public function ShareCertificateDetails(Request $oRequest) {
        $row  = User::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Share Certificate Details';
        $AllocatedShares = Helper::GetAllocateShareCertificatesByMember($row->id);
        return view('admin.templates.customer.customer',compact('data','row','AllocatedShares'));
    }

    /* End ::  MemberShipFeeManage Get & update */




    
    




}
