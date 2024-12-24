<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VouchersDetails;
use Excel;
use App\Exports\CountryExport;
use Auth;
use Helper;

class LedgerViewController extends Controller
{
    public function index(Request $oRequest)
    {
       
        $data['page_title'] = 'Ledger View';
        $ledgers = Helper::getLedger();
        $TrialBalanaces = Helper::getTrialBalanace($oRequest);
        $ledger_signle = '';
        if(isset($oRequest['ledger_id']) && $oRequest['ledger_id'] != ''){
             $ledger_signle = Helper::get_single_ledgers($oRequest['ledger_id']);
        }
        
            
        
        return view('admin.templates.ledger_view.ledger_view',compact('data','ledgers','TrialBalanaces','ledger_signle'));
    }
    public function export()
    {
        $file_name = 'country_'.rand().'.xlsx';
        return Excel::download(new CountryExport,$file_name);
    }
    
    public function searchResult(Request $oRequest)
    {
        $data['page_title'] = 'Ledger View';
        $TrialBalanaces = Helper::getTrialBalanace($oRequest);
        $ledgers = Helper::getLedger();
        $ledger_signle = '';
        if(isset($oRequest['ledger_id']) && $oRequest['ledger_id'] != ''){
             $ledger_signle = Helper::get_single_ledgers($oRequest['ledger_id']);
        }
      
        
        return view('admin.templates.ledger_view.ledger_view',compact('data','ledgers','ledger_signle','TrialBalanaces'));
    }
    
    
}
