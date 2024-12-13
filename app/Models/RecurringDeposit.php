<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecurringDeposit extends Model
{
    use HasFactory;

     protected $fillable = [
     	'uuid',
        'account_no',
     	'application_mo',
     	'application_unique',
     	'application_date',
     	'customer_id',
     	'joint_customer_id',
     	'scheme_id',
     	'agent_id',
     	'minor_id',
     	'rd_amount',
     	'rd_frequency',
     	'rd_tenure',
        'maturity_interest_amount',
        'maturity_amount',
        'maturity_date',
        'interest_rate',
        'transaction_amount',
     	'status',
     	'delete_status',
     	'created_by',
     	'block_reason',
     	'agent_change_log',
     	'nominee',
     	'collector_agent_id',
     	'collector_agent_change_log',
     	'available_balance',
        'link_saving_account_id'
     ];





    protected $hidden = ['created_at','updated_at'];
    protected $table = 'recurring_deposits';
    protected $primaryKey = 'id';

    public function customer(){
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
    public function join_customer(){
        return $this->belongsTo(User::class, 'joint_customer_id', 'id')->select(array('id', 'name','customer_code'));
    }
    public function RDscheme(){
        return $this->belongsTo(RecurringScheme::class, 'scheme_id', 'id');
    }
    public function agent(){
        return $this->belongsTo(Admin::class, 'agent_id', 'id');
    }
     public function collector_agent(){
        return $this->belongsTo(Admin::class, 'collector_agent_id', 'id');
    }

}
