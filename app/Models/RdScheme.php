<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RdScheme extends Model
{
    use HasFactory;

    protected $table = 'rd_schemes'; 

    protected $fillable = [
        'scheme_name',
        'interest_rate',
        'min_deposit_amount',
        'max_deposit_amount',
        'tenure_range',
        'tax_benefit',
        'interest_payout',
        'premature_withdrawal',
        'special_category',
    ];

    protected $casts = [
        'interest_rate' => 'decimal:2',
        'min_deposit_amount' => 'decimal:2',
        'max_deposit_amount' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
