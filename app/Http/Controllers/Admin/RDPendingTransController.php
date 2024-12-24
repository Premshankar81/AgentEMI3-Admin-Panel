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
use Auth;
use Helper;


class RDPendingTransController extends Controller
{

public function index()
{
    $data['page_title'] = 'RD Pending Transation';
    return view('admin.templates.rd_pending_transactions.rd_pending_transactions',compact('data'));
}

function list()
{
    $rows = Helper::get_Pending_RD_Transation();
    $html = view('admin.templates.rd_pending_transactions.records', compact('rows'))->render();
    return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
}

 public function get_row(Request $oRequest){
    

    $row  = TransationHistory::with('customer','rd_account','ledger')->where('id',$oRequest->id)->first();
    $html_row = view('admin.templates.rd_pending_transactions.transation_pending_ui',compact('row'))->render();
    return response()->json(array('data'=>$row,'html_row'=>$html_row,'status' => 1,'msg'=>'Successfully Inserted'));
}

public function update_row(Request $oRequest)
{
    $addResult = TransationHistory::where('id',$oRequest->update_id)->update([
      'status'    => $oRequest->transation_status,
    ]);
    if($addResult){
        $Final_RDAmount = 0;
        $updateAvailable  = TransationHistory::with('rd_account','ledger')->where('id',$oRequest->update_id)->first();
        if($updateAvailable->type == 'deposit'){

            $LastEMI  = RecurringDepositEmi::where('recurring_deposit_id',$updateAvailable->rd_account->uuid)
                                            ->where('status', 'pending')
                                            ->orderBy('id', 'ASC')
                                            ->first();
                                
            $Final_RDAmount = $updateAvailable->amount;
            if($LastEMI->advance_amount != ''){
                $Final_RDAmount = $LastEMI->advance_amount + $updateAvailable->amount;    
            }
            
            if($Final_RDAmount == $updateAvailable->rd_account->rd_amount){
                    
                $SavingAvailable  = RecurringDepositEmi::where('recurring_deposit_id',$updateAvailable->rd_account->uuid)
                                            ->where('status', 'pending')
                                            ->orderBy('id', 'ASC')
                                            ->first();
                                            
                $SavingAvailable->status            = 'paid';
                $SavingAvailable->advance_amount    = NULL;
                $SavingAvailable->payment_date      = date('Y-m-d');
                $SavingAvailable->save();
                    
            }
            
            if($updateAvailable->rd_account->rd_amount > $Final_RDAmount){
             
                $SavingAvailable  = RecurringDepositEmi::where('recurring_deposit_id',$updateAvailable->rd_account->uuid)
                                            ->where('status', 'pending')
                                            ->orderBy('id', 'ASC')
                                            ->first();
                $SavingAvailable->advance_amount    = $updateAvailable->amount;
                $SavingAvailable->save();
                    
            }
            
            if($Final_RDAmount > $updateAvailable->rd_account->rd_amount){
                
                $PendingRD  = RecurringDepositEmi::where('recurring_deposit_id',$updateAvailable->rd_account->uuid)
                                            ->where('status', 'pending')
                                            ->orderBy('id', 'ASC')
                                            ->get(); 
                foreach ($PendingRD as $key => $Pending_RD) {
                    
                    if($Final_RDAmount != 0){
                        if($Final_RDAmount >= $updateAvailable->rd_account->rd_amount){
    
                            //echo 'IF ='.$Final_RDAmount.'<br>';
                            $SavingAvailable  = RecurringDepositEmi::where('recurring_deposit_id',$updateAvailable->rd_account->uuid)
                                                ->where('status', 'pending')
                                                ->orderBy('id', 'ASC')
                                                ->first();
                            $SavingAvailable->status            = 'paid';
                            $SavingAvailable->advance_amount    = NULL;
                            $SavingAvailable->save();
    
                            $Final_RDAmount = $Final_RDAmount - $updateAvailable->rd_account->rd_amount;
                            
                        }else{
                            $SavingAvailable  = RecurringDepositEmi::where('recurring_deposit_id',$updateAvailable->rd_account->uuid)
                                            ->where('status', 'pending')
                                            ->orderBy('id', 'ASC')
                                            ->first();
                            $SavingAvailable->advance_amount    = $Final_RDAmount;
                            $SavingAvailable->payment_date      = date('Y-m-d');
                            $SavingAvailable->save();
                            $Final_RDAmount = 0;
                        }
                    }
                }
            }
        }
        
        $RDAccountAvailable  = RecurringDeposit::where('id',$updateAvailable->rd_account->id)->first();
        if($updateAvailable->transation_type == 'credit'){
            $AvailableBalance = $RDAccountAvailable->available_balance + $updateAvailable->amount;    
        }else{
            $AvailableBalance = $RDAccountAvailable->available_balance - $updateAvailable->amount;    
        }
        $RDAccountAvailable->available_balance = $AvailableBalance;
        $RDAccountAvailable->save();

        if($updateAvailable->close_status == 1){
            RecurringDeposit::where('id',$updateAvailable->account_id)->update([
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
