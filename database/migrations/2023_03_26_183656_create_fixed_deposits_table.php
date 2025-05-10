<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedDepositsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('fixed_deposits')) {
            Schema::create('fixed_deposits', function (Blueprint $table) {
                $table->id();
                $table->string('uuid')->nullable();
                $table->string('application_mo')->nullable();
                $table->string('application_unique')->nullable();
                $table->date('application_date')->nullable();
                $table->string('joint_customer_id')->nullable();
                $table->string('customer_id')->nullable();
                $table->string('scheme_id')->nullable();
                $table->string('agent_id')->nullable();
                $table->string('maturity_instruction')->nullable();
                $table->string('maturity_amount')->nullable();
                $table->date('maturity_date')->nullable();

                $table->string('collector_agent_id')->nullable();
                $table->string('collector_agent_change_log')->nullable();
                $table->string('available_balance')->nullable();
                $table->string('link_saving_account_id')->nullable();
                $table->string('nominee')->nullable();
                
                
                $table->double('fd_amount')->nullable();
                $table->double('annual_interest_rate')->nullable();
                $table->string('fd_frequency')->nullable();
                $table->double('fd_tenure')->nullable();
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
        Schema::dropIfExists('fixed_deposits');
    }
}
