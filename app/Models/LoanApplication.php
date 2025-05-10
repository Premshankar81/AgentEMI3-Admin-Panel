<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    use HasFactory;

    protected $table = 'loan_application';

    protected $fillable = [
        'opening_date',
        'customer_id',
        'scheme_id',
        'agent_id',
        'loan_purpose',
        'loan_amount',
        'interest_rate',
        'loan_payout',
        'loan_tenure',
        'loan_type',
        'witness_name_1',
        'witness_address_1',
        'witness_name_2',
        'witness_address_2'
    ];
}
