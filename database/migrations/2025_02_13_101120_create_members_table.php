<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->enum('prefix_name', ['Mr.', 'Ms.', 'Mrs.','Dr.','Prof.','Master','Shri','Smt']);
            $table->string('name');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('mobile_no')->unique();
            $table->string('alternate_mobile_no')->nullable();
            $table->string('email')->nullable()->unique();
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->string('relative_relation')->nullable();
            $table->string('relative_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('religion')->nullable();
            $table->string('member_cast')->nullable();
            $table->date('dob')->nullable();
            $table->integer('age')->nullable();
            $table->date('enrollment_date')->nullable();
            $table->string('latitude')->nullable();
            $table->enum('marital_status', ['Single', 'Married', 'UnMarried','Divorced','Widowed']);
            $table->string('longitude')->nullable();
            $table->string('adhar_card_no')->nullable()->unique();
            $table->string('pan')->nullable()->unique();
            $table->string('voter_id_no')->nullable()->unique();
            $table->string('ration_card_no')->nullable()->unique();
            $table->string('driving_license_no')->nullable()->unique();
            $table->string('passport_no')->nullable()->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('members');
    }
};
