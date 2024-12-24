<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    protected $fillable = ['title','attribute_id','slug','status','delete_status','created_by'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'attribute_values';
    protected $primaryKey = 'id';


     public function attribute(){
        return $this->belongsTo(Attribute::class, 'attribute_id', 'id')->select(array('id', 'title'));
    }


}
