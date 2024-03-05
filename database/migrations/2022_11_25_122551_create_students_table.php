<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('agent_id');
            $table->string('title');
            $table->string('type');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('date_of_birth');
            $table->string('gender');
            $table->string('nationality');
            $table->string('passport_number');
            $table->string('email_address');
            $table->string('contact_number');
            $table->string('permanent_address_line_one');
            $table->string('permanent_address_line_two');
            $table->string('permanent_address_country');
            $table->string('permanent_address_state');
            $table->string('permanent_address_city');
            $table->string('permanent_address_pincode');
            $table->string('communication_address_line_one');
            $table->string('communication_address_line_two');
            $table->string('communication_address_country');
            $table->string('communication_address_state');
            $table->string('communication_address_city');
            $table->string('communication_address_pincode');
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_relationship')->nullable();
            $table->string('emergency_contact_number');
            $table->string('qualification1_course_title');
            $table->string('qualification1_course_level');
            $table->string('qualification1_course_duration');
            $table->string('qualification1_university_or_organisation');
            $table->string('qualification1_medium_of_education');
            $table->string('qualification1_grade');
            $table->string('qualification1_year_of_passing');
            $table->string('qualification2_course_title')->nullable();
            $table->string('qualification2_course_level')->nullable();
            $table->string('qualification2_course_duration')->nullable();
            $table->string('qualification2_university_or_organisation')->nullable();
            $table->string('qualification2_medium_of_education')->nullable();
            $table->string('qualification2_grade')->nullable();
            $table->string('qualification2_year_of_passing')->nullable();
            $table->string('test_name')->nullable();
            $table->string('over_all_socre')->nullable();
            $table->string('speaking')->nullable();
            $table->string('listening')->nullable();
            $table->string('reading')->nullable();
            $table->string('writing')->nullable();
            $table->string('english_level')->nullable();
            $table->string('job_title')->nullable();
            $table->string('company_name')->nullable();
            $table->string('years_of_experience')->nullable();
            $table->string('photograph');
            $table->string('passport');
            $table->string('address_proof');
            $table->string('qualifications');
            $table->string('work_experience')->nullable();
            $table->string('cv')->nullable();
            $table->string('personal_statement')->nullable();
            $table->string('any_other_supporting_documents')->nullable();
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
        Schema::dropIfExists('students');
    }
}
