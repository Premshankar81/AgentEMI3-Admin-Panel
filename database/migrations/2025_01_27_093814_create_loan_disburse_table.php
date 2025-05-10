<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanDisburseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_disburse', function (Blueprint $table) {
            $table->id('id'); // Primary Key
            $table->string('loan_id')->unique(); // Loan ID
            $table->string('agent_name'); // Agent Name
            $table->string('agent_id'); // Agent ID
            $table->string('customer_name'); // Customer Name
            $table->string('customer_mobile'); // Customer Mobile
            $table->decimal('principal_amount', 15, 2); // Principal Amount
            $table->decimal('disbursed_amount', 15, 2); // Disbursed Amount
            $table->float('interest_rate', 8, 2); // Interest Rate
            $table->decimal('outstanding_balance', 15, 2); // Outstanding Balance
            $table->decimal('installment_amount', 15, 2); // Installment Amount
            $table->decimal('extra_amount', 15, 2); // Installment Amount
            $table->decimal('repayment_terms',5,0); // Repayment Terms
            $table->date('next_due_date'); // Next Due Date
            $table->text('customer_address'); // Customer Address
            $table->date('start_date'); // Start Date
            $table->date('end_date'); // End Date
            $table->string('emi_payout'); // EMI Payout
            $table->enum('delete_status', ['0', '1'])->default('0');
            $table->unsignedBigInteger('created_by');  
            $table->timestamps(); // Created_at and Updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_disburse');
    }
}
