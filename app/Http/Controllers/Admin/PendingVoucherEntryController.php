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


class PendingVoucherEntryController extends Controller
{
  
    public function index()
    {   
        $data['page_title'] = 'Pending Application';
        return view('admin.templates.pendingVoucherEntry.pendingVoucherEntry',compact('data'));
    }

    function listPending()
    {
        $rows = Helper::get_vouchers();
        $html = view('admin.templates.pendingVoucherEntry.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }



}
