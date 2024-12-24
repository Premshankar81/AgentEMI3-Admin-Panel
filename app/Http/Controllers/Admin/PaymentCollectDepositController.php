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


class PaymentCollectDepositController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'PAYMENT TO COLLECT (Deposit)';
        return view('admin.templates.paymentCollectDeposit.paymentCollectDeposit',compact('data'));
    }

    function listPending()
    {
        $rows = Helper::get_PaymentCollectionDeposite();
        $html = view('admin.templates.paymentCollectDeposit.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

}
