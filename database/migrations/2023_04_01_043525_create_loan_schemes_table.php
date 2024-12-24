<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanSchemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('loan_schemes')) {
            Schema::create('loan_schemes', function (Blueprint $table) {
                $table->id();
                $table->string('unique_code')->nullable();
                $table->string('scheme_code')->nullable();
                $table->string('name')->nullable();
                $table->string('min_rd_amount')->nullable();
                $table->string('rd_frequency')->nullable();
                $table->string('interest_compounding')->nullable();
                $table->string('interest_rate')->nullable();
                $table->string('rd_tenure')->nullable();
                $table->string('cancellation_charge')->nullable();
                $table->string('collection_charge')->nullable();
                $table->string('Collector_commission_rate')->nullable();
                $table->string('remarks')->nullable();
                $table->string('penalty_type')->nullable();
                $table->string('slug')->nullable();
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
        Schema::dropIfExists('loan_schemes');
    }
}
