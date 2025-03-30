<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingScheme extends Model
{
    use HasFactory;

    protected $table = 'saving_schemes'; // Define the table name explicitly

    protected $fillable = [
        'scheme_name',
        'description',
        'interest_rate',
        'minimum_balance',
        'withdrawal_limit',
        'eligibility',
        'benefits',
        'status',
    ];

    protected $casts = [
        'interest_rate' => 'decimal:2',
        'minimum_balance' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
