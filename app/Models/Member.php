<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $fillable = [
       'id', 'prefix_name','name', 'gender', 'mobile_no', 'alternate_mobile_no', 'email','status','marital_status', 'dob','age','enrollment_date','agent_id','father_name','latitude','longitude',
        'relative_relation', 'relative_name','mother_name', 'religion', 'member_cast', 
        'adhar_card_no', 'pan', 'voter_id_no', 'ration_card_no', 
        'driving_license_no', 'passport_no', 'class','allocate_share_payment_mode','allocate_share_no_of_share','member_ship_payment_mode','member_ship_fees_amount'
       
    ];

    public function employee()
    {
        return $this->belongsTo(Employees::class, 'agent_id'); // Adjust foreign and local keys as needed
    }
}
