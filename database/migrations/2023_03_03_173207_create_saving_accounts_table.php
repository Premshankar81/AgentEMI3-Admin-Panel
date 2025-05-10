<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavingAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('saving_accounts')) {
            Schema::create('saving_accounts', function (Blueprint $table) {
                $table->id();
                $table->string('uuid')->nullable();
                $table->string('application_mo')->nullable();
                $table->string('application_unique')->nullable();
                $table->date('application_date')->nullable();
                $table->string('joint_customer_id')->nullable();
                $table->string('customer_id')->nullable();
                $table->string('scheme_id')->nullable();
                $table->string('agent_id')->nullable();
                $table->double('opening_amount')->nullable();
                $table->double('available_balance')->nullable();
                $table->double('nominee')->nullable();
                
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
        Schema::dropIfExists('saving_accounts');
    }
}
