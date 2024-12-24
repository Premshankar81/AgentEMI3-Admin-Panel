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


class PendingApplicationController extends Controller
{
  
    public function index()
    {
        
       
        $data['page_title'] = 'Pending Application';
        return view('admin.templates.pendingApplication.pendingApplication',compact('data'));
    }

    function listPending()
    {
        $Saving_rows = Helper::get_SavingAccouuntPending();
        $RD_rows = Helper::Get_RecurringDepositPending();
        $FD_rows = Helper::Get_FixedDepositPending();
        $Loan_rows = Helper::Get_BusinessLoanPending();
        
        $html = view('admin.templates.pendingApplication.records', compact('Saving_rows','RD_rows','FD_rows','Loan_rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }



}
