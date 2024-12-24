<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingAccount extends Model
{
    use HasFactory;

     protected $fillable = ['last_interest_cal_date','uuid','nominee','application_mo','application_unique','application_date','customer_id','joint_customer_id','update_scheme_date','scheme_id','agent_id','agent_change_log','lien_amount','neft_limit_amount','scan_pay_limit_amount','opening_amount','available_balance','minor_id','collector_agent_id','close_date','collector_agent_change_log','status','delete_status','created_by','block_reason'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'saving_accounts';
    protected $primaryKey = 'id';

    public function customer(){
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
    public function join_customer(){
        return $this->belongsTo(User::class, 'joint_customer_id', 'id')->select(array('id', 'name','customer_code'));
    }
    public function scheme(){
        return $this->belongsTo(Scheme::class, 'scheme_id', 'id');
    }
    public function agent(){
        return $this->belongsTo(Admin::class, 'agent_id', 'id');
    }
    public function collector_agent(){
        return $this->belongsTo(Admin::class, 'collector_agent_id', 'id');
    }

}
