<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanScheme extends Model
{
    use HasFactory;
    protected $fillable = ['emi_credit_period','unique_code','scheme_code','name','min_amount','max_amount','interest_rate','collection_charge','Collector_commission_rate','remarks','emi_type','pre_closure_charges','pre_closure_charges_value','processing_fees','processing_fees_value','stamp_duty_charge','stamp_duty_charge_value','other_emi_charge','other_emi_charge_value','slug','status','delete_status','created_by'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'loan_schemes';
    protected $primaryKey = 'id';
    
}


