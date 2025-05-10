<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransationHistory;
use App\Models\SavingAccount;
use App\Models\User;
use App\Models\TotalLoanCollection;
use App\Models\RecurringDepositEmi;
use Excel;
use App\Exports\CategoryExport;
use Auth;
use Helper;
use DB;


class TotalLoanCollectionsController extends Controller
{
    public function index()

    {
        $totalLoanCollection = TotalLoanCollection::where('status', 'collected')->get();
        $data = [
            'page_title' => 'Total Loan Collections',
            'totalLoanCollections' => $totalLoanCollection
        ];
        return view('admin.templates.totalLoanCollections.paymentCollectDeposit',compact('data'));
    }

    function listPending()
    {
        $rows = Helper::get_PaymentCollectionDeposite();
        $html = view('admin.templates.paymentCollectDeposit.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

}
