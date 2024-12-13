<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    
    protected $fillable = ['title','country_id','slug','status','delete_status','created_by'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'states';
    protected $primaryKey = 'id';

     public function country(){
        return $this->belongsTo(Country::class, 'country_id', 'id')->select(array('id', 'title'));
    }


}
