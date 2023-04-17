<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_intake_forms', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->integer('ein_number')->nullable();
            $table->integer('dun_bradstreet_number')->nullable();
            $table->string('auth_company_rep_name')->nullable();
           
            $table->string('company_phone')->nullable();
            $table->string('company_email')->nullable();
            $table->string('facility_name')->nullable();
            $table->string('facility_address')->nullable();
            $table->string('facility_phone')->nullable();
            $table->string('facility_fax')->nullable();
            $table->string('facility_website')->nullable();
            $table->string('corporate_billing_ocntact')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_fax')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('facility_billing_contact')->nullable();
            $table->string('facility_billing_address')->nullable();
            $table->string('facility_billing_phone')->nullable();
            $table->string('facility_billing_fax')->nullable();
            $table->string('facility_billing_email')->nullable();
            $table->string('director_nursing')->nullable();
            $table->string('nursing_phone')->nullable();
            $table->string('nursing_fax')->nullable();
            $table->string('nursing_email')->nullable();
            $table->string('facility_administrator')->nullable();
            $table->string('administrator_phone')->nullable();
            $table->string('administrator_fax')->nullable();
            $table->string('administrator_email')->nullable();
            $table->string('staffing_coordinator')->nullable();
            $table->string('coordinator_phone')->nullable();
            $table->string('coordinator_fax')->nullable();
            $table->string('coordinator_email')->nullable();
            $table->string('facility_type')->nullable();
            $table->string('nurse_ratio_per_floor')->nullable();
            $table->string('aide_ratio_per_floor')->nullable();
            $table->string('patient_ratio_per_floor')->nullable();
            $table->string('nac_first_shift')->nullable();
            $table->string('nac_second_shift')->nullable();
            $table->string('nac_third_shift')->nullable();
            $table->string('rn_first_shift')->nullable();
            $table->string('rn_second_shift')->nullable();
            $table->string('rn_third_shift')->nullable();
            $table->string('medical_treatement_shift')->nullable();
            $table->string('assisted_living_shift')->nullable();
            $table->string('charge_position_shift')->nullable();
            $table->text('comment_additional_info')->nullable();
            // $table->boolean('is_bankruptcy')->nullable();
            $table->enum('is_bankruptcy',['YES','NO'])->default('YES');

            // $table->boolean('is_corporate_change')->nullable();
            $table->enum('is_corporate_change',['YES','NO'])->default('YES');
            // $table->boolean('is_owner_change')->nullable();
            $table->enum('is_owner_change',['YES','NO'])->default('YES');

            // $table->boolean('is_fit_testing')->nullable();
            $table->enum('is_fit_testing',['YES','NO'])->default('YES');

            $table->text('disclosure_comment')->nullable();
            $table->string('ppe_mask_type')->nullable();
            $table->string('facility_operation_year')->nullable();    
            $table->string('how_you_hear')->nullable();    
              
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facility_intake_forms');
    }
};
