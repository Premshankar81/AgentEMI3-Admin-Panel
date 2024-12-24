<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    
    protected $fillable = ['title','country_id','state_id','slug','status','delete_status','created_by'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'cities';
    protected $primaryKey = 'id';

    public function country(){
        return $this->belongsTo(Country::class, 'country_id', 'id')->select(array('id', 'title'));
    }
    public function state(){
        return $this->belongsTo(State::class, 'state_id', 'id')->select(array('id', 'title'));
    }

}
