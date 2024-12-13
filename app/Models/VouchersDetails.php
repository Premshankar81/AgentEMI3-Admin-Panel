<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vouchers;

class VouchersDetails extends Model
{
    use HasFactory;
     protected $fillable = ['voucher_id','transaction_type','ledger_account_id','ledger_account_close_balance','ledger_account_amount','status','delete_status','created_by'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'vouchers_details';
    protected $primaryKey = 'id';
    
     public function voucher(){
      return $this->belongsTo(vouchers::class, 'voucher_id', 'id');
   }
   public function createdBy(){
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }
     public function DebitledgerAccount(){
        return $this->belongsTo(Ledger::class, 'debit_ledger_account_id', 'id')->select(array('id', 'title'));
    }
     public function CreditledgerAccount(){
        return $this->belongsTo(Ledger::class, 'credit_ledger_account_id', 'id')->select(array('id', 'title'));
    }

}
