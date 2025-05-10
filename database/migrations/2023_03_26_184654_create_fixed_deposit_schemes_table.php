<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedDepositSchemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('fixed_deposit_schemes')) {
            Schema::create('fixed_deposit_schemes', function (Blueprint $table) {
                $table->id();
                
                $table->string('unique_code')->nullable();
                $table->string('scheme_code')->nullable();
                $table->string('name')->nullable();
                $table->string('min_fd_amount')->nullable();
                $table->string('max_fd_amount')->nullable();
                $table->string('fd_frequency')->nullable();
                $table->string('interest_compounding')->nullable();
                $table->string('interest_rate')->nullable();
                $table->string('fd_tenure')->nullable();
                $table->string('cancellation_charge')->nullable();
                $table->string('cancellation_charge_value')->nullable();
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
        Schema::dropIfExists('fixed_deposit_schemes');
    }
}
