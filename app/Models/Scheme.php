<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    use HasFactory;
    protected $fillable = ['uuid','name','scheme_code','interest_payout','interest_rate','minimum_balance','collector_commission','daily_neft_limit','scan_pay_limit','remarks','slug','status','delete_status','created_by'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'schemes';
    protected $primaryKey = 'id';

}
