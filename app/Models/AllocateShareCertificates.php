<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllocateShareCertificates extends Model
{
    use HasFactory;

     protected $fillable = ['lot_number','share_range','member_id','transfer_date','total_shares','share_certificate_json','share_nominal_value','total_shares_value','pay_mode','status','delete_status','created_by'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'allocate_share_certificates';
    protected $primaryKey = 'id';
    
     public function memberDetails(){
        return $this->belongsTo(User::class, 'member_id', 'id')->select(array('id', 'name','customer_code'));
    }
    
}
