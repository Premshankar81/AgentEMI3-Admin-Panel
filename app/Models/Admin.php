<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'default_ledger_id','pdf_title','pdf_email','pdf_mobile','pdf_address','pdf_cin','agent_code','unique_code','name', 'email', 'password','mobile','user_type','image','delete_status','status','type','branch_code','address_first','address_second','country_id','state_id','city_id','pincode','opening_date','tax_name','tax_number','pan','cin','website','currency_symbol','time_zone','logo','associate_customer_id','join_date','gender','prifix_name','agent_rank_id','up_line_agent_id','dob','blood_group','occupation','aadhar_no','pan','father_name','spouse_name','designation','ifsc_code','bank_name','account_type','account_no','created_by','profile_img'
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
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function state(){
        return $this->belongsTo(State::class, 'state_id', 'id')->select(array('id', 'title'));
    }
    public function city(){
        return $this->belongsTo(City::class, 'city_id', 'id')->select(array('id', 'title'));
    }
    public function agent_rank(){
        return $this->belongsTo(AgentRank::class, 'agent_rank_id', 'id');
    }
     public function associate_customer(){
        return $this->belongsTo(User::class, 'associate_customer_id', 'id');
    }
    

}
