<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    use HasFactory;
    protected $fillable = ['title','ledger_group','opening_balanace','closing_balance','ledger_transaction_type','type','slug','status','delete_status','created_by'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'ledgers';
    protected $primaryKey = 'id';

    public function ledgerTpye(){
        return $this->belongsTo(LedgerTpye::class, 'type', 'id')->select(array('id', 'title'));
    }
    public function ledgerGroup(){
        return $this->belongsTo(LedgerGroup::class, 'type', 'id')->select(array('id', 'title'));
    }

}
