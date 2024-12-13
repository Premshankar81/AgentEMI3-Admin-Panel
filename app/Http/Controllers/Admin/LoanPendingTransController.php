<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransationHistory;
use App\Models\SavingAccount;
use App\Models\LoanEmi;
use Excel;
use App\Exports\CategoryExport;
use App\Models\BusinessLoan;
use Auth;
use Helper;


class LoanPendingTransController extends Controller
{

public function index()
{
    $data['page_title'] = 'Loan Pending Transation';
    return view('admin.templates.loan_pending_transactions.loan_pending_transactions',compact('data'));
}

function list()
{
    $rows = Helper::get_Pending_Loan_Transation();
    $html = view('admin.templates.loan_pending_transactions.records', compact('rows'))->render();
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
        $updateAvailable  = TransationHistory::with('loan_account','ledger')->where('id',$oRequest->update_id)->first();
        $loan_id    =   $updateAvailable->loan_account->uuid;
        
        if($updateAvailable->type == 'deposit'){

            $LastEMI  = LoanEmi::where('loan_id',$updateAvailable->loan_account->uuid)
                                            ->where('status', 'pending')
                                            ->orderBy('id', 'ASC')
                                            ->first();
            $Final_RDAmount = $updateAvailable->amount;
            if($LastEMI->advance_amount != ''){
                $Final_RDAmount = $LastEMI->advance_amount + $updateAvailable->amount;    
            }
            
            
            if($Final_RDAmount == $LastEMI->emi){
                    
                $LoanEmiPaid  = LoanEmi::where('loan_id',$updateAvailable->loan_account->uuid)
                                            ->where('status', 'pending')
                                            ->orderBy('id', 'ASC')
                                            ->first();
                
                $PenltyCharge = Helper::SingleEmiPenaltyCalculation($loan_id,$LoanEmiPaid->id);
                if($PenltyCharge != 0){
                    $LoanEmiPaid->penalty_status    = 'yes';
                    $LoanEmiPaid->penalty_amount    = $PenltyCharge;    
                }
                                            
                $LoanEmiPaid->status            = 'paid';
                $LoanEmiPaid->advance_amount    = NULL;
                $LoanEmiPaid->payment_date      = $updateAvailable->transation_date;
                $LoanEmiPaid->save();
                    
            }
            
            if($LastEMI->emi > $Final_RDAmount){
             
                $LoanEmiPaid  = LoanEmi::where('loan_id',$updateAvailable->loan_account->uuid)
                                            ->where('status', 'pending')
                                            ->orderBy('id', 'ASC')
                                            ->first();
                
                $PenltyCharge = Helper::SingleEmiPenaltyCalculation($loan_id,$LoanEmiPaid->id);
                if($PenltyCharge != 0){
                    $LoanEmiPaid->penalty_status    = 'yes';
                    $LoanEmiPaid->penalty_amount    = $PenltyCharge;    
                }

                $LoanEmiPaid->advance_amount    = $updateAvailable->amount;
                $LoanEmiPaid->payment_date      = $updateAvailable->transation_date;
                $LoanEmiPaid->save();
                    
            }
            
            if($Final_RDAmount > $LastEMI->emi){
                
           
                
                $PendingRD  = LoanEmi::where('loan_id',$updateAvailable->loan_account->uuid)
                                            ->where('status', 'pending')
                                            ->orderBy('id', 'ASC')
                                            ->get(); 
                foreach ($PendingRD as $key => $Pending_RD) {
                    
                    if($Final_RDAmount != 0){
                        if($Final_RDAmount >= $Pending_RD->emi){
    
                            //echo 'IF ='.$Final_RDAmount.'<br>';
                            $LoanEmiPaid  = LoanEmi::where('loan_id',$updateAvailable->loan_account->uuid)
                                                ->where('status', 'pending')
                                                ->orderBy('id', 'ASC')
                                                ->first();

                            $PenltyCharge = Helper::SingleEmiPenaltyCalculation($loan_id,$LoanEmiPaid->id);
                            if($PenltyCharge != 0){
                                $LoanEmiPaid->penalty_status    = 'yes';
                                $LoanEmiPaid->penalty_amount    = $PenltyCharge;    
                            }

                            $LoanEmiPaid->status            = 'paid';
                            $LoanEmiPaid->advance_amount    = NULL;
                            $LoanEmiPaid->payment_date      = $updateAvailable->transation_date;
                            $LoanEmiPaid->save();
    
                            $Final_RDAmount = $Final_RDAmount - $Pending_RD->emi;
                            
                        }else{
                            $LoanEmiPaid  = LoanEmi::where('loan_id',$updateAvailable->loan_account->uuid)
                                            ->where('status', 'pending')
                                            ->orderBy('id', 'ASC')
                                            ->first();
                            
                            $PenltyCharge = Helper::SingleEmiPenaltyCalculation($loan_id,$LoanEmiPaid->id);
                            if($PenltyCharge != 0){
                                $LoanEmiPaid->penalty_status    = 'yes';
                                $LoanEmiPaid->penalty_amount    = $PenltyCharge;    
                            }

                            $LoanEmiPaid->advance_amount    = $Final_RDAmount;
                            $LoanEmiPaid->payment_date      = $updateAvailable->transation_date;
                            $LoanEmiPaid->save();
                            $Final_RDAmount = 0;
                        }
                    }
                }
            }
        }
        
        $BusinessLoanAvailable  = BusinessLoan::where('id',$updateAvailable->loan_account->id)->first();
        if($updateAvailable->transation_type == 'credit'){
            $AvailableBalance = $BusinessLoanAvailable->available_balance + $updateAvailable->amount;    
        }else{
            $AvailableBalance = $BusinessLoanAvailable->available_balance - $updateAvailable->amount;    
        }
        $BusinessLoanAvailable->available_balance = $AvailableBalance;
        $BusinessLoanAvailable->save();

        if($updateAvailable->close_status == 1){
            BusinessLoan::where('id',$updateAvailable->account_id)->update([
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
