<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDocument extends Model
{
    use HasFactory;

    protected $table = 'customer_documents';

    protected $fillable = [
        'member_id',
        'aadhaar',
        'pan',
        'driving_license',
        'ration_card',
        'electricity_bill',
        'passport_photo',
        'signature',
        'voter_id',
        'bank_statement'
    ];
}
