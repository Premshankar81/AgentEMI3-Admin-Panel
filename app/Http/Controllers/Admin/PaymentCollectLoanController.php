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


class PaymentCollectLoanController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'PAYMENT TO COLLECT (Loan)';
        return view('admin.templates.paymentCollectLoan.paymentCollectLoan',compact('data'));
    }

    function listPending()
    {
        $rows = Helper::get_PaymentCollectionLoan();
        $html = view('admin.templates.paymentCollectLoan.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

}
