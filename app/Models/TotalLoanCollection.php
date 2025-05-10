<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalLoanCollection extends Model
{
    use HasFactory;
    protected $fillable = [
        'loan_id',
        'agent_name',
        'agent_id',
        'customer_name',
        'customer_mobile',
        'amount',
        'late_fine',
        'emi_payout',
        'address',
        'status',
        'date_time', 
    ];

   
}
