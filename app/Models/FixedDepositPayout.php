<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedDepositPayout extends Model
{
    use HasFactory;
    protected $fillable = [
        'fix_deposit_id',
        'due_date',
        'to_date',
        'amount',
        'interest',
        'maturity_amount',
        'payment_date',
        'delete_status',
        'created_by',
        'block_reason'
     ];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'fixed_deposit_payouts';
    protected $primaryKey = 'id';
    
}
