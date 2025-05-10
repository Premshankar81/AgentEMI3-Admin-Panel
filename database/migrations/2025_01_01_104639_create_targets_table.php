<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetsTable extends Migration
{
    public function up()
    {
        Schema::create('targets', function (Blueprint $table) {
            $table->id('target_id'); // Primary key
            $table->foreignId('employees_id')->constrained('employees')->onDelete('cascade'); // Foreign key to employees table
            $table->string('target_type'); // e.g., sales, loans
            $table->integer('target_value'); // Target amount
            $table->integer('incentive');
            $table->date('start_date'); // Start date of the target
            $table->date('end_date'); // End date of the target
            $table->integer('achievement');
            $table->enum('status', ['Pending', 'Completed'])->default('Pending'); // Target status
            $table->timestamps(); // Created and updated timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('targets');
    }
}
