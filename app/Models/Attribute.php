<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','status','delete_status','created_by'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'attributes';
    protected $primaryKey = 'id';

}
