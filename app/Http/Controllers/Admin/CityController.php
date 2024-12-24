<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Excel;
use App\Exports\CityExport;
use Auth;
use Helper;

class CityController extends Controller
{
  
    public function index()
    {
        $data['page_title'] = 'City';
        $counties = Helper::getCountry();
        return view('admin.templates.city.city',compact('data','counties'));
    }

    function store(Request $oRequest)
    {
        $slug = Helper::slugify($oRequest->title);
        $oRequest->offsetSet('slug', $slug );
        $oRequest->offsetSet('created_at', Auth::guard('admin')->user()->id);

        $checkExist = City::where('slug',$slug)->where('delete_status','0')->first();
        if ($checkExist){
            return response()->json(array('status' => 2,'msg'=> 'This City Already Added'));
        }else{

	        $addResult = City::create($oRequest->all());
	        if($addResult){
	        	return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
	    	}else{ 
	                return response()->json(array('status' => 0,'msg'=>'Error'));
	        }
    	}
    }
    
    function list()
    {
        $rows = City::with('country','state')->where('delete_status','0')->orderBy('id', 'DESC')->get();
        $html = view('admin.templates.city.records', compact('rows'))->render();
        
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }
    public function get_row(Request $oRequest)
    {
        $row  = City::where('id',$oRequest->id)->first();
        
        return response()->json(['data' => $row,'status' => '1']);
    }

    public function update_row(Request $oRequest)
    {
        $slug = Helper::slugify($oRequest->title);
        $addResult = City::where('id',$oRequest->update_id)->update([
          'title'       => $oRequest->update_title,
          'country_id'  => $oRequest->update_country_id,
          'state_id'    => $oRequest->update_state_id,
          'status'      => $oRequest->update_status,
          'slug'        => $slug
        ]);

        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    public function export()
    {
        $file_name = 'City_'.rand().'.xlsx';
          return Excel::download(new CityExport,$file_name);
    }

    public function delete_row(Request $oRequest)
    {
        $Result = City::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }

    

    




}
