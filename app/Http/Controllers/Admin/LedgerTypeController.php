<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LedgerTpye;
use Excel;
use App\Exports\LedgerTpyeExport;
use Auth;
use Helper;

class LedgerTypeController extends Controller
{
  
    public function index()
    {
        $data['page_title'] = 'Ledger Type';
        $rows = LedgerTpye::where('delete_status','0')->get();
        return view('admin.templates.ledger_type.ledger_type',compact('data','rows'));
    }

    function store(Request $oRequest)
    {
        $slug = Helper::slugify($oRequest->title);
        $oRequest->offsetSet('slug', $slug );
        $oRequest->offsetSet('created_by', Auth::guard('admin')->user()->id);

        $checkExist = LedgerTpye::where('slug',$slug)->where('delete_status','0')->first();
        if ($checkExist){
            return response()->json(array('status' => 2,'msg'=> 'This Ledger Tpye Already Added'));
        }else{

	        $addResult = LedgerTpye::create($oRequest->all());
	        if($addResult){
	        	return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
	    	}else{ 
	                return response()->json(array('status' => 0,'msg'=>'Error'));
	        }
    	}
    }
    
    function list()
    {
        $rows = LedgerTpye::where('delete_status','0')->orderBy('id', 'DESC')->get();
        $html = view('admin.templates.ledger_type.records', compact('rows'))->render();
        
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }
    public function get_row(Request $oRequest)
    {
        $row  = LedgerTpye::where('id',$oRequest->id)->first();
        
        return response()->json(['data' => $row,'status' => '1']);
    }

    public function update_row(Request $oRequest)
    {
        $slug = Helper::slugify($oRequest->title);
        $addResult = LedgerTpye::where('id',$oRequest->update_id)->update([
          'title'     => $oRequest->update_title,
          'status'    => $oRequest->update_status,
          'slug'      => $slug
        ]);

        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    public function export()
    {
        $file_name = 'LedgerTpye_'.rand().'.xlsx';
          return Excel::download(new LedgerTpyeExport,$file_name);
    }

    public function delete_row(Request $oRequest)
    {
        $Result = LedgerTpye::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }

    

    




}
