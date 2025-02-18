<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalLoanCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_loan_collections', function (Blueprint $table) {
            $table->id();
            $table->string('loan_id', 15);
            $table->string('agent_name', 255);
            $table->string('agent_id', 15);
            $table->string('customer_name', 255);
            $table->string('customer_mobile', 15);
            $table->decimal('amount', 15, 2);
            $table->decimal('late_fine', 15, 2);
            $table->enum('status', ['pending', 'collected'])->default('pending');
            $table->string('emi_payout', 100);
            $table->text('address');
            $table->dateTime('date_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_collections');
    }
}
