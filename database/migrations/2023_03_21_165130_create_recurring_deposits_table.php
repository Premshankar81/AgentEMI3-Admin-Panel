<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecurringDepositsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('recurring_deposits')) {
            Schema::create('recurring_deposits', function (Blueprint $table) {
                $table->id();
                $table->string('uuid')->nullable();
                $table->string('application_mo')->nullable();
                $table->string('application_unique')->nullable();
                $table->date('application_date')->nullable();
                $table->string('joint_customer_id')->nullable();
                $table->string('customer_id')->nullable();
                $table->string('scheme_id')->nullable();
                $table->string('agent_id')->nullable();
                $table->double('rd_amount')->nullable();
                $table->double('rd_frequency')->nullable();
                $table->double('rd_tenure')->nullable();
                $table->string('transaction_amount')->nullable();
                $table->string('minor_id')->nullable();
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
        Schema::dropIfExists('recurring_deposits');
    }
}
