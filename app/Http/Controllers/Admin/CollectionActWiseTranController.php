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


class CollectionActWiseTranController extends Controller
{
  
    public function index(Request $oRequest)
    {
        $tran_type = $oRequest->tran_type;
    
        $data['page_title'] = 'Agent collection detail List';
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
      
        
        $rows = $query->with('customer','createdBy','account','rd_account','fd_account','loan_account')
                            ->where('delete_status','0')
                            ->whereIn('tran_page_type', [$tran_type])
                            ->orderBy('id', 'DESC')->get();
                            
        return view('admin.templates.CollectionAccountWiseTran.CollectionAccountWiseTran',compact('data','branches','rows','TrialBalanaces'));
    }


}
