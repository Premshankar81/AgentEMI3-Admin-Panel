<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DirectorPromoters;
use Excel;
use App\Exports\CityExport;
use Auth;
use Helper;

class DirectorPromotersController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Director Promoters';
        return view('admin.templates.director_promoters.director_promoters',compact('data'));
    }

    public function create()
    {
        $data['page_title'] = 'Director Promoters';
        $Members = Helper::GetMembers();
        $Classes = Helper::getClass();
        $Ledgers = Helper::get_ledgers();
        $banks = Helper::getBank();
        
        return view('admin.templates.director_promoters.director_promoters',compact('data','Members','Classes','banks','Ledgers'));
    }

   function store(Request $oRequest)
    {
       
        $oRequest->offsetSet('created_by',Auth::guard('admin')->user()->id);
        $oRequest->offsetSet('customer_id',Helper::generate_uuid());

        $NewCustomerCode =  Helper::get_Director_number();

        $oRequest->offsetSet('customer_code',$NewCustomerCode['customer_code']);
        $oRequest->offsetSet('folio_code',$NewCustomerCode['folio_code']);

        $checkExist = DirectorPromoters::where('delete_status','0')->where('customer_code',$oRequest->customer_code)->first();
        if ($checkExist){
            return response()->json(array('status' => 2,'msg'=> 'This customer already added'));
        }else{

            $addResult = DirectorPromoters::create($oRequest->all());
            if($addResult){
                return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
            }else{ 
                    return response()->json(array('status' => 0,'msg'=>'Error'));
            }
        }
    }
    
    function list()
    {
        $rows = Helper::get_director_promoters();
        $html = view('admin.templates.director_promoters.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

    public function edit_row(Request $oRequest){
        $data['page_title'] = 'Update Allocate Share';
        $row  = DirectorPromoters::where('customer_id',$oRequest->id)->first();
        $Classes = Helper::getClass();
        $Ledgers = Helper::get_ledgers();
        $banks = Helper::getBank();
        return view('admin.templates.director_promoters.director_promoters',compact('data','row','Classes','banks','Ledgers'));
    }

     public function get_row(Request $oRequest){
        $row  = DirectorPromoters::where('id',$oRequest->id)->first();
        $data['page_title'] = 'Director Promoters';
        return view('admin.templates.director_promoters.director_promoters',compact('data','row'));
    }

    public function view_row(Request $oRequest){
        $row  = DirectorPromoters::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Director / Promoters';
        return view('admin.templates.director_promoters.director_promoters',compact('data','row'));
    }

    public function view_address(Request $oRequest){
        $row  = DirectorPromoters::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Director / Promoters Address Detail';
        $states =  Helper::getState();
        $present_cities =  Helper::getCity_ByState($row['present_state_id']);
        $permanent_cities =  Helper::getCity_ByState($row['permanent_state_id']);
        return view('admin.templates.director_promoters.director_promoters',compact('data','row','states','present_cities','permanent_cities'));
    }



    public function view_address_store(Request $oRequest)
    {
        $addResult = DirectorPromoters::where('customer_id',$oRequest->update_id)->update([
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

      public function view_profession_detail(Request $oRequest){
        $row  = DirectorPromoters::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Director / Promoters Address Detail';
        $states =  Helper::getState();
        $cities =  Helper::getCity_ByState($row['cust_prof_state_id']);
        return view('admin.templates.director_promoters.director_promoters',compact('data','row','states','cities'));
    }

     public function profession_detail_store(Request $oRequest)
    {
        $addResult = DirectorPromoters::where('customer_id',$oRequest->update_id)->update([
          'cust_prof_occupation'        => $oRequest->cust_prof_occupation,
          'cust_prof_type'              => $oRequest->cust_prof_type,
          'cust_prof_business'          => $oRequest->cust_prof_business,
          'cust_prof_address1'          => $oRequest->cust_prof_address1,
          'cust_prof_address2'          => $oRequest->cust_prof_address2,

          'cust_prof_state_id'          => $oRequest->cust_prof_state_id,
          'cust_prof_city_id'           => $oRequest->cust_prof_city_id,
          'cust_prof_pin_code'          => $oRequest->cust_prof_pin_code,
          'cust_prof_monthly_income'    => $oRequest->cust_prof_monthly_income,

        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }

      public function view_bankDetail(Request $oRequest){
        $row  = DirectorPromoters::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Bank detail';
        return view('admin.templates.director_promoters.director_promoters',compact('data','row'));
    }
    public function bankDetail_store(Request $oRequest)
    {
        $addResult = DirectorPromoters::where('customer_id',$oRequest->update_id)->update([
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
      public function view_nominee(Request $oRequest){
        $row  = DirectorPromoters::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Bank detail';
        return view('admin.templates.director_promoters.director_promoters',compact('data','row'));
    }

    public function nominee_store(Request $oRequest)
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
            $addResult = DirectorPromoters::where('customer_id',$oRequest->update_id)->update([
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

    

    public function update_row(Request $oRequest)
    {
        $addResult = DirectorPromoters::where('customer_id',$oRequest->update_id)->update([
          'joining_date'        => $oRequest->joining_date,
          'din'                 => $oRequest->din,
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
          'latitude'            => $oRequest->latitude,
          'longitude'           => $oRequest->longitude,
          'aadharcard_no'       => $oRequest->aadharcard_no,
          'pan'                 => $oRequest->pan,
          'voter_id_no'         => $oRequest->voter_id_no,
          'ration_card_no'      => $oRequest->ration_card_no,
          'driving_license_no'  => $oRequest->driving_license_no,
          'passport_no'         => $oRequest->passport_no,
          'is_director'         => $oRequest->is_director,
          'is_promoters'        => $oRequest->is_promoters,
          'appointment_date'    => $oRequest->appointment_date,
          'class_id'            => $oRequest->class_id,
          
        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    public function delete_row(Request $oRequest)
    {
        $Result = DirectorPromoters::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }

    

    




}
