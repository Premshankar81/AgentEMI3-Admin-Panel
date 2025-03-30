<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('customer_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->string('aadhaar')->nullable();
            $table->string('pan')->nullable();
            $table->string('driving_license')->nullable();
            $table->string('ration_card')->nullable();
            $table->string('electricity_bill')->nullable();
            $table->string('passport_photo')->nullable();
            $table->string('signature')->nullable();
            $table->string('voter_id')->nullable();
            $table->string('bank_statement')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_documents');
    }
};
