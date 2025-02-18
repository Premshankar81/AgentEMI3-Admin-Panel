<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_leaves', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('employees_id'); // Foreign key to employees table
            $table->unsignedBigInteger('leaves_types_id'); // Foreign key to leave_types table
            $table->date('start_date'); // Leave start date
            $table->date('end_date'); // Leave end date
            $table->text('reason')->nullable(); // Reason for leave
            $table->string('status')->default('pending'); // Leave status: pending/approved/rejected
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('employees_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('leaves_types_id')->references('id')->on('leaves_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_leaves');
    }
}
