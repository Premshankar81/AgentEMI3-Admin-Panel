<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerElectricDetail extends Model
{
    use HasFactory;

    protected $table = 'customer_electric_details';

    protected $fillable = [
        'member_id',
        'electric_meterno',
        'electric_consumer_id',
        'electric_owner_name',
        'electric_relation',
        'electric_last_bill_date'
    ];
}
