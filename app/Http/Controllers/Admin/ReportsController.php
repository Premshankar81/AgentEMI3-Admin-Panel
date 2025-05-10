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


class ReportsController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'MIS Reports';
        return view('admin.templates.reports.reports',compact('data'));
    }
    
    public function ProfitnLoss_Index()
    {
        $data['page_title'] = 'Profit and Loss A/c';
        return view('admin.templates.reportsProfitnLoss.reportsProfitnLoss',compact('data'));
    }

    public function BalanceSheet_Index()
    {
        $data['page_title'] = 'Balance Sheet';
        return view('admin.templates.reportsBalanceSheet.reportsBalanceSheet',compact('data'));
    }
    
    /* Start :: Report avingAccount */
    public function SavingAccount_Index()
    {
        $data['page_title'] = 'Saving Account';
        return view('admin.templates.reportSavingAccount.reportSavingAccount',compact('data'));
    }
    public function SavingAccount_list()
    {
        $rows = Helper::get_SavingAccouunt();
        $html = view('admin.templates.reportSavingAccount.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }
    /* End :: Report avingAccount */
    
    /* Start :: Report FDAccountView */
    public function fdAccountView_Index()
    {
        $data['page_title'] = 'FD Account';
        return view('admin.templates.reportFDAccountView.reportFDAccountView',compact('data'));
    }
    public function fdAccountView_list()
    {
        $rows = Helper::Get_FixedDeposits();
        $html = view('admin.templates.reportFDAccountView.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }
    /* End :: Report FDAccountView */
    
    /*
        Start :: Report FDAccountView 
    */
    public function rdAccountView_Index()
    {
        $data['page_title'] = 'RD Account';
        return view('admin.templates.reportRDAccountView.reportRDAccountView',compact('data'));
    }
    public function rdAccountView_list()
    {
        $rows = Helper::Get_RecurringDeposit();
        $html = view('admin.templates.reportRDAccountView.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }
    /* 
        End :: Report FDAccountView 
    */
    
    
    /*
        Start :: Report MISAccount 
    */
    public function MISAccount_Index()
    {
        $data['page_title'] = 'MIS Account';
        return view('admin.templates.reportMISAccount.reportMISAccount',compact('data'));
    }
    public function MISAccount_list()
    {
        $rows = Helper::Get_RecurringDeposit();
        $html = view('admin.templates.reportMISAccount.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }
    /* 
        End :: Report MISAccount 
    */
    
    public function DDAccount_Index()
    {
        $data['page_title'] = 'RD Account';
        return view('admin.templates.reportDDAccount.reportDDAccount',compact('data'));
    }
    public function DDAccount_list()
    {
        $rows = Helper::Get_RecurringDeposit();
        $html = view('admin.templates.reportDDAccount.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }
    /* 
        End :: Report MISAccount 
    */
    
    /* 
        End :: Report MISAccount 
    */
    
    public function PaymentRelease_Index()
    {
        $data['page_title'] = 'PAYMENT TO RELEASE';
        return view('admin.templates.reportPaymentRelease.reportPaymentRelease',compact('data'));
    }
    public function PaymentRelease_list()
    {
        $rows = Helper::Get_RecurringDeposit();
        $html = view('admin.templates.reportPaymentRelease.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }
    /* 
        End :: Report MISAccount 
    */
    
    

    
    

    
    

    
    
    
    

}
