<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanEmisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('loan_emis')) {
            Schema::create('loan_emis', function (Blueprint $table) {
                $table->id();
                $table->string('loan_id')->nullable();
                $table->date('emi_date')->nullable();
                $table->date('due_date')->nullable();
                $table->double('emi')->nullable();
                $table->double('principal')->nullable();
                $table->double('interest')->nullable();
                $table->double('outstanding')->nullable();
                $table->double('advance_amount')->nullable();
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
        Schema::dropIfExists('loan_emis');
    }
}
