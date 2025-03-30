<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedDeposit extends Model
{
    use HasFactory;

      protected $fillable = [
             	'uuid',
             	'appltomer_id',
             	'scheme_id',
             	'ageication_date',
             	'customer_id',
                'agent_id',
             	'fd_amount',
             	'fd_frequency',
             	'fd_tenure',
                'maturity_amount',
                'maturity_date',
                'status',
             	'delete_status',
             	'created_by',
                'close_date',
                'paymode',
                'interest_rate',
             	'available_balance',

     ];

    protected $hidden = ['created_at','updated_at'];
    protected $table = 'fixed_deposits';
    protected $primaryKey = 'id';

    // public function customer(){
    //     return $this->belongsTo(User::class, 'customer_id', 'id');
    // }
    // public function join_customer(){
    //     return $this->belongsTo(User::class, 'joint_customer_id', 'id')->select(array('id', 'name','customer_code'));
    // }
    // public function RDscheme(){
    //     return $this->belongsTo(RecurringScheme::class, 'scheme_id', 'id');
    // }

    // public function FDscheme(){
    //     return $this->belongsTo(FixedDepositScheme::class, 'scheme_id', 'id');
    // }
    
    // public function agent(){
    //     return $this->belongsTo(Admin::class, 'agent_id', 'id');
    // }
    //  public function collector_agent(){
    //     return $this->belongsTo(Admin::class, 'collector_agent_id', 'id');
    // }

}
