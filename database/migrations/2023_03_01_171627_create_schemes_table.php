<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('schemes')) {
            Schema::create('schemes', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable();
                $table->string('uuid')->nullable();
                $table->string('scheme_code')->nullable();
                $table->string('interest_payout')->nullable();
                $table->double('interest_rate')->nullable();
                $table->double('minimum_balance')->nullable();
                $table->double('collector_commission')->nullable();
                $table->double('daily_neft_limit')->nullable();
                $table->double('scan_pay_limit')->nullable();
                $table->string('remarks')->nullable();
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
        Schema::dropIfExists('schemes');
    }
}
