<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentRank extends Model
{
     protected $fillable = ['title','rank','description','slug','status','delete_status','created_by'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'agent_ranks';
    protected $primaryKey = 'id';
    use HasFactory;
}
