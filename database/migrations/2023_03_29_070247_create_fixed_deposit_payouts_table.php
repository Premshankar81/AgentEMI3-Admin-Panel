<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedDepositPayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('fixed_deposit_payouts')) {
            Schema::create('fixed_deposit_payouts', function (Blueprint $table) {
                $table->id();
                $table->string('fix_deposit_id')->nullable();
                $table->date('due_date')->nullable();
                $table->date('to_date')->nullable();
                $table->double('interest')->nullable();
                $table->double('maturity_amount')->nullable();
                $table->double('amount')->nullable();
                $table->date('payment_date')->nullable();
                $table->integer('created_by')->nullable();
                $table->enum('status',['pending','paid'])->default('pending');
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
        Schema::dropIfExists('fixed_deposit_payouts');
    }
}
