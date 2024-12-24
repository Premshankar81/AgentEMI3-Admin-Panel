<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Excel;
use App\Exports\UsersExport;
use Auth;
use Helper;
use Illuminate\Support\Facades\Hash;

class BranchesController extends Controller
{
  
    public function index()
    {
        

        $data['page_title'] = 'Branches';
        $counties = Helper::getCountry();
        $rows = Admin::where('delete_status','0')->where('user_type','branch')->orderBy('id', 'DESC')->get();
        return view('admin.templates.branches.branches',compact('data','rows','counties'));
    }

    function store(Request $oRequest)
    {
        $oRequest->offsetSet('created_at', Auth::guard('admin')->user()->id);
        $oRequest->offsetSet('password', Hash::make($oRequest->password));

        $checkExist = Admin::where('delete_status','0')->where('user_type','branch')->where('email',$oRequest->email)->first();
        if ($checkExist){
            return response()->json(array('status' => 2,'msg'=> 'This user already added'));
        }else{

	        $addResult = Admin::create($oRequest->all());
	        if($addResult){
	        	return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
	    	}else{ 
	                return response()->json(array('status' => 0,'msg'=>'Error'));
	        }
    	}
    }
    
    function list()
    {
        $rows = Admin::where('delete_status','0')->where('user_type','branch')->orderBy('id', 'DESC')->get();
        $html = view('admin.templates.branches.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }
    public function get_row(Request $oRequest)
    {
        $row  = Admin::where('id',$oRequest->id)->first();
        $img_path = config('constants.SYSTEM');
        $image_url = '';
        if($row->image != ''){
            $row['image_url'] = $img_path.''.$row->image;
        }
        return response()->json(['data' => $row,'image_url'=>$image_url,'status' => '1']);
    }

    public function update_row(Request $oRequest)
    {
        $addResult = Admin::where('id',$oRequest->update_id)->update([
          'name'        => $oRequest->update_name,
          'email'       => $oRequest->update_email,
          'mobile'      => $oRequest->update_mobile,
          'country_id'  => $oRequest->update_country_id,
          'state_id'    => $oRequest->update_state_id,
          'city_id'     => $oRequest->update_city_id,

          'branch_code'     => $oRequest->update_branch_code,
          'pincode'         => $oRequest->update_pincode,
          'tax_name'        => $oRequest->update_tax_name,
          'tax_number'      => $oRequest->update_tax_number,
          'cin'             => $oRequest->update_cin,
          'website'         => $oRequest->update_website,
          'currency_symbol' => $oRequest->update_currency_symbol,
          'time_zone'       => $oRequest->update_time_zone,
          'opening_date'    => $oRequest->update_opening_date,
          'address_first'   => $oRequest->update_address_first,
          'address_second'   => $oRequest->update_address_second,

          'status'     => $oRequest->update_status,
        ]);

         if(isset($oRequest->change_password) && $oRequest->change_password !=""){
            $Result = Admin::where('id',$oRequest->update_id)->update([
              'password'      => Hash::make($oRequest->change_password)
            ]);
        }

        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }

    public function export()
    {
        $file_name = 'branches_'.rand().'.xlsx';
          return Excel::download(new UsersExport,$file_name);
    }

    public function delete_row(Request $oRequest)
    {
        //
        $Result = Admin::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);

        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }

    

    




}
