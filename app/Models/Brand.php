<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['title','image','slug','status','delete_status','created_by'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'brands';
    protected $primaryKey = 'id';

}
