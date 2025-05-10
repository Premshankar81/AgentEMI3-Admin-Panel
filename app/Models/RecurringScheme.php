<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecurringScheme extends Model
{

    protected $fillable = ['unique_code','scheme_code','name','min_rd_amount','rd_frequency','interest_compounding','interest_rate','rd_tenure','cancellation_charge','collection_charge','Collector_commission_rate','remarks','penalty_type','slug','status','delete_status','created_by'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'recurring_schemes';
    protected $primaryKey = 'id';

    use HasFactory;
}
