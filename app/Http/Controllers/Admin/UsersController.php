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

class UsersController extends Controller
{
  
    public function index()
    {
         
        $data['page_title'] = 'System Users';
        $rows = Admin::get();
        return view('admin.templates.users.users',compact('data','rows'));
    }

    function store(Request $oRequest)
    {
        $oRequest->offsetSet('created_at', Auth::guard('admin')->user()->id);
        
        $checkExist = Admin::where('delete_status','0')->where('user_type','user')->where('email',$oRequest->email)->first();
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
        $rows = Admin::where('delete_status','0')->where('user_type','user')->orderBy('id', 'DESC')->get();
        $html = view('admin.templates.users.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }
    public function get_row(Request $oRequest)
    {
        $row  = Admin::where('id',$oRequest->id)->first();
        return response()->json(['data' => $row,'status' => '1']);
    }

    public function update_row(Request $oRequest)
    {
        $addResult = Admin::where('id',$oRequest->update_id)->update([
          'name'     => $oRequest->update_name,
          'mobile'     => $oRequest->update_mobile,
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
        $file_name = 'user_'.rand().'.xlsx';
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
