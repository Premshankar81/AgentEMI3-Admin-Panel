<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectorPromotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        if (!Schema::hasTable('director_promoters')) {
            Schema::create('director_promoters', function (Blueprint $table) {
                $table->id();
                $table->string('prifix_name')->nullable();
                $table->string('name')->nullable();
                $table->string('customer_code')->nullable();
                $table->string('customer_id')->nullable();
                $table->string('email')->nullable();
                $table->string('mobile')->nullable();
                $table->string('alternate_mobile')->nullable();
                $table->string('gender')->nullable();
                $table->string('dob')->nullable();
                $table->string('age')->nullable();
                $table->string('marital_status')->nullable();
                $table->string('relative_relation')->nullable();
                $table->string('relative_name')->nullable();
                $table->string('mother_Name')->nullable();

                $table->string('religion')->nullable();
                $table->string('member_cast')->nullable();
                $table->string('rating')->nullable();
                $table->string('latitude')->nullable();
                $table->string('longitude')->nullable();

                $table->string('pan')->nullable();
                $table->string('aadharcard_no')->nullable();
                $table->string('voter_id_no')->nullable();
                $table->string('ration_card_no')->nullable();
                $table->string('driving_license_no')->nullable();
                $table->string('passport_no')->nullable();
                
                $table->string('din')->nullable();
                $table->string('folio_number')->nullable();
                $table->date('appointment_date')->nullable();
                $table->date('joining_date')->nullable();
                $table->enum('status',['active','inactive'])->default('active');
                $table->enum('delete_status', ['0', '1'])->default('0');

                $table->string('password')->nullable();
                $table->rememberToken();
                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('director_promoters');
    }
}
