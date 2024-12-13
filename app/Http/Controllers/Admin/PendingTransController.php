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


class PendingTransController extends Controller
{
  
    public function index()
    {
        $data['page_title'] = 'Pending Transation';
        return view('admin.templates.pending_transactions.pending_transactions',compact('data'));
    }

    function list()
    {
        $rows = Helper::get_PendingTransation();
        $html = view('admin.templates.pending_transactions.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

     public function get_row(Request $oRequest){
        
        $row  = TransationHistory::with('customer','account','ledger')->where('id',$oRequest->id)->first();
        $html_row = view('admin.templates.pending_transactions.transation_pending_ui',compact('row'))->render();
        return response()->json(array('data'=>$row,'html_row'=>$html_row,'status' => 1,'msg'=>'Successfully Inserted'));
    }

    public function update_row(Request $oRequest)
    {
        $addResult = TransationHistory::where('id',$oRequest->update_id)->update([
          'status'    => $oRequest->transation_status,
        ]);
        if($addResult){

            $updateAvailable  = TransationHistory::with('customer','account','ledger')->where('id',$oRequest->update_id)->first();
            $AvailableBalance = 0;
            if($updateAvailable->type == 'withdrawal'){
                $AvailableBalance = $updateAvailable->account->available_balance - $oRequest->tran_amount;    
            }else{
                $AvailableBalance = $updateAvailable->account->available_balance + $oRequest->tran_amount;    
            }
            $SavingAvailable  = SavingAccount::where('id',$updateAvailable->account_id)->first();
            $SavingAvailable->available_balance = $AvailableBalance;
            $SavingAvailable->save();

            if($updateAvailable->close_status == 1){
                SavingAccount::where('id',$updateAvailable->account_id)->update([
                  'status'      => 'closed',
                ]);    
            }
            

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

}
