<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('mobile_no')->unique();
            $table->string('alternate_mobile_no')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('relative_relation')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('religion')->nullable();
            $table->string('member_cast')->nullable();
            $table->string('adhar_card_no')->nullable()->unique();
            $table->string('pan')->nullable()->unique();
            $table->string('voter_id_no')->nullable()->unique();
            $table->string('ration_card_no')->nullable()->unique();
            $table->string('driving_license_no')->nullable()->unique();
            $table->string('passport_no')->nullable()->unique();
            $table->unsignedBigInteger('class_id')->nullable();
            
            // File paths for document uploads
            $table->string('passport_document')->nullable();
            $table->string('adhar_card_document')->nullable();
            $table->string('driving_license_document')->nullable();
            $table->string('ration_card_document')->nullable();
            $table->string('electricity_bill_document')->nullable();
            $table->string('passport_photograph')->nullable();
            $table->string('signature')->nullable();
            $table->string('voter_id_document')->nullable();
            $table->string('bank_statement')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('members');
    }
};
