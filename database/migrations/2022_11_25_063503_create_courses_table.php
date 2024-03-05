<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->longtext('course_description');
            $table->string('campus_name');
            $table->string('tuition_fee');
            $table->string('commission_fee');
            $table->string('application_fee');
            $table->string('fee_and_commission_currency');
            $table->string('duration');
            $table->string('degree_type');
            $table->string('study_field');
            $table->string('study_type');
            $table->string('fees_per_year');
            $table->string('year');
            $table->string('status');
            $table->longtext('education_requirement');
            $table->string('test_name');
            $table->string('over_all_socre');
            $table->string('speaking');
            $table->string('listening');
            $table->string('reading');
            $table->string('writing');
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
        Schema::dropIfExists('courses');
    }
}
