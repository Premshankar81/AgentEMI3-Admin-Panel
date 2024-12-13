<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use Excel;
use Auth;
use Helper;
use Carbon\Carbon;

class LoanCalculationController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Loan Calculator';
        return view('admin.templates.loan_calculator.loan_calculator',compact('data'));
    }

    //$amount = 10000;
    //$rate = .12 / 12; // Monthly interest rate
    //$term = 3; // Term in months
    //$emi = $amount * $rate * (pow(1 + $rate, $term) / (pow(1 + $rate, $term) - 1));

    public function ViewReport(Request $oRequest)
    {


        $Final_Principal = 0;
        $Final_InterestEarned = 0;
        $Final_MaturityAmount = 0;
        $Final_MaturityDate    = '';

        $rdCalcualtionArr = array();

        if($oRequest->emi_payout == 'daily'){

            if($oRequest->loan_tenure != ''){
                
                if($oRequest->emi_type == 'reducing'){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d/m/Y');
                $DueDate = $OpeningDate;
                $OpeningAmount = (float)$oRequest->loan_amount;
              
                $Final_IntestAmount = 0;
                 //$amount = $oRequest->loan_amount;
                 $term = (float)$oRequest->loan_tenure; // Term in days
                 $rate = (float)( $oRequest->interest_rate / 100 ) / 365; // daily interest rate
                $emi = (float)$OpeningAmount * $rate * (pow(1 + $rate, $term) / (pow(1 + $rate, $term) - 1));
                for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 

                    $InterestCalculation    = 0;
                    $SingleDayInterest      = 0;
                    $PrincipalAmount        = 0;
                    $OutstandingAmount      = 0;

                    $InterestCalculation    = ( $OpeningAmount * $oRequest->interest_rate ) / 100;
                    $SingleDayInterest      = $InterestCalculation / 365;
                    $PrincipalAmount        = $emi - $SingleDayInterest;
                    $OutstandingAmount      = $OpeningAmount - $PrincipalAmount;
                    
                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount,2);
                    $rdCalcualtionObj['interest']                   = number_format($SingleDayInterest,2);
                    $rdCalcualtionObj['outstanding']                = number_format($OutstandingAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningAmount = $OutstandingAmount;

                    $emi_credit_period = $i + $oRequest->emi_credit_period;
                    $OpeningDate    =  Carbon::parse($oRequest->opening_date)->addDays($i)->format('d/m/Y');
                    $DueDate        =  $OpeningDate;
                    $Final_InterestEarned += $SingleDayInterest;
                }
                
            }else{
                
               $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('d-m-Y');
                $OpeningAmount = $oRequest->loan_amount;
              
                $Final_IntestAmount = 0;
                $frequency_days = 0;
                $amount = $oRequest->loan_amount;
                $InterestAmountrate     = ( $amount * $oRequest->interest_rate ) / 100; // Monthly interest rate
                $SingleDayInterest      = $InterestAmountrate / 365;
                $singleWeekInterest     = $SingleDayInterest * 1;
                $term = $oRequest->loan_tenure; 
                $PrincipalAmount        = $OpeningAmount  / $term;
                $emi                    = $PrincipalAmount + $singleWeekInterest;
                $PrincipalAmount        = round($emi) -  $singleWeekInterest;
                for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 
                    $frequency_days         = $frequency_days + 1;
                    $OutstandingAmount      = round($OpeningAmount) - ( $PrincipalAmount * $i );

                    if($oRequest->loan_tenure == $i){
                        if($OutstandingAmount != 0){
                            $emi = $emi + $OutstandingAmount;
                            $OutstandingAmount = 0;
                        }
                    }
                    

                    $totalLoanAmountWithInterest = ( $singleWeekInterest * $term ) + $OpeningAmount;
                    $Final_Principal             = $totalLoanAmountWithInterest;
                    
                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount,2);
                    $rdCalcualtionObj['interest']                   = number_format($singleWeekInterest,2);
                    $rdCalcualtionObj['outstanding']                = number_format($OutstandingAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $emi_credit_period = $i + $oRequest->emi_credit_period;
                    $OpeningDate    =  Carbon::parse($oRequest->opening_date)->addDays($frequency_days)->format('d-m-Y');
                    $DueDate        =  Carbon::parse($oRequest->opening_date)->addDays($emi_credit_period)->format('d-m-Y');

                    $Final_InterestEarned += $SingleDayInterest;
                }
                
            }
            
            
        }    

        }else if($oRequest->emi_payout == 'weekly'){
            
            if($oRequest->loan_tenure != ''){
                
                if ($oRequest->emi_type == 'reducing') {
                    $OpeningDate = Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                    $DueDate = Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('d-m-Y');
                    $OpeningAmount = (float)$oRequest->loan_amount;
                
                    $frequency_days = 0;
                    $amount = (float)$oRequest->loan_amount;
                    $rate = (float)($oRequest->interest_rate / 100 / 52.1429); // Weekly interest rate
                    $term = $oRequest->loan_tenure; // Tenure in weeks
                    $emi = $amount * $rate * pow(1 + $rate, $term) / (pow(1 + $rate, $term) - 1);
                
                    for ($i = 1; $i <= $term; $i++) {
                        $InterestCalculation = ($OpeningAmount * $oRequest->interest_rate) / 100;
                        $SingleDayInterest = ($InterestCalculation / 365) * 7;
                        $PrincipalAmount = max(0, round($emi - $SingleDayInterest, 2));
                        $OutstandingAmount = bcsub($OpeningAmount, $PrincipalAmount, 2);
                
                        $rdCalcualtionObj = [
                            'emi_date' => $OpeningDate,
                            'due_date' => $DueDate,
                            'emi' => round($emi, 2),
                            'principal' => number_format($PrincipalAmount, 2),
                            'interest' => number_format($SingleDayInterest, 2),
                            'outstanding' => number_format($OutstandingAmount, 2),
                            'interest_due_date' => 0
                        ];
                        $rdCalcualtionArr[] = $rdCalcualtionObj;
                
                        $OpeningAmount = $OutstandingAmount;
                        $frequency_days += 7;
                        $emi_credit_period = $frequency_days + $oRequest->emi_credit_period;
                        $OpeningDate = Carbon::parse($oRequest->opening_date)->addDays($frequency_days)->format('d-m-Y');
                        $DueDate = Carbon::parse($oRequest->opening_date)->addDays($emi_credit_period)->format('d-m-Y');
                        $Final_InterestEarned += $SingleDayInterest;
                    }
                }else{
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('d-m-Y');
                $OpeningAmount = $oRequest->loan_amount;
              
                $Final_IntestAmount = 0;
                $frequency_days = 0;
                $amount = $oRequest->loan_amount;
                $term = $oRequest->loan_tenure; 
                $PrincipalAmount        = $OpeningAmount  / $term;
                $frequency_days         = $frequency_days + 7;
                $InterestAmountrate     = ( $amount * $oRequest->interest_rate ) / 100; // Monthly interest rate
                    $SingleDayInterest      = $InterestAmountrate / 365;
                    $singleWeekInterest     = $SingleDayInterest * 7;
                    $emi                    = $PrincipalAmount + $singleWeekInterest;
                    $PrincipalAmount        = $emi -  $singleWeekInterest;
                for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 
                    $OutstandingAmount      = $OpeningAmount - ( $PrincipalAmount * $i );

                    if($OutstandingAmount < 0){
                        $emi = $emi + $OutstandingAmount;
                        $OutstandingAmount = 0;
                    }

                    $totalLoanAmountWithInterest = ( $singleWeekInterest * $term ) + $OpeningAmount;
                    $Final_Principal             = $totalLoanAmountWithInterest;
                    
                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount,2);
                    $rdCalcualtionObj['interest']                   = number_format($singleWeekInterest,2);
                    $rdCalcualtionObj['outstanding']                = number_format($OutstandingAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $emi_credit_period  =   $oRequest->emi_credit_period;
                    $OpeningDate        =  Carbon::parse($oRequest->opening_date)->addDays($frequency_days*$i)->format('d-m-Y');
                    $DueDate            =  Carbon::parse($OpeningDate )->addDays($emi_credit_period)->format('d-m-Y');

                    $Final_InterestEarned += $singleWeekInterest;
                   
           		}
                
                
                
            }
    
            }


        }else if($oRequest->emi_payout == 'bi_weekly'){

             if($oRequest->loan_tenure != ''){
                
                if($oRequest->emi_type == 'reducing'){
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('d-m-Y');
                $OpeningAmount = $oRequest->loan_amount;
              
                $Final_IntestAmount     = 0;
                $frequency_days         = 0;
                $amount = (float)$oRequest->loan_amount;
               $rate = (float)($oRequest->interest_rate / 100 / 26);  // Monthly interest rate
                $term = (float)$oRequest->loan_tenure; // Term in months
                $emi = (float)$OpeningAmount * $rate * pow(1 + $rate, $term) / (pow(1 + $rate, $term) - 1);

                for ($i = 1; $i <= $oRequest->loan_tenure; $i++) { 
                    $InterestCalculation    = 0;
                    $SingleDayInterest      = 0;
                    $PrincipalAmount        = 0;
                    $OutstandingAmount      = 0;
                    $frequency_days         = $frequency_days + 14;
                
                    $InterestCalculation    = ($OpeningAmount * $oRequest->interest_rate) / 100;
                    $SingleDayInterest      = ($InterestCalculation / 365) * 14;
                
                    // For the last EMI, adjust the principal amount
                    if ($i == $oRequest->loan_tenure) {
                        $PrincipalAmount = $OpeningAmount; // Adjust principal to clear outstanding balance
                        $emi = $PrincipalAmount + $SingleDayInterest; // Adjust EMI to match
                    } else {
                        $PrincipalAmount = max(0, round($emi - $SingleDayInterest, 2));
                    }
                
                    $OutstandingAmount = bcsub($OpeningAmount, $PrincipalAmount, 2);
                
                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount, 2);
                    $rdCalcualtionObj['interest']                   = number_format($SingleDayInterest, 2);
                    $rdCalcualtionObj['outstanding']                = number_format($OutstandingAmount, 2);
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;
                
                    $OpeningAmount = $OutstandingAmount;
                
                    $emi_credit_period = $frequency_days + $oRequest->emi_credit_period;
                    $OpeningDate    = Carbon::parse($oRequest->opening_date)->addDays($frequency_days)->format('d-m-Y');
                    $DueDate        = Carbon::parse($oRequest->opening_date)->addDays($emi_credit_period)->format('d-m-Y');
                
                    $Final_InterestEarned += $SingleDayInterest;
                }
                
                
            }else{
                
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('d-m-Y');
                $OpeningAmount = $oRequest->loan_amount;
              
                $Final_IntestAmount = 0;
                $frequency_days = 0;
                $amount = $oRequest->loan_amount;
                $term = $oRequest->loan_tenure; 
                $SingleDayInterest      = 0;
                $PrincipalAmount        = 0;
                $OutstandingAmount      = 0;
                $singleWeekInterest      = 0;
                $frequency_days         = $frequency_days + 14;

                $InterestAmountrate     = ( $amount * $oRequest->interest_rate ) / 100; // Monthly interest rate
                $SingleDayInterest      = $InterestAmountrate / 365;
                $singleWeekInterest     = $SingleDayInterest * 14;

                $PrincipalAmount        = $OpeningAmount  / $term;
                $emi                    = $PrincipalAmount + $singleWeekInterest;
                $PrincipalAmount        = $emi -  $singleWeekInterest;
                for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 
                   
                    $OutstandingAmount      = $OpeningAmount - ( $PrincipalAmount * $i );

                    if($OutstandingAmount < 0){
                        $emi = $emi + $OutstandingAmount;
                        $OutstandingAmount = 0;
                    }

                    $totalLoanAmountWithInterest = ( $singleWeekInterest * $term ) + $OpeningAmount;
                    $Final_Principal             = $totalLoanAmountWithInterest;
                    
                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount,2);
                    $rdCalcualtionObj['interest']                   = number_format($singleWeekInterest,2);
                    $rdCalcualtionObj['outstanding']                = number_format($OutstandingAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $emi_credit_period =  $oRequest->emi_credit_period;
                    $OpeningDate    =  Carbon::parse($oRequest->opening_date)->addDays($frequency_days*$i)->format('d-m-Y');
                    $DueDate        =  Carbon::parse($OpeningDate)->addDays($emi_credit_period)->format('d-m-Y');

                    $Final_InterestEarned +=  $singleWeekInterest;
                }
            }
        }



        }else if($oRequest->emi_payout == 'monthly'){
            if($oRequest->loan_tenure != ''){
                
                if($oRequest->emi_type == 'reducing'){

                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d/m/Y');
                $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('d/m/Y');
                $OpeningAmount = $oRequest->loan_amount;
                $Final_IntestAmount = 0;

                for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 

                    $amount = $oRequest->loan_amount;
                    $rate = ( $oRequest->interest_rate / 12 ) / 100; // Monthly interest rate
                    $emiCreditPeriod=$oRequest->emi_credit_period;
                    $term = $oRequest->loan_tenure; // Term in months
                    $emi = $amount * $rate * (pow(1 + $rate, $term) / (pow(1 + $rate, $term) - 1));

                    $InterestCalculation    = 0;
                    $SingleDayInterest      = 0;
                    $PrincipalAmount        = 0;
                    $OutstandingAmount      = 0;
                    
                    $InterestCalculation    = ( $OpeningAmount * $oRequest->interest_rate ) / 100;
                    $SingleDayInterest      = $InterestCalculation / 12;
                    $PrincipalAmount        = $emi - $SingleDayInterest;
                    $OutstandingAmount = bcsub($OpeningAmount, $PrincipalAmount, 2);

                     // For the last EMI, adjust principal and outstanding balance to match exactly
    if ($i == $oRequest->loan_tenure) {
        $PrincipalAmount += $OutstandingAmount; // Adjust principal to clear remaining balance
        $OutstandingAmount = 0;
    }
                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount,2);
                    $rdCalcualtionObj['interest']                   = number_format($SingleDayInterest,2);
                    $rdCalcualtionObj['outstanding']                = number_format($OutstandingAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningAmount = $OutstandingAmount;

                    $emi_credit_period = $i + $oRequest->emi_credit_period;
                    $OpeningDate    =  Carbon::parse($oRequest->opening_date)->addMonths($i)->format('d/m/Y');
                    $DueDate        =   Carbon::createFromFormat('d/m/Y', $OpeningDate)->addDays($emiCreditPeriod) ->format('d/m/Y');
                    $Final_InterestEarned += $SingleDayInterest;
                }
            
            }else{

            	$OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d/m/Y');
                $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('d/m/Y');
                $OpeningAmount = $oRequest->loan_amount;
                $Final_IntestAmount = 0;
                $amount = $oRequest->loan_amount;
                $emiCreditPeriod=$oRequest->emi_credit_period;
                $term = $oRequest->loan_tenure; 
                $SingleDayInterest      = 0;
                $PrincipalAmount        = 0;
                $OutstandingAmount      = 0;
                
                $InterestAmountrate     = ( $amount * $oRequest->interest_rate ) / 100; // Monthly interest rate
                $emi                    = ( $amount + $InterestAmountrate ) / $term;
               
                $totalLoanAmountWithInterest = $InterestAmountrate + $oRequest->loan_amount;
                $SingleDayInterest      = $InterestAmountrate / $term;
                $PrincipalAmount        = $oRequest->loan_amount  / $term;

                for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 

                    $OutstandingAmount      = round($amount) -  ( $PrincipalAmount * $i );
                    $Final_Principal = $totalLoanAmountWithInterest;
                    
                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount,2);
                    $rdCalcualtionObj['interest']                   = number_format($SingleDayInterest,2);
                    $rdCalcualtionObj['outstanding']                = number_format($OutstandingAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $emi_credit_period  =  $oRequest->emi_credit_period;
                    $OpeningDate        =  Carbon::parse($oRequest->opening_date)->addMonths($i)->format('d/m/Y');
                    $DueDate        =      Carbon::createFromFormat('d/m/Y', $OpeningDate)->addDays($emiCreditPeriod) ->format('d/m/Y');
                    $Final_InterestEarned += $SingleDayInterest;
                   
           		}
           		

       		}

        }

        }else if($oRequest->emi_payout == 'quarterly'){

            if($oRequest->loan_tenure != ''){
                if($oRequest->emi_type == 'reducing'){
                    $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d/m/Y');
                $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('d/m/Y');
                $OpeningAmount = $oRequest->loan_amount;
                $Final_IntestAmount = 0;

                for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 

                    $amount = $oRequest->loan_amount;
                    $rate = ( $oRequest->interest_rate / 4 ) / 100; // Monthly interest rate
                    $emiCreditPeriod=$oRequest->emi_credit_period;
                    $term = $oRequest->loan_tenure; // Term in months
                    $emi = $amount * $rate * (pow(1 + $rate, $term) / (pow(1 + $rate, $term) - 1));

                    $InterestCalculation    = 0;
                    $SingleDayInterest      = 0;
                    $PrincipalAmount        = 0;
                    $OutstandingAmount      = 0;
                    
                    $InterestCalculation    = ( $OpeningAmount * $oRequest->interest_rate ) / 100;
                    $SingleDayInterest      = $InterestCalculation / 4;
                    $PrincipalAmount        = $emi - $SingleDayInterest;
                    $OutstandingAmount = bcsub($OpeningAmount, $PrincipalAmount, 2);

                     // For the last EMI, adjust principal and outstanding balance to match exactly
             if ($i == $oRequest->loan_tenure) {
               $PrincipalAmount += $OutstandingAmount; // Adjust principal to clear remaining balance
               $OutstandingAmount = 0;
             }
                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount,2);
                    $rdCalcualtionObj['interest']                   = number_format($SingleDayInterest,2);
                    $rdCalcualtionObj['outstanding']                = number_format($OutstandingAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningAmount = $OutstandingAmount;

                    $emi_credit_period = $i + $oRequest->emi_credit_period;
                    $OpeningDate    =  Carbon::parse($oRequest->opening_date)->addMonths($i*3)->format('d/m/Y');
                    $DueDate        =   Carbon::createFromFormat('d/m/Y', $OpeningDate)->addDays($emiCreditPeriod) ->format('d/m/Y');
                    $Final_InterestEarned += $SingleDayInterest;
                }
            
            }else{

                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('d-m-Y');
                $OpeningAmount = $oRequest->loan_amount;
              
                $Final_IntestAmount = 0;
                $frequency_days = 0;
                $amount = $oRequest->loan_amount;
                $term = $oRequest->loan_tenure; 
                $SingleDayInterest      = 0;
                $PrincipalAmount        = 0;
                $OutstandingAmount      = 0;
                $singleWeekInterest      = 0;
                $frequency_days         = $frequency_days + 91.25;

                $InterestAmountrate     = ( $amount * $oRequest->interest_rate ) / 100; // Monthly interest rate
                $SingleDayInterest      = $InterestAmountrate / 365;
                $singleWeekInterest     = $SingleDayInterest * 91.25;

                $PrincipalAmount        = $OpeningAmount  / $term;
                $emi                    = $PrincipalAmount + $singleWeekInterest;
                $PrincipalAmount        = $emi -  $singleWeekInterest;
                for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 
                   
                    $OutstandingAmount      = $OpeningAmount - ( $PrincipalAmount * $i );

                    if($OutstandingAmount < 0){
                        $emi = $emi + $OutstandingAmount;
                        $OutstandingAmount = 0;
                    }

                    $totalLoanAmountWithInterest = ( $singleWeekInterest * $term ) + $OpeningAmount;
                    $Final_Principal             = $totalLoanAmountWithInterest;
                    
                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount,2);
                    $rdCalcualtionObj['interest']                   = number_format($singleWeekInterest,2);
                    $rdCalcualtionObj['outstanding']                = number_format($OutstandingAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $emi_credit_period =  $oRequest->emi_credit_period;
                    $OpeningDate    =  Carbon::parse($oRequest->opening_date)->addDays($frequency_days*$i)->format('d-m-Y');
                    $DueDate        =  Carbon::parse($OpeningDate)->addDays($emi_credit_period)->format('d-m-Y');

                    $Final_InterestEarned +=  $singleWeekInterest;
           		}
           		

       		}     

            }

    
        }else if($oRequest->emi_payout == 'half_yearly'){

            if($oRequest->loan_tenure != ''){
                if($oRequest->emi_type == 'reducing'){
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d/m/Y');
                $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('d/m/Y');
                $OpeningAmount = $oRequest->loan_amount;
                $Final_IntestAmount = 0;

                for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 

                    $amount = $oRequest->loan_amount;
                    $rate = ( $oRequest->interest_rate / 2 ) / 100; // Monthly interest rate
                    $emiCreditPeriod=$oRequest->emi_credit_period;
                    $term = $oRequest->loan_tenure; // Term in months
                    $emi = $amount * $rate * (pow(1 + $rate, $term) / (pow(1 + $rate, $term) - 1));

                    $InterestCalculation    = 0;
                    $SingleDayInterest      = 0;
                    $PrincipalAmount        = 0;
                    $OutstandingAmount      = 0;
                    
                    $InterestCalculation    = ( $OpeningAmount * $oRequest->interest_rate ) / 100;
                    $SingleDayInterest      = $InterestCalculation / 2;
                    $PrincipalAmount        = $emi - $SingleDayInterest;
                    $OutstandingAmount = bcsub($OpeningAmount, $PrincipalAmount, 2);

                     // For the last EMI, adjust principal and outstanding balance to match exactly
              if ($i == $oRequest->loan_tenure) {
                $PrincipalAmount += $OutstandingAmount; // Adjust principal to clear remaining balance
               $OutstandingAmount = 0;
               }
                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount,2);
                    $rdCalcualtionObj['interest']                   = number_format($SingleDayInterest,2);
                    $rdCalcualtionObj['outstanding']                = number_format($OutstandingAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $OpeningAmount = $OutstandingAmount;

                    $emi_credit_period = $i + $oRequest->emi_credit_period;
                    $OpeningDate    =  Carbon::parse($oRequest->opening_date)->addMonths($i*6)->format('d/m/Y');
                    $DueDate        =   Carbon::createFromFormat('d/m/Y', $OpeningDate)->addDays($emiCreditPeriod) ->format('d/m/Y');
                    $Final_InterestEarned += $SingleDayInterest;
                }
            
            }else{
               
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('d-m-Y');
                $OpeningAmount = $oRequest->loan_amount;
              
                $Final_IntestAmount = 0;
                $frequency_days = 0;
                $amount = $oRequest->loan_amount;
                $term = $oRequest->loan_tenure; 
                $SingleDayInterest      = 0;
                $PrincipalAmount        = 0;
                $OutstandingAmount      = 0;
                $singleWeekInterest      = 0;
                $frequency_days         = $frequency_days + 182.625;

                $InterestAmountrate     = ( $amount * $oRequest->interest_rate ) / 100; // Monthly interest rate
                $SingleDayInterest      = $InterestAmountrate / 365;
                $singleWeekInterest     = $SingleDayInterest * 182.625;

                $PrincipalAmount        = $OpeningAmount  / $term;
                $emi                    = $PrincipalAmount + $singleWeekInterest;
                $PrincipalAmount        = $emi -  $singleWeekInterest;
                for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 
                   
                    $OutstandingAmount      = $OpeningAmount - ( $PrincipalAmount * $i );

                    if($OutstandingAmount < 0){
                        $emi = $emi + $OutstandingAmount;
                        $OutstandingAmount = 0;
                    }

                    $totalLoanAmountWithInterest = ( $singleWeekInterest * $term ) + $OpeningAmount;
                    $Final_Principal             = $totalLoanAmountWithInterest;
                    
                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount,2);
                    $rdCalcualtionObj['interest']                   = number_format($singleWeekInterest,2);
                    $rdCalcualtionObj['outstanding']                = number_format($OutstandingAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $emi_credit_period =  $oRequest->emi_credit_period;
                    $OpeningDate    =  Carbon::parse($oRequest->opening_date)->addDays($frequency_days*$i)->format('d-m-Y');
                    $DueDate        =  Carbon::parse($OpeningDate)->addDays($emi_credit_period)->format('d-m-Y');

                    $Final_InterestEarned +=  $singleWeekInterest;

            }

        }
    }
    
        }else if($oRequest->emi_payout == 'yearly'){

            if($oRequest->loan_tenure != ''){
                
                if($oRequest->emi_type == 'reducing'){
                    $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d/m/Y');
                    $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('d/m/Y');
                    $OpeningAmount = $oRequest->loan_amount;
                    $Final_IntestAmount = 0;
                    $amount = $oRequest->loan_amount;
                    $rate = ( $oRequest->interest_rate )/100; 
                    $emiCreditPeriod=$oRequest->emi_credit_period;
                    $term = $oRequest->loan_tenure; // Term in months
                    $emi = $amount * $rate * (pow(1 + $rate, $term) / (pow(1 + $rate, $term) - 1));
                    for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 
    
                        $InterestCalculation    = 0;
                        $SingleDayInterest      = 0;
                        $PrincipalAmount        = 0;
                        $OutstandingAmount      = 0;
                        
                        $InterestCalculation    = ( $OpeningAmount * $oRequest->interest_rate ) / 100;
                        $SingleDayInterest      = $InterestCalculation ;
                        $PrincipalAmount        = $emi - $SingleDayInterest;
                        $OutstandingAmount = bcsub($OpeningAmount, $PrincipalAmount, 2);
    
                         // For the last EMI, adjust principal and outstanding balance to match exactly
                    if ($i == $oRequest->loan_tenure) {
                         $PrincipalAmount += $OutstandingAmount; // Adjust principal to clear remaining balance
                         $OutstandingAmount = 0;
                       }
                        $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                        $rdCalcualtionObj['due_date']                   = $DueDate;
                        $rdCalcualtionObj['emi']                        = $emi;
                        $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount,2);
                        $rdCalcualtionObj['interest']                   = number_format($SingleDayInterest,2);
                        $rdCalcualtionObj['outstanding']                = number_format($OutstandingAmount,2);
                        $rdCalcualtionObj['interest_due_date']          = 0;
                        $rdCalcualtionArr[]                             = $rdCalcualtionObj;
    
                        $OpeningAmount = $OutstandingAmount;
    
                        $emi_credit_period = $i + $oRequest->emi_credit_period;
                        $OpeningDate    =  Carbon::parse($oRequest->opening_date)->addYears($i)->format('d/m/Y');
                        $DueDate        =   Carbon::createFromFormat('d/m/Y', $OpeningDate)->addDays($emiCreditPeriod) ->format('d/m/Y');
                        $Final_InterestEarned += $SingleDayInterest;
                    }
                
                }
                }else{

                    
                $OpeningDate =  Carbon::parse($oRequest->opening_date)->format('d-m-Y');
                $DueDate =  Carbon::parse($oRequest->opening_date)->addDays($oRequest->emi_credit_period)->format('d-m-Y');
                $OpeningAmount = $oRequest->loan_amount;
              
                $Final_IntestAmount = 0;
                $frequency_days = 0;
                $amount = $oRequest->loan_amount;
                $term = $oRequest->loan_tenure; 
                $SingleDayInterest      = 0;
                $PrincipalAmount        = 0;
                $OutstandingAmount      = 0;
                $singleWeekInterest      = 0;
                $frequency_days         = $frequency_days + 365;
                $InterestAmountrate     = ( $amount * $oRequest->interest_rate ) / 100; // Monthly interest rate
                $SingleDayInterest      = $InterestAmountrate / 365;
                $YearlyInterest     = $SingleDayInterest * 365;

                $PrincipalAmount        = $OpeningAmount  / $term;
                $emi                    = $PrincipalAmount +$YearlyInterest;
                $PrincipalAmount        = $emi -  $YearlyInterest;
                for ($i=1; $i <= $oRequest->loan_tenure; $i++) { 
                   
                    $OutstandingAmount      = $OpeningAmount - ( $PrincipalAmount * $i );

                    if($OutstandingAmount < 0){
                        $emi = $emi + $OutstandingAmount;
                        $OutstandingAmount = 0;
                    }

                    $totalLoanAmountWithInterest = ( $YearlyInterest * $term ) + $OpeningAmount;
                    $Final_Principal             = $totalLoanAmountWithInterest;
                    
                    $rdCalcualtionObj['emi_date']                   = $OpeningDate;
                    $rdCalcualtionObj['due_date']                   = $DueDate;
                    $rdCalcualtionObj['emi']                        = $emi;
                    $rdCalcualtionObj['principal']                  = number_format($PrincipalAmount,2);
                    $rdCalcualtionObj['interest']                   = number_format($YearlyInterest,2);
                    $rdCalcualtionObj['outstanding']                = number_format($OutstandingAmount,2);
                    $rdCalcualtionObj['interest_due_date']          = 0;
                    $rdCalcualtionArr[]                             = $rdCalcualtionObj;

                    $emi_credit_period =  $oRequest->emi_credit_period;
                    $OpeningDate    =  Carbon::parse($oRequest->opening_date)->addDays($frequency_days*$i)->format('d-m-Y');
                    $DueDate        =  Carbon::parse($OpeningDate)->addDays($emi_credit_period)->format('d-m-Y');

                    $Final_InterestEarned +=  $YearlyInterest;
                }
              
            }

        }
        $RDInfo['opening_date']             = Carbon::parse($oRequest->opening_date)->format('d-m-Y');
        $RDInfo['loan_amount']                = round($oRequest->loan_amount,2);
        $RDInfo['interest_rate']            = $oRequest->interest_rate;
        $RDInfo['emi_payout']               = str_replace('_',' ',ucfirst($oRequest->emi_payout));
        $RDInfo['tenure']                   = $oRequest->loan_tenure;
        $RDInfo['Final_InterestEarned']     = round($Final_InterestEarned,2);
        $RDInfo['Final_MaturityAmount']     = round($Final_MaturityAmount,2);
        $RDInfo['Final_MaturityDate']       = $Final_MaturityDate;
        $RDInfo['Final_Principal']          = round($Final_Principal,2);
        $RDInfo['EMI_amount']               = round($oRequest->rd_amount,2);
        $RDInfo['EMICreditPeriod']          = $oRequest->emi_credit_period;
        $RDInfo['EMIType']                  = $oRequest->emi_type;
        
        
        
        $data['page_title'] = 'Loan Calculator Report';
        return view('admin.templates.loan_calculator.loan_calculator',compact('data','rdCalcualtionArr','RDInfo'));
    }
    

}
