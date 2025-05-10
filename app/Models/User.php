<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_of_share','class_id','prifix_name','name','customer_id','customer_code','email','mobile','alternate_mobile','password','agent_id','delete_status','status','joining_date','created_by','gender','dob','age','marital_status','relative_relation','relative_name','mother_Name','religion','member_cast','rating','latitude','longitude','aadharcard_no','pan','voter_id_no','ration_card_no','driving_license_no','passport_no','residense_type','stability','present_residence_type','present_address1','present_address2','present_ward','present_area','present_state_id','present_city_id','present_pin_code','permanent_residence_type','permanent_address1','permanent_address2','permanent_ward','permanent_area','permanent_state_id','permanent_city_id','permanent_pin_code','ifsc_code','bank_name','bank_address','account_type','account_no','cust_prof_occupation','cust_prof_type','cust_prof_business','cust_prof_address1','cust_prof_address2','cust_prof_state_id','cust_prof_city_id','cust_prof_pin_code','cust_prof_mobile','cust_prof_email','cust_prof_monthly_income','electric_meterno','electric_consumer_id','electric_owner_name','electric_relation','electric_last_bill_date','member_nominee','kyc_passport','kyc_aadhaar_card_front','kyc_aadhaar_card_back','kyc_pan',
            'kyc_voter_card','kyc_driving_license','kyc_ration_card','kyc_address_passport','kyc_address_aadhaar_card_front','kyc_address_aadhaar_card_back','kyc_address_kyc_voter_card','kyc_address_driving_license','kyc_address_ration_card','kyc_address_telephone_bill','kyc_address_bank_statement','kyc_address_electricity_bill','kyc_address_lpg_gas','kyc_address_trade_license','kyc_address_other_government_id','kyc_passport_photograph','kyc_signature'




    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function classname(){
        return $this->belongsTo(Classes::class, 'class_id', 'id')->select(array('id', 'title'));
    }
    
    public function state(){
        return $this->belongsTo(State::class, 'present_state_id', 'id')->select(array('id', 'title'));
    }
    public function city(){
        return $this->belongsTo(City::class, 'present_city_id', 'id')->select(array('id', 'title'));
    }
    
    public function permanent_state(){
        return $this->belongsTo(State::class, 'present_state_id', 'id')->select(array('id', 'title'));
    }
    public function permanent_city(){
        return $this->belongsTo(City::class, 'present_city_id', 'id')->select(array('id', 'title'));
    }
}
