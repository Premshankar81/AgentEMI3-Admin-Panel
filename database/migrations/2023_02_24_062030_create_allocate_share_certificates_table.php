<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllocateShareCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('allocate_share_certificates')) {
            Schema::create('allocate_share_certificates', function (Blueprint $table) {
                $table->id();
                $table->string('member_id')->nullable();
                $table->date('transfer_date')->nullable();
                $table->double('total_shares')->nullable();
                $table->double('share_nominal_value')->nullable();
                $table->double('total_shares_value')->nullable();
                $table->double('pay_mode')->nullable();
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
        Schema::dropIfExists('allocate_share_certificates');
    }
}
