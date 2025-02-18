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
        'father_no',
        'account_no',
        'joining_date',
        'ifsc_code',
        'branch_name',
        'status',
    ];

    // Relationship: A staff member can have many leave requests
    public function leaves()
    {
        return $this->hasMany(EmployeeLeaves::class, 'employees_id');
    }

    public function target()
    {
        return $this->belongsTo(Target::class);
    }
    
    public function employee()
    {
        return $this->belongsTo(Employees::class, 'employees_id', 'id'); // Adjust foreign and local keys as needed
    }
}