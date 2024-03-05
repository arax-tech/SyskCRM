<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('recruitment_type')->nullable();
            $table->string('agent_company_name');
            $table->string('company_registration_number')->nullable();
            $table->string('year_of_establishment')->nullable();
            $table->string('company_type');
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('pincode');
            $table->string('website');
            $table->string('email');
            $table->string('contact_number');
            $table->string('company_registration_document_evidence')->nullable();
            $table->string('contact_first_name');
            $table->string('contact_last_name');
            $table->string('contact_gender');
            $table->string('contact_nationality');
            $table->string('contract_email_address');
            $table->string('contract_contact_number');
            $table->string('contact_identity_proof_front')->nullable();
            $table->string('contact_identity_proof_back')->nullable();
            $table->text('services_offered_to_students');
            $table->string('do_you_charge_students_for_any_of_the_services')->nullable();
            $table->string('provide_details')->nullable();
            $table->string('ref1_university_or_nstitution_name')->nullable();
            $table->string('ref1_country')->nullable();
            $table->string('ref1_contact_person')->nullable();
            $table->string('ref1_designation')->nullable();
            $table->string('ref1_email_address')->nullable();
            $table->string('ref1_contact_number')->nullable();
            $table->string('ref1_years_of_working_relation')->nullable();
            $table->string('ref2_university_or_nstitution_name')->nullable();
            $table->string('ref2_country')->nullable();
            $table->string('ref2_contact_person')->nullable();
            $table->string('ref2_designation')->nullable();
            $table->string('ref2_email_address')->nullable();
            $table->string('ref2_contact_number')->nullable();
            $table->string('ref2_years_of_working_relation')->nullable();
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
        Schema::dropIfExists('agents');
    }
}
