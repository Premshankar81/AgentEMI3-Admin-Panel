<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_name',
        'email',
        'mobile',
        'position',
        'employee_id',
        'joining_date',
        'status',
    ];

    // Relationship: A staff member can have many leave requests
    public function leaves()
    {
        return $this->hasMany(StaffLeave::class);
    }
}
