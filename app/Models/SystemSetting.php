<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    use HasFactory;

    protected $fillable = ['key','value'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'system_settings';
    protected $primaryKey = 'id';

}
