<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashbookTable extends Migration
{
    public function up()
    {
        Schema::create('cashbook', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->date('date');  // Transaction date
            $table->string('description');  // Description of the transaction
            $table->string('transaction_type');  // Type of transaction
            $table->decimal('debit_amount', 10, 2)->nullable();  // Debit amount
            $table->decimal('credit_amount', 10, 2)->nullable();  // Credit amount
            $table->decimal('balance', 10, 2);  
            $table->enum('delete_status', ['0', '1'])->default('0');
            $table->unsignedBigInteger('created_by');  
            $table->timestamps();  
        });
    }

    public function down()
    {
        Schema::dropIfExists('cashbook');
    }
}
