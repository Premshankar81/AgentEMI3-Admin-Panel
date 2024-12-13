<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SavingAccount;
use Excel;
use App\Exports\CategoryExport;
use App\Models\TransationHistory;
use Auth;
use Helper;

class CashReportUserwiseController extends Controller
{
  
    public function index(Request $oRequest)
    {
    
        $data['page_title'] = 'User wise cash collection';
        $branches = Helper::getBranches();
        $query = TransationHistory::query();
        
        if(Auth::guard('admin')->user()->user_type != 'admin'){
            $query->where('created_by',Auth::guard('admin')->user()->id);    
        }
        
        if(isset($_REQUEST['from_date']) && $_REQUEST['from_date'] != '' && $_REQUEST['to_date'] == ''){
            $query->whereDate('transation_date',$_REQUEST['from_date']);    
        }
        if(isset($_REQUEST['to_date']) && $_REQUEST['to_date'] != ''){
           
            $query->whereBetween('transation_date', [$_REQUEST['from_date'],$_REQUEST['to_date']]);
        }
        if(isset($_REQUEST['branche_id']) && $_REQUEST['branche_id'] != ''){
            $query->where('user_id',$_REQUEST['branche_id']);    
        }
        $TrialBalanaces = Helper::getTrialBalanace($oRequest);
        $rows = $query->with('createdBy')
                       ->where('delete_status','0')
                            ->whereIn('tran_page_type', ['loan','fixedDeposit','recurring','saving'])
                            ->groupBy('user_id')
                            ->selectRaw('*, sum(amount) as total_amount')
                            ->orderBy('id', 'DESC')->get();
        return view('admin.templates.CashReportUserwise.CashReportUserwise',compact('data','branches','rows','TrialBalanaces'));
    }




}
