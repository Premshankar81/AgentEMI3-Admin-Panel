<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerTpye extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','status','delete_status','created_by'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'ledger_tpyes';
    protected $primaryKey = 'id';
}
