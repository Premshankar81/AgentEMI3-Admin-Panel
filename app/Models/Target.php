<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected $primaryKey = 'target_id';

    protected $fillable = [
        'employees_id',
        'target_type',
        'target_value',
        'incentive',
        'start_date',
        'end_date',
        'achievement',
        'status',
    ];

    public function employee()
    {
        return $this->belongsTo(Employees::class, 'employees_id');
    }
}
