<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdScheme extends Model
{
    use HasFactory;
    protected $table = 'fd_schemes';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'scheme_name',
        'interest_rate',
        'min_deposit_amount',
        'max_deposit_amount',
        'tenure_range',
        'tax_benefit',
        'interest_payout',
        'premature_withdrawal',
        'special_category'
    ];
}
