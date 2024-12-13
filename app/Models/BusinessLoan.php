<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessLoan extends Model
{
    use HasFactory;

     protected $fillable = [
                'uuid',
                'account_no',
                'application_mo',
                'application_unique',
                'application_date',
                'customer_id',
                'co_applicant_member_id',
                'scheme_id',
                'agent_id',
                'minor_id',
                'emi_payout',
                'tenure',
                'loan_amount',
                'block_reason',
                'status',
                'delete_status',
                'created_by',
                'block_reason',
                'agent_change_log',
                'nominee',
                'annual_interest_rate',
                'collector_agent_id',
                'collector_agent_change_log',
                'available_balance',
                'link_saving_account_id',
                'link_saving_account_id',
                'nature_of_business',
                'loan_amount_requested',
                'approval_remarks',
                'security_type',
                'reference_no',
                'collection_charge',
                'collection_charge_value',
                'Collector_commission_rate',
                'purpose_of_loan',
                'guaranter_first',
                'guaranter_second',
                'name_of_witness_first',
                'name_of_witness_first_address',
                'name_of_witness_second',
                'name_of_witness_second_address',
                'disburse_date',
                'first_emi_date',
                'insurance_charge',
                'credit_shield',
                'other_charge'

     ];



    protected $hidden = ['created_at','updated_at'];
    protected $table = 'business_loans';
    protected $primaryKey = 'id';

    public function customer(){
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
    public function join_customer(){
        return $this->belongsTo(User::class, 'joint_customer_id', 'id')->select(array('id', 'name','customer_code'));
    }
    public function RDscheme(){
        return $this->belongsTo(RecurringScheme::class, 'scheme_id', 'id');
    }

    public function FDscheme(){
        return $this->belongsTo(FixedDepositScheme::class, 'scheme_id', 'id');
    }
    public function Loanscheme(){
        return $this->belongsTo(LoanScheme::class, 'scheme_id', 'id');
    }
    
    public function agent(){
        return $this->belongsTo(Admin::class, 'agent_id', 'id');
    }
     public function collector_agent(){
        return $this->belongsTo(Admin::class, 'collector_agent_id', 'id');
    }

}
