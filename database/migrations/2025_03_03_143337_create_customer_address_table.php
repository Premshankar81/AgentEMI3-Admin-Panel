<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->int('member_id')->unique(); 
            $table->string('residense_type');
            $table->string('stability')->nullable();

            // Present Address
            $table->string('present_residence_type');
            $table->string('present_address1');
            $table->string('present_address2')->nullable();
            $table->string('present_ward')->nullable();
            $table->string('present_area')->nullable();
            $table->string('present_state');
            $table->string('present_city');
            $table->string('present_pin_code');

            // Permanent Address
            $table->string('permanent_residence_type');
            $table->string('permanent_address1');
            $table->string('permanent_address2')->nullable();
            $table->string('permanent_ward')->nullable();
            $table->string('permanent_area')->nullable();
            $table->string('permanent_state');
            $table->string('permanent_city');
            $table->string('permanent_pin_code');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_addresses');
    }
};
