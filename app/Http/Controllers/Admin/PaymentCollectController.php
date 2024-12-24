<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransationHistory;
use App\Models\SavingAccount;
use App\Models\User;
use App\Models\RecurringDepositEmi;
use Excel;
use App\Exports\CategoryExport;
use Auth;
use Helper;
use DB;


class PaymentCollectController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'PAYMENT TO COLLECT (Loan/Deposit)';
        return view('admin.templates.paymentCollect.paymentCollect',compact('data'));
    }

    function listPending()
    {
        $Loan_rows = Helper::get_PaymentCollectionLoan();
        $RD_rows = Helper::get_PaymentCollectionDeposite();
        $html = view('admin.templates.paymentCollect.records', compact('Loan_rows','RD_rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

}
