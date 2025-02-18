<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveLoan extends Model
{
    use HasFactory;
    protected $table = 'loan_disburse';
    protected $fillable = [
        'loan_id',
        'agent_name',
        'agent_id',
        'customer_name',
        'customer_mobile',
        'principal_amount',
        'disbursed_amount',
        'interest_rate',
        'outstanding_balance',
        'installment_amount',
        'extra_payment',
        'repayment_terms',
        'next_due_date',
        'customer_address',
        'start_date',
        'end_date',
        'emi_payout',
        'delete_status',
        'created_by',
    ];
}
