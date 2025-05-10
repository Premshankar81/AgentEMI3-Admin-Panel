<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id','occupation', 'employment_type', 'business_name',
        'address1', 'address2', 'state', 'district',
        'pin_code', 'employer_contact', 'employer_email',
        'monthly_income'
    ];
}
