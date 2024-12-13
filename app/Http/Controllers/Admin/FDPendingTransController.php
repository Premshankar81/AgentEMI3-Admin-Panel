<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransationHistory;
use App\Models\SavingAccount;
use App\Models\RecurringDepositEmi;
use Excel;
use App\Exports\CategoryExport;
use App\Models\RecurringDeposit;
use App\Models\FixedDeposit;
use Auth;
use Helper;


class FDPendingTransController extends Controller
{

public function index()
{
    $data['page_title'] = 'FD Pending Transation';
    return view('admin.templates.fd_pending_transactions.fd_pending_transactions',compact('data'));
}

function list()
{
    $rows = Helper::get_Pending_FD_Transation();
    $html = view('admin.templates.fd_pending_transactions.records', compact('rows'))->render();
    return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
}

 public function get_row(Request $oRequest){
    
    $row  = TransationHistory::with('customer','fd_account','ledger')->where('id',$oRequest->id)->first();
    $html_row = view('admin.templates.fd_pending_transactions.transation_pending_ui',compact('row'))->render();
    return response()->json(array('data'=>$row,'html_row'=>$html_row,'status' => 1,'msg'=>'Successfully Inserted'));
}

public function update_row(Request $oRequest)
{
    $addResult = TransationHistory::where('id',$oRequest->update_id)->update([
      'status'    => $oRequest->transation_status,
    ]);
    if($addResult){
        
        $AvailableBalance = 0;
        $updateAvailable  = TransationHistory::with('fd_account','ledger')->where('id',$oRequest->update_id)->first();
        
        $RDAccountAvailable  = FixedDeposit::where('id',$updateAvailable->fd_account->id)->first();
        if($updateAvailable->transation_type == 'credit'){
            $AvailableBalance = $RDAccountAvailable->available_balance + $updateAvailable->amount;    
        }else{
            $AvailableBalance = $RDAccountAvailable->available_balance - $updateAvailable->amount;    
        }
        $RDAccountAvailable->available_balance = $AvailableBalance;
        $RDAccountAvailable->save();

        if($updateAvailable->close_status == 1){
            FixedDeposit::where('id',$updateAvailable->account_id)->update([
              'status'      => 'preClosed',
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
