<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeaves extends Model
{
    use HasFactory;
    protected $fillable = [
        'employees_id',
        'leaves_types_id',
        'start_date',
        'end_date',
        'reason',
        'status',
    ];

     // Relationship: A leave request belongs to a staff member
     public function employee()
     {
         return $this->belongsTo(Employees::class,'employees_id');
     }
 
     // Relationship: A leave request belongs to a leave type
     public function leaveType()
     {
         return $this->belongsTo(LeavesTypes::class,'leaves_types_id');
     }
}
