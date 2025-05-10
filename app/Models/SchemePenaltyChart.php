<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchemePenaltyChart extends Model
{

    protected $fillable = ['recurring_scheme_id','from_days','to_days','calculation_type','parameter','delete_status','created_by'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'scheme_penalty_charts';
    protected $primaryKey = 'id';
    
    use HasFactory;
}
