<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecurringDepositEmi extends Model
{

	 protected $fillable = [
     	'recurring_deposit_id',
     	'due_date',
     	'to_date',
     	'amount',
        'interest',
        'maturity_amount',
        'advance_amount',
     	'payment_date',
     	'delete_status',
     	'created_by',
     	'block_reason'
     ];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'recurring_deposit_emis';
    protected $primaryKey = 'id';
    
    use HasFactory;
    
     public function recurringDeposit(){
        return $this->belongsTo(RecurringDeposit::class, 'recurring_deposit_id', 'uuid');
    }
}
