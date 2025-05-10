<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransationHistory;
use App\Models\SavingAccount;
use Excel;
use App\Exports\CategoryExport;
use Auth;
use Helper;


class PendingAgentCollectionPaymentController extends Controller
{
  
    public function index()
    {
        $data['page_title'] = 'Agent Pending Colleaction Transation';
        $agentId = '';
        if(isset($_REQUEST['agentId']) && $_REQUEST['agentId']){
            $agentId = $_REQUEST['agentId'];
        }
        $rows = Helper::get_PaymentPendingFromAgent($agentId);
        $total_amount = Helper::total_PaymentPendingFromAgent($agentId);
        
       
        return view('admin.templates.AgentCommissionPayment.agent-commission-payment',compact('data','rows','total_amount'));
    }

    function list()
    {
        $rows = Helper::get_PaymentPendingFromAgent($agentId);
        $html = view('admin.templates.AgentCommissionPayment.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

     public function get_row(Request $oRequest){
        
        $row  = TransationHistory::with('customer','account','ledger')->where('id',$oRequest->id)->first();
        $html_row = view('admin.templates.AgentCommissionPayment.transation_pending_ui',compact('row'))->render();
        return response()->json(array('data'=>$row,'html_row'=>$html_row,'status' => 1,'msg'=>'Successfully Inserted'));
    }

    public function update_row(Request $oRequest)
    {
        $addResult = TransationHistory::where('id',$oRequest->update_id)->update([
          'agent_payment_status'    => $oRequest->agent_payment_status,
        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }
    public function delete_row(Request $oRequest)
    {
        $Result = Category::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }
     
     public function bulkUpdate_row(Request $oRequest)
    {
        $rows = Helper::get_PaymentPendingFromAgent($oRequest->agent_id);
        
        foreach($rows as $row){
            $addResult = TransationHistory::where('id',$row->id)->update([
              'agent_payment_status'    => 'completed',
            ]);    
        }
        
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'No Record update'));
        }
    }
    
     
     
     

}
