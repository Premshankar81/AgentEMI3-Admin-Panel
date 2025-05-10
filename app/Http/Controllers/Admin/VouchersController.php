<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vouchers;
use App\Models\VouchersDetails;
use App\Models\Ledger;
use Excel;
use App\Exports\VouchersExport;
use Auth;
use Helper;

class VouchersController extends Controller
{
  
    public function index()
    {
       
        $data['page_title'] = 'Vouchers';
        $rows = Helper::get_vouchers();
        
        $ledgers = Helper::getLedger();
        $new_vouchers_no =  Helper::get_Vouchers_number();
       
        return view('admin.templates.vouchers.vouchers',compact('data','rows','ledgers','new_vouchers_no'));
    }

    function store(Request $oRequest)
    {
    
        $slug = Helper::slugify($oRequest->title);
        $oRequest->offsetSet('slug', $slug);
        $oRequest->offsetSet('created_by', Auth::guard('admin')->user()->id);
        $checkExist = Vouchers::where('voucher_number',$oRequest->voucher_number)->where('delete_status','0')->first();
        if ($checkExist){
            return response()->json(array('status' => 2,'msg'=> 'This Vouchers Already Added'));
        }else{

	        $addResult = Vouchers::create($oRequest->all());

            $Debit_VouchersDetails = new VouchersDetails();
            $Debit_VouchersDetails['created_by']                    = Auth::guard('admin')->user()->id;
            $Debit_VouchersDetails['voucher_id']                    = $addResult->id;
            $Debit_VouchersDetails['transaction_type']              = 'debit';
            $Debit_VouchersDetails['ledger_account_close_balance']  = $oRequest->debit_ledger_account_close_balance;
            $Debit_VouchersDetails['ledger_account_amount']         = $oRequest->debit_ledger_account_amount;
            $Debit_VouchersDetails['debit_ledger_account_id']       = $oRequest->debit_ledger_account_id;
            $Debit_VouchersDetails['credit_ledger_account_id']      = $oRequest->debit_ledger_account_id;
            $Debit_VouchersDetails->save();    
            $total_debit = $oRequest->debit_ledger_account_amount;

            $debitAccount = Ledger::find($oRequest->debit_ledger_account_id);
            $debitAccount->closing_balance = $debitAccount->closing_balance - $oRequest->debit_ledger_account_amount;
            $debitAccount->save();
            $total_credit = 0;
            
            for ($i = 0; $i < count($oRequest->credit_ledger_account_id); $i++){
                if($oRequest->credit_ledger_account_id[$i] != ''){
                    $VouchersDetails = new VouchersDetails();
                    $VouchersDetails['created_by']                      = Auth::guard('admin')->user()->id;
                    $VouchersDetails['voucher_id']                      = $addResult->id;
                    $VouchersDetails['transaction_type']                = 'credit';
                    $VouchersDetails['ledger_account_close_balance']    = $oRequest->credit_ledger_account_close_balance[$i];
                    $VouchersDetails['ledger_account_amount']           = $oRequest->credit_ledger_account_amount[$i];
                    $VouchersDetails['debit_ledger_account_id']         = $Debit_VouchersDetails->id;
                    $VouchersDetails['credit_ledger_account_id']        = $oRequest->credit_ledger_account_id[$i];
                    $VouchersDetailsResult = $VouchersDetails->save();    
                    
                    $total_credit += $oRequest->credit_ledger_account_amount[$i];
                    $creditAccount = Ledger::find($oRequest->credit_ledger_account_id[$i]);
                    $creditAccount->closing_balance = $creditAccount->closing_balance + $oRequest->credit_ledger_account_amount[$i];
                    $creditAccount->save();
                    
                }
            }

            Vouchers::where('id',$addResult->id)->update([
                  'total_credit'      => $total_credit,
                  'total_debit'      => $total_debit
            ]);

	        if($addResult){
	        	return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
	    	}else{ 
	                return response()->json(array('status' => 0,'msg'=>'Error'));
	        }
    	}
    }
    
