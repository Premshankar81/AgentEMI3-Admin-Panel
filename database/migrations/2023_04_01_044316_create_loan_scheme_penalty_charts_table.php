<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanSchemePenaltyChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('loan_scheme_penalty_charts')) {
            Schema::create('loan_scheme_penalty_charts', function (Blueprint $table) {
                $table->id();
                $table->string('loan_scheme_id')->nullable();
                $table->string('from_days')->nullable();
                $table->string('to_days')->nullable();
                $table->string('calculation_type')->nullable();
                $table->string('parameter')->nullable();
                $table->integer('created_by')->nullable();
                $table->enum('status',['active','inactive'])->default('active');
                $table->enum('delete_status', ['0', '1'])->default('0');
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
        Schema::dropIfExists('loan_scheme_penalty_charts');
    }
}
