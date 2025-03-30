<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $table = 'customer_addresses';

    protected $fillable = [
        'member_id', 'residense_type', 'stability',
        'present_residence_type', 'present_address1', 'present_address2', 'present_ward', 'present_area',
        'present_state', 'present_city', 'present_pin_code',
        'permanent_residence_type', 'permanent_address1', 'permanent_address2', 'permanent_ward',
        'permanent_area', 'permanent_state', 'permanent_city', 'permanent_pin_code'
    ];
}
