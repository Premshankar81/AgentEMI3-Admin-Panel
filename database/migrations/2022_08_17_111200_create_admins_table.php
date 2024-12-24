<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('email')->nullable();
            
            $table->string('mobile')->nullable();
            $table->string('country_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('city_id')->nullable();
            
            $table->string('branch_code')->nullable();
            $table->string('pincode')->nullable();
            $table->string('tax_name')->nullable();
            $table->string('tax_number')->nullable();
            
            $table->string('cin')->nullable();
            $table->string('website')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->string('time_zone')->nullable();
            
            $table->date('opening_date')->nullable();
            $table->string('address_first')->nullable();
            $table->string('address_second')->nullable();
            
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_type')->nullable();
            $table->string('password')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->enum('delete_status', ['0', '1'])->default('0');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
