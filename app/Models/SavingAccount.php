<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingAccount extends Model
{
    use HasFactory;

     protected $fillable = ['id','uuid','application_date','customer_id','update_scheme_date','scheme_id','agent_id', 'opening_amount','available_balance','close_date','status','paymode','delete_status','created_by'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'saving_accounts';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->belongsTo(Employees::class, 'agent_id'); // Adjust foreign and local keys as needed
    }
    public function savingScheme(){
        return $this->belongsTo(SavingScheme::class, 'scheme_id');
    }
   

}
