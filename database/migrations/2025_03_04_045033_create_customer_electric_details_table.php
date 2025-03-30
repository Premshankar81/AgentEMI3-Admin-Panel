<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('customer_electric_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id')->unique();
            $table->string('electric_meterno', 30);
            $table->string('electric_consumer_id', 30);
            $table->string('electric_owner_name', 30);
            $table->string('electric_relation', 20)->nullable();
            $table->date('electric_last_bill_date');
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_electric_details');
    }
};

