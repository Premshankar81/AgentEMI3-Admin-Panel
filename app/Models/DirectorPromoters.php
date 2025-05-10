<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectorPromoters extends Model
{
    use HasFactory;

      protected $fillable = [
        'prifix_name',
        'name',
        'customer_id',
        'folio_number',
        'customer_code',
        'email','mobile',
        'alternate_mobile',
        'password',
        'agent_id',
        'delete_status',
        'status',
        'joining_date',
        'din',
        'created_by',
        'gender',
        'dob',
        'age',
        'class_id',
        'marital_status',
        'relative_relation',
        'relative_name',
        'mother_Name',
        'religion',
        'member_cast',
        'rating',
        'latitude',
        'longitude',
        'aadharcard_no',
        'pan',
        'voter_id_no',
        'ration_card_no',
        'driving_license_no',
        'passport_no',
        'status',
        'delete_status',
        'created_by',
        'appointment_date',
        'is_director',
        'is_promoters',
        'present_residence_type',
        'present_address1',
        'present_address2',
        'present_ward',
        'present_area',
        'present_state_id','present_city_id','present_pin_code','permanent_residence_type','permanent_address1','permanent_address2','permanent_ward','permanent_area','permanent_state_id','permanent_city_id','permanent_pin_code','residense_type','cust_prof_occupation','cust_prof_type','cust_prof_business','cust_prof_address1','cust_prof_address2','cust_prof_state_id','cust_prof_city_id','cust_prof_pin_code','cust_prof_monthly_income','ifsc_code','bank_name','bank_address','account_type','account_no','member_nominee'];




    protected $hidden = ['created_at','updated_at'];
    protected $table = 'director_promoters';
    protected $primaryKey = 'id';

}
