<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransationHistory extends Model
{
    use HasFactory;
     protected $fillable = ['tran_page_type','type','user_type','account_id','user_id','customer_id','transation_type','transation_date','description','payment_mode','bank_id','cheque_date','cheque_no','close_status','reference_no','bank_account_ledger_id','amount','remarks','status','delete_status','created_by','agent_payment_status'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'transation_histories';
    protected $primaryKey = 'id';

    public function customer(){
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
    public function account(){
        return $this->belongsTo(SavingAccount::class, 'account_id', 'id');
    }
    public function rd_account(){
        return $this->belongsTo(RecurringDeposit::class, 'account_id', 'id');
    }
    public function fd_account(){
        return $this->belongsTo(FixedDeposit::class, 'account_id', 'id');
    }
    public function loan_account(){
        return $this->belongsTo(BusinessLoan::class, 'account_id', 'id');
    }
    public function ledger(){
        return $this->belongsTo(Ledger::class, 'bank_account_ledger_id', 'id');
    }
    public function createdBy(){
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }
    

}
