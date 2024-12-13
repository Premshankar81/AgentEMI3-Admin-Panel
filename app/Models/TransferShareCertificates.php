<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferShareCertificates extends Model
{
    use HasFactory;

     protected $fillable = ['lot_number','share_range','member_id_from','member_id','transfer_date','no_of_share','face_value','total_consideration','status','delete_status','created_by'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'transfer_share_certificates';
    protected $primaryKey = 'id';
    
     public function memberFromDetails(){
        return $this->belongsTo(User::class, 'member_id_from', 'id')->select(array('id', 'name','customer_code'));
    }
         public function memberDetails(){
        return $this->belongsTo(User::class, 'member_id', 'id')->select(array('id', 'name','customer_code'));
    }

}
