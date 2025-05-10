<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('business_loans')) {
            Schema::create('business_loans', function (Blueprint $table) {
                $table->id();
                $table->string('uuid')->nullable();
                $table->string('application_mo')->nullable();
                $table->string('application_unique')->nullable();
                $table->date('application_date')->nullable();
                $table->string('co_applicant_member_id')->nullable();
                $table->string('customer_id')->nullable();
                $table->string('scheme_id')->nullable();
                $table->string('agent_id')->nullable();
                $table->string('agent_change_log')->nullable();
                
                $table->string('collector_agent_id')->nullable();
                $table->string('collector_agent_change_log')->nullable();
                $table->string('available_balance')->nullable();
                $table->string('link_saving_account_id')->nullable();
                $table->string('nominee')->nullable();

                $table->string('security_type')->nullable();
                $table->string('reference_no')->nullable();
                $table->string('collection_charge')->nullable();
                $table->string('Collector_commission_rate')->nullable();
                $table->string('nature_of_business')->nullable();
                $table->string('purpose_of_loan')->nullable();
                $table->string('guaranter_first')->nullable();
                $table->string('guaranter_second')->nullable();
                $table->string('name_of_witness_first')->nullable();
                $table->string('name_of_witness_first_address')->nullable();
                $table->string('name_of_witness_second')->nullable();
                $table->string('name_of_witness_second_address')->nullable();
                
                $table->double('annual_interest_rate')->nullable();
                $table->string('emi_payout')->nullable();
                $table->double('tenure')->nullable();
                $table->string('loan_amount_requested')->nullable();
                $table->string('loan_amount')->nullable();
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
        Schema::dropIfExists('business_loans');
    }
}
