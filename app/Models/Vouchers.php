<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vouchers extends Model
{
    use HasFactory;

     protected $fillable = ['title','voucher_number','unique_number','voucher_date','total_credit','total_debit','remark','slug','status','delete_status','created_by'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'vouchers';
    protected $primaryKey = 'id';
    
    
    
     public function vouchersdebitledger(){
        return $this->belongsTo(Ledger::class, 'debit_ledger_account_id', 'id')->select(array('id', 'title'));
    }
    
}


