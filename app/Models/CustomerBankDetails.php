<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBankDetails extends Model {
    use HasFactory;

    protected $table = 'customer_bank_details';

    protected $fillable = [
        'member_id',
        'ifsc_code',
        'bank_name',
        'bank_address',
        'account_type',
        'account_no'
    ];

    protected $casts = [
        'member_id' => 'string',
    ];
}
