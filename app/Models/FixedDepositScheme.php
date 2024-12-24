<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedDepositScheme extends Model
{
    use HasFactory;

     protected $fillable = [
     	'unique_code',
     	'scheme_code',
     	'name',
     	'min_fd_amount',
     	'max_fd_amount',
     	'fd_frequency',
     	'interest_compounding',
     	'interest_rate',
     	'fd_tenure',
     	'cancellation_charge',
     	'cancellation_charge_value',
     	'collection_charge',
     	'Collector_commission_rate',
     	'remarks',
     	'penalty_type',
     	'slug',
     	'status',
     	'delete_status',
     	'created_by'];

    protected $hidden = ['created_at','updated_at'];
    protected $table = 'fixed_deposit_schemes';
    protected $primaryKey = 'id';
}
