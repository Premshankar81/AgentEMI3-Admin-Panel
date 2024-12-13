<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Projects;
use App\Models\Expense;
use App\Models\User;
use App\Models\PaymentLinks;
use Helper;

class HomeController extends Controller
{
    public function index()
    {
        $output['user'] = User::where('delete_status','0')->count();
        $output['customer'] = User::where('delete_status','0')->count();
        
        $output['PendingApplications'] = Helper::get_SavingAccouuntPendingCount();
        $output['PendingTransactions'] = Helper::get_PendingTransationCount();
        $output['PendingCustomers'] = Helper::GetPendingMembersCount();
        $output['Pending_EMIS'] = Helper::get_TotalPendingLoanEMI();
        $output['TotalCustomer'] = Helper::GetTotalMembersCount();
        
        $output['TotalReceivedAmount'] = 0;
        $output['TotalPaidAmount'] = 0;
        
        
        
        
        return view('admin.templates.dashboard.dashboard',compact('output'));
    }
}
