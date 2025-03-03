<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'gender', 'mobile_no', 'alternate_mobile_no', 'email', 'dob','age','enrollment_date','agent_name','father_name','latitude','longitude',
        'relative_relation', 'mother_name', 'religion', 'member_cast', 
        'adhar_card_no', 'pan', 'voter_id_no', 'ration_card_no', 
        'driving_license_no', 'passport_no', 'class_id',
        'passport_document', 'adhar_card_document', 'driving_license_document', 
        'ration_card_document', 'electricity_bill_document', 'passport_photograph', 
        'signature', 'voter_id_document', 'bank_statement'
    ];
}
