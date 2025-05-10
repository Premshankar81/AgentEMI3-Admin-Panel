<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransationHistory;
use App\Models\SavingAccount;
use App\Models\User;
use Excel;
use App\Exports\CategoryExport;
use Auth;
use Helper;


class PendingMembersController extends Controller
{
  
    public function index()
    {
        
       
        $data['page_title'] = 'Pending Customers for authentication';
        return view('admin.templates.pendingMembers.pendingMembers',compact('data'));
    }

    function listPending()
    {
        $rows = Helper::get_PendingMembers();
        $html = view('admin.templates.pendingMembers.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }
    
     public function memberApprovalView(Request $oRequest){
        $row  = User::where('customer_id',$oRequest->id)->first();
        $data['page_title'] = 'Member information verification';
        return view('admin.templates.pendingMembers.pendingMembers',compact('data','row'));
    }
    public function updateStatus(Request $oRequest)
    {
        $addResult = User::where('id',$oRequest->update_id)->update([
          'status'                      => $oRequest->memberstatus,
        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'RD Application successfully Approved'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }



}
