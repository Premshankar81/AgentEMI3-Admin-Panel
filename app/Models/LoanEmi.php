<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanEmi extends Model
{
    use HasFactory;
     protected $fillable = [
        'loan_id',
        'emi_date',
        'due_date',
        'emi',
        'principal',
        'interest',
        'outstanding',
        'payment_date',
        'advance_amount',
        'delete_status',
        'created_by',
        'penalty_amount',
        'penalty_status',
        'block_reason'
     ];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'loan_emis';
    protected $primaryKey = 'id';

}
