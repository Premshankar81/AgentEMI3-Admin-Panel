<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class CustomerNominee extends Model
{
    use HasFactory;
    protected $table = 'customer_nominee';
    
    protected $fillable = [
        'member_id', 'nominee_name', 'nominee_relation', 'nominee_dob',
        'nominee_age', 'nominee_mobile', 'nominee_address', 'nominee_aadhar_no',
        'nominee_pan', 'nominee_voter_id', 'nominee_ration_card'
    ];
}