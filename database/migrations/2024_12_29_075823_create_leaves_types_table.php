<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves_types', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('leave_type'); // Leave type column
            $table->boolean('status')->default(1); // Status column, default active
            $table->timestamps(); // Created at and Updated at
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves_types');
    }
}
