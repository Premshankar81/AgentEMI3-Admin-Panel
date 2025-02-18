<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    protected $primaryKey = 'commission_id';

    protected $fillable = [
        'employees_id',
        'commission_amount',
    ];

    public function employee()
    {
        return $this->belongsTo(Employees::class, 'employees_id');
    }
}
