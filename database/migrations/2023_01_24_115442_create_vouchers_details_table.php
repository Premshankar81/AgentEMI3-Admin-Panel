<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('vouchers_details')) {
            Schema::create('vouchers_details', function (Blueprint $table) {
                $table->id();
                $table->string('voucher_id')->nullable();
                $table->enum('transaction_type',['debit','credit'])->default('debit');
                $table->string('ledger_account_id')->nullable();
                $table->string('ledger_account_close_balance')->nullable();
                $table->string('ledger_account_amount')->nullable();
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
        Schema::dropIfExists('vouchers_details');
    }
}
