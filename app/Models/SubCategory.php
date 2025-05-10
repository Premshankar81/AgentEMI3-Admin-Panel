<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['title','category_id','image','slug','status','delete_status','created_by'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'sub_categories';
    protected $primaryKey = 'id';

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id')->select(array('id', 'title'));
    }

}
