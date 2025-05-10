<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransationHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('transation_histories')) {
            Schema::create('transation_histories', function (Blueprint $table) {
                $table->id();
                $table->string('type')->nullable();
                $table->string('user_type')->nullable();
                $table->string('user_id')->nullable();
                $table->string('member_id')->nullable();
                $table->enum('transation_type',['credit','debit'])->default('credit');
                $table->string('transation_date')->nullable();
                $table->string('description')->nullable();
                $table->string('payment_mode')->nullable();
                $table->string('bank_id')->nullable();
                $table->date('cheque_date')->nullable();
                $table->string('cheque_no')->nullable();
                $table->string('reference_no')->nullable();
                $table->string('bank_account_ledger_id')->nullable();
                $table->double('amount')->nullable();
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
        Schema::dropIfExists('transation_histories');
    }
}
