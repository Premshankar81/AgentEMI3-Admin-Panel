<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashbook extends Model
{
    use HasFactory;
    protected $table = 'cashbook';
    protected $fillable = [
        'date',
        'description',
        'transaction_type',
        'debit_amount',
        'credit_amount',
        'balance',
        'delete_status',
        'created_by',
    ];
}
