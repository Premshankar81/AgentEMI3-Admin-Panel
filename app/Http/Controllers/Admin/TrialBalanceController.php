<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VouchersDetails;
use Excel;
use App\Exports\CountryExport;
use Auth;
use Helper;

class TrialBalanceController extends Controller
{
    public function index(Request $oRequest)
    {
        
        $data['page_title'] = 'Trial Balance';
        $ledgers = Helper::getLedger();
        $Ledgers_TrialBalanaces = Helper::getLedgerTrialBalance($oRequest);
        
        return view('admin.templates.trial_balance.trial_balance',compact('data','ledgers','Ledgers_TrialBalanaces'));
    }
    
    public function searchResult(Request $oRequest)
    {
        $data['page_title'] = 'Trial Balance';
        $Ledgers_TrialBalanaces = Helper::getLedgerTrialBalance($oRequest);
        
        $ledgers = Helper::getLedger();
        return view('admin.templates.trial_balance.trial_balance',compact('data','ledgers','Ledgers_TrialBalanaces'));
    }
    public function export()
    {
        $file_name = 'country_'.rand().'.xlsx';
          return Excel::download(new CountryExport,$file_name);
    }
    
    
}
