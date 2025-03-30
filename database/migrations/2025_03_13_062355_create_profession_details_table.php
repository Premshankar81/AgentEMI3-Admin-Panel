<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('profession_details', function (Blueprint $table) {
            $table->id();
            $table->string('occupation', 30);
            $table->enum('employment_type', [
                'house_wife', 'retired', 'salaried', 'self_employed_professional', 'self_employed', 'student', 'not_employed'
            ]);
            $table->string('business_name', 50)->nullable();
            $table->string('address1', 100)->nullable();
            $table->string('address2', 100)->nullable();
            $table->string('state_id');
            $table->string('district')->nullable();
            $table->string('pin_code', 6)->nullable();
            $table->string('employer_contact', 10)->nullable();
            $table->string('employer_email', 50)->nullable();
            $table->decimal('monthly_income', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profession_details');
    }
};
