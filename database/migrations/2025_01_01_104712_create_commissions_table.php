<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateCommissionsTable extends Migration
{
    public function up()
     {
        if (!Schema::hasTable('commissions')) {
            Schema::create('commissions', function (Blueprint $table) {
                $table->id('commission_id'); // Primary key
                $table->foreignId('employees_id')->constrained('employees')->onDelete('cascade'); // Foreign key to employees table
                $table->decimal('commission_amount', 8, 2); // Commission earned
                $table->timestamps(); // Created and updated timestamps
            });
        }
       
    }

    public function down()
    {
        Schema::dropIfExists('commissions');
    }
}
