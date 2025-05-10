<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ledger;
use Excel;
use App\Exports\LedgerExport;
use Auth;
use Helper;

class LedgerController extends Controller
{
  
    public function index()
   {
        
        $data['page_title'] = 'Ledger Master';
        $rows = Ledger::where('delete_status','0')->get();
        $ledgerTypes = Helper::getLedgerType();
        $ledgerGroup = Helper::getLedgerGroup();
        
        return view('admin.templates.ledger.ledger',compact('data','rows','ledgerTypes','ledgerGroup'));
    }

    function store(Request $oRequest)
    {
        $slug = Helper::slugify($oRequest->title);
        $oRequest->offsetSet('slug', $slug );
        $oRequest->offsetSet('closing_balance',$oRequest->opening_balanace);
        $oRequest->offsetSet('created_by', Auth::guard('admin')->user()->id);
        $checkExist = Ledger::where('slug',$slug)->where('delete_status','0')->first();
        if ($checkExist){
            return response()->json(array('status' => 2,'msg'=> 'This Ledger Already Added'));
        }else{

	        $addResult = Ledger::create($oRequest->all());
	        if($addResult){
	        	return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
	    	}else{ 
	                return response()->json(array('status' => 0,'msg'=>'Error'));
	        }
    	}
    }
    
    function list()
    {
        $rows = Helper::get_ledgers();
        $html = view('admin.templates.ledger.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }
    public function get_row(Request $oRequest)
    {
        $row  = Ledger::where('id',$oRequest->id)->first();
        
        return response()->json(['data' => $row,'status' => '1']);
    }

    public function update_row(Request $oRequest)
    {
        $slug = Helper::slugify($oRequest->title);
        $addResult = Ledger::where('id',$oRequest->update_id)->update([
          'title'                       => $oRequest->update_title,
          'ledger_group'                => $oRequest->update_ledger_group,
          'opening_balanace'            => $oRequest->update_opening_balanace,
          'closing_balance'             => $oRequest->update_opening_balanace,
          'ledger_transaction_type'     => $oRequest->update_ledger_transaction_type,
          'type'                        => $oRequest->update_type,
          'status'                      => $oRequest->update_status,
          'slug'                        => $slug
        ]);

        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    public function export()
    {
        $file_name = 'Ledger_'.rand().'.xlsx';
          return Excel::download(new LedgerExport,$file_name);
    }

    public function delete_row(Request $oRequest)
    {
        $Result = Ledger::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }

    

    




}
