<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgerTpyesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('ledger_tpyes')) {
            Schema::create('ledger_tpyes', function (Blueprint $table) {
                $table->id();
                $table->string('title')->nullable();
                $table->string('slug')->nullable();
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
        Schema::dropIfExists('ledger_tpyes');
    }
}
