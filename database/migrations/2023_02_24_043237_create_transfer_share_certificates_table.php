<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferShareCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('transfer_share_certificates')) {
            Schema::create('transfer_share_certificates', function (Blueprint $table) {
                $table->id();
                $table->string('member_id')->nullable();
                $table->date('transfer_date')->nullable();
                $table->double('no_of_share')->nullable();
                $table->double('face_value')->nullable();
                $table->double('total_consideration')->nullable();
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
        Schema::dropIfExists('transfer_share_certificates');
    }
}
