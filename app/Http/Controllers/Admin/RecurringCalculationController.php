<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use Excel;
use Auth;
use Helper;
use Carbon\Carbon;

class RecurringCalculationController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Recurring Deposit Calculator';
        return view('admin.templates.recurring_calculator.recurring_calculator',compact('data'));
    }
    public function ViewReport(Request $oRequest)
    {

        $Final_Principal = 0;
        $Final_InterestEarned = 0;
        $Final_MaturityAmount = 0;
        $Final_MaturityDate    = '';

        $rdCalcualtionArr = array();
     if($oRequest->rd_frequency == 'monthly'){
            if($oRequest->rd_tenure != ''){
                $RDDate =  Carbon::parse($oRequest->opening_date)->format('d/m/Y');
                $DueDate =  Carbon::createFromFormat('d/m/Y',$RDDate)->addDays($oRequest->rd_credit_period)->format('d/m/Y');
                $OpeningAmount = $oRequest->rd_amount;
                $RDAmount = $OpeningAmount;
                $InterstRate  =   $oRequest->interest_rate;
                $IntestCalculation = 0;
                $MaturityAmount = 0; 
                for ($i=1; $i <= $oRequest->rd_tenure; $i++) {
                    $MonthlyInterestAmount =  ((($RDAmount*$InterstRate)/100)/12)*$i;
                    $MaturityAmount += $RDAmount +  $MonthlyInterestAmount;
                    $Final_Principal += $oRequest->rd_amount;
                    $rdCalcualtionObj['rd_no']                     = $i;
                    $rdCalcualtionObj['rd_date']               =    $RDDate;
                    $rdCalcualtionObj['due_date']              =     $DueDate;
                    $rdCalcualtionObj['rd_amount']              =    $OpeningAmount;
                    $rdCalcualtionObj['interest']                   = round($MonthlyInterestAmount,2);
                    $rdCalcualtionObj['maturity_amount']            = round($MaturityAmount,2);
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;
                    $Final_MaturityDate   = $DueDate;
                    $RDDate =  Carbon::parse($oRequest->opening_date)->addMonths($i)->format('d/m/Y');
                    $DueDate =  Carbon::createFromFormat('d/m/Y',$RDDate)->addDays($oRequest->rd_credit_period)->format('d/m/Y');
                    $Final_MaturityAmount = $MaturityAmount;
                    $Final_InterestEarned  += $MonthlyInterestAmount;

                }
              

            }

        }
        else if($oRequest->rd_frequency == 'yearly'){

            if($oRequest->rd_tenure != ''){
                
                $RDDate =  Carbon::parse($oRequest->opening_date)->format('d/m/Y');
                $DueDate =  Carbon::createFromFormat('d/m/Y',$RDDate)->addDays($oRequest->rd_credit_period)->format('d/m/Y');
                $OpeningAmount = $oRequest->rd_amount;
                $RDAmount = $OpeningAmount;
                $InterstRate  =   $oRequest->interest_rate;
                $IntestCalculation = 0;
                $MaturityAmount = 0; 
                for ($i=1; $i <= $oRequest->rd_tenure; $i++) {
                    $YearlyInterestAmount =  (($RDAmount*$InterstRate)/100)*$i;
                    $MaturityAmount += $RDAmount +  $YearlyInterestAmount;
                    $Final_Principal += $oRequest->rd_amount;
                    $rdCalcualtionObj['rd_no']                     = $i;
                    $rdCalcualtionObj['rd_date']               =    $RDDate;
                    $rdCalcualtionObj['due_date']              =     $DueDate;
                    $rdCalcualtionObj['rd_amount']              =    $OpeningAmount;
                    $rdCalcualtionObj['interest']                   = round($YearlyInterestAmount,2);
                    $rdCalcualtionObj['maturity_amount']            = round($MaturityAmount,2);
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;
                    $Final_MaturityDate   = $DueDate;
                    $RDDate =  Carbon::parse($oRequest->opening_date)->addMonths($i)->format('d/m/Y');
                    $DueDate =  Carbon::createFromFormat('d/m/Y',$RDDate)->addDays($oRequest->rd_credit_period)->format('d/m/Y');
                    $Final_MaturityAmount = $MaturityAmount;
                    $Final_InterestEarned  += $YearlyInterestAmount;

                }
              
            }

        }   

        $RDInfo['opening_date']             = Carbon::parse($oRequest->opening_date)->format('d-m-Y');
        $RDInfo['rd_amount']                = round($oRequest->rd_amount,2);
        $RDInfo['interest_rate']            = $oRequest->interest_rate;
        $RDInfo['rd_frequency']             = str_replace('_',' ',ucfirst($oRequest->rd_frequency));
        $RDInfo['tenure']                   = $oRequest->rd_tenure;
        $RDInfo['Final_InterestEarned']     = round($Final_InterestEarned,2);
        $RDInfo['Final_MaturityAmount']     = round($Final_MaturityAmount,2);
        $RDInfo['Final_MaturityDate']       = $Final_MaturityDate;
        $RDInfo['Final_Principal']          = round($Final_Principal,2);
        $RDInfo['EMI_amount']               = round($oRequest->rd_amount,2);
        

        $data['page_title'] = 'Recurring Deposit Calculator Report';
        return view('admin.templates.recurring_calculator.recurring_calculator',compact('data','rdCalcualtionArr','RDInfo'));
    }
    

}
