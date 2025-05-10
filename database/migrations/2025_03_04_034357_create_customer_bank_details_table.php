<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('customer_bank_details', function (Blueprint $table) {
            $table->id();
            $table->int('member_id')->unique();
            $table->string('ifsc_code', 40);
            $table->string('bank_name', 40);
            $table->string('bank_address', 250);
            $table->enum('account_type', ['saving', 'current']);
            $table->string('account_no', 20)->unique();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('customer_bank_details');
    }
};
