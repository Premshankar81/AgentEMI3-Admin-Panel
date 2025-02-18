<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use Excel;
use Auth;
use Helper;
use Carbon\Carbon;

class FixedDepositCalculationController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Fixed Deposit Calculator';
        return view('admin.templates.fixedDeposit_calculator.fixedDeposit_calculator',compact('data'));
    }
    public function ViewReport(Request $oRequest)
    {

        $Final_Principal = 0;
        $Final_InterestEarned = 0;
        $Final_MaturityAmount = 0;
        $Final_MaturityDate    = '';

        $rdCalcualtionArr = array();
        if($oRequest->fd_frequency == 'monthly'){
            if($oRequest->fd_tenure != ''){

                    $OpeningDate = Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                    $FDDate = $OpeningDate;
                    $FDAmount = $oRequest->fd_amount; // Initial principal
                    $MonthlyRate = $oRequest->interest_rate/12/100; // monthly interest rate
                    $FDTenure = $oRequest->fd_tenure; // fd tenure in months
                    $Final_InterestEarned = 0;
                    $rdCalculationArr = [];      
                $Final_MaturityAmount = $FDAmount;
                $Final_IntestAmount = 0;
                for ($i=1; $i <= $oRequest->fd_tenure; $i++) { 
                    $interest = $FDAmount*$MonthlyRate;
                    $Final_InterestEarned += $interest;
                    $Final_MaturityAmount += $interest;
                    $rdCalcualtionObj['fd_date']                    =  $FDDate;
                    $rdCalcualtionObj['serial_no']                  =   $i;
                    $rdCalcualtionObj['total_amount']               =  $oRequest->fd_amount;
                    $rdCalcualtionObj['interest']                   = round($Final_InterestEarned,2);
                    $rdCalcualtionObj['maturity_amount']            = round($Final_MaturityAmount,2);
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;
                    $FDDate        =  Carbon::parse($oRequest->opening_date)->addMonth($i)->format('d-m-Y');
                    $Final_MaturityDate   = $FDDate;
                }
              
                
            } 
              
        }else {

            if($oRequest->fd_tenure != ''){

                $OpeningDate = Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $FDAmount = $oRequest->fd_amount; // Initial principal
                $YearlyRate = $oRequest->interest_rate/100; // monthly interest rate
                $FDTenure = $oRequest->fd_tenure; // fd tenure in months
                $Final_InterestEarned = 0;
                $rdCalculationArr = [];      
            $Final_MaturityAmount = $FDAmount;
            $Final_IntestAmount = 0;
            for ($i=1; $i <= $oRequest->fd_tenure; $i++) { 
                $interest = $FDAmount*$YearlyRate;
                $Final_InterestEarned += $interest;
                $Final_MaturityAmount += $interest;
                $FDDate        =  Carbon::parse($oRequest->opening_date)->addYears($i)->format('d-m-Y');
                $rdCalcualtionObj['fd_date']                    =  $FDDate;
                $rdCalcualtionObj['serial_no']                  =   $i;
                $rdCalcualtionObj['total_amount']               =  $oRequest->fd_amount;
                $rdCalcualtionObj['interest']                   = round($Final_InterestEarned,2);
                $rdCalcualtionObj['maturity_amount']            = round($Final_MaturityAmount,2);
                $rdCalcualtionArr[]                             = $rdCalcualtionObj;
                $Final_MaturityDate   = $FDDate;
            }
          
            
        } 





        }


        $RDInfo['opening_date']             = Carbon::parse($oRequest->opening_date)->format('d-m-Y');
        $RDInfo['rd_amount']                = round($oRequest->fd_amount,2);
        $RDInfo['interest_rate']            = $oRequest->interest_rate;
        $RDInfo['rd_frequency']             = str_replace('_',' ',ucfirst($oRequest->fd_frequency));
        $RDInfo['tenure']                   = $oRequest->fd_tenure;
        $RDInfo['Final_InterestEarned']     = round($Final_InterestEarned,2);
        $RDInfo['Final_MaturityAmount']     = round($Final_MaturityAmount,2);
        $RDInfo['Final_MaturityDate']       = $Final_MaturityDate;
        $RDInfo['Final_Principal']          = round($Final_Principal,2);
        $RDInfo['FD_amount']               = round($oRequest->fd_amount,2);
        $RDInfo['EMIList']                  = $rdCalcualtionArr;


        $data['page_title'] = 'Fixed Deposit Calculator Report';
        return view('admin.templates.fixedDeposit_calculator.fixedDeposit_calculator',compact('data','rdCalcualtionArr','RDInfo'));
    }
    

}
