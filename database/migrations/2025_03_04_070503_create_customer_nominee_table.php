<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerNomineeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_nominee', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->string('nominee_name');
            $table->string('nominee_relation');
            $table->date('nominee_dob')->nullable();
            $table->integer('nominee_age')->nullable();
            $table->string('nominee_mobile', 10)->nullable();
            $table->text('nominee_address');
            $table->string('nominee_aadhar_no', 12)->nullable();
            $table->string('nominee_pan', 10)->nullable();
            $table->string('nominee_voter_id', 30)->nullable();
            $table->string('nominee_ration_card', 30)->nullable();
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
        Schema::dropIfExists('customer_nominee');
    }
}