    function list()
    {
        $rows = Helper::get_vouchers();
        $html = view('admin.templates.vouchers.records', compact('rows'))->render();
        $new_vouchers_no =  Helper::get_Vouchers_number();
        return response()->json(array('html'=>$html,'voucher_no'=>$new_vouchers_no['voucher_no'],'unique_no'=>$new_vouchers_no['unique_no'],'status' => 1,'msg'=>'Successfully Inserted'));
    }
    public function get_row(Request $oRequest)
    {
        $row  = Vouchers::where('id',$oRequest->id)->first();
        $Debit_row  = VouchersDetails::where('delete_status','0')->where('transaction_type','debit')->where('voucher_id',$oRequest->id)->first();
        $Credit_row  = VouchersDetails::where('delete_status','0')->where('transaction_type','credit')->where('voucher_id',$oRequest->id)->get();
        $ledgers = Helper::getLedger();
        $creditHtml = view('admin.templates.vouchers.credit_rows', compact('Credit_row','ledgers'))->render();
        
        return response()->json(['data' => $row,'debit_data' => $Debit_row,'credit_row' => $creditHtml,'status' => '1']);
    }

    public function update_row(Request $oRequest)
    {
        $slug = Helper::slugify($oRequest->title);
        $addResult = Vouchers::where('id',$oRequest->update_id)->update([
          'title'           => $oRequest->update_title,
          'voucher_number'  => $oRequest->update_voucher_number,
          'voucher_date'       => $oRequest->update_voucher_date,
          'slug'      => $slug
        ]);

        $total_credit = 0;
        $total_debit = 0;

        for ($i = 0; $i < count($oRequest->update_vouchers_id); $i++){
            if($oRequest->update_ledger_account_id[$i] != ''){

                VouchersDetails::where('id',$oRequest->update_vouchers_id[$i])->update([
                      'voucher_id'              => $oRequest->update_id,
                      'transaction_type'        => $oRequest->update_transaction_type[$i],
                      'ledger_account_id'       => $oRequest->update_ledger_account_id[$i],
                      'ledger_account_close_balance'      => $oRequest->update_ledger_account_close_balance[$i],
                      'ledger_account_amount'      => $oRequest->update_ledger_account_amount[$i]
                ]);

                $total_credit += $oRequest->update_ledger_account_amount[$i];
                if($oRequest->update_transaction_type[$i] == 'debit'){ $total_debit = $oRequest->update_ledger_account_amount[$i]; }
                
            }
        }

        for ($ii = 0; $ii < count($oRequest->update_new_ledger_account_id); $ii++){
            if($oRequest->update_new_ledger_account_id[$ii] != ''){
                $VouchersDetails = new VouchersDetails();
                $VouchersDetails['created_by']         = Auth::guard('admin')->user()->id;
                $VouchersDetails['voucher_id']         = $oRequest->update_id;
                $VouchersDetails['transaction_type']   = $oRequest->update_new_transaction_type[$ii];
                $VouchersDetails['ledger_account_id']  = $oRequest->update_new_ledger_account_id[$ii];
                $VouchersDetails['ledger_account_close_balance'] = $oRequest->update_new_ledger_account_close_balance[$ii];
                $VouchersDetails['ledger_account_amount'] = $oRequest->update_new_ledger_account_amount[$ii];
                
                $VouchersDetailsResult = $VouchersDetails->save();    
                $total_credit += $oRequest->update_new_ledger_account_amount[$ii];
            }
        }

        Vouchers::where('id',$oRequest->update_id)->update([
              'total_credit'      => $total_credit,
              'total_debit'      => $total_debit
        ]);


        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    public function export()
    {
        $file_name = 'Vouchers_'.rand().'.xlsx';
          return Excel::download(new VouchersExport,$file_name);
    }

    public function delete_row(Request $oRequest)
    {
        
        $get_rows = VouchersDetails::where('voucher_id',$oRequest->update_id)->get();
        foreach($get_rows as $get_row){
            if($get_row['transaction_type'] == 'debit') {
                
                $debitAccount = Ledger::find($get_row['debit_ledger_account_id']);
                $debitAccount->closing_balance = $debitAccount->closing_balance + $get_row['ledger_account_amount'];
                $debitAccount->save();
            }
            if($get_row['transaction_type'] == 'credit') {
                $creditAccount = Ledger::find($get_row['credit_ledger_account_id']);
                $creditAccount->closing_balance = $creditAccount->closing_balance - $get_row['ledger_account_amount'];
                $creditAccount->save();
            }
            
             $Result = VouchersDetails::where('id',$get_row['id'])->update([
              'delete_status'      => '1'
            ]);
        }
      
        $Result = Vouchers::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }
    public function credit_row_delete(Request $oRequest)
    {
        $Result = VouchersDetails::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }

    

    




}
