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
            $table->integer('roll_no');
            $table->string('student_name');
            $table->string('gender');
            $table->integer('level_id');
            $table->integer('faculty_id');
            $table->integer('class_id');
            $table->integer('section_id');
            $table->integer('emergency_number');
            $table->string('address');
            $table->string('nationality');
            $table->string('father_name');
            $table->integer('father_number')->nullable();
            $table->string('father_email')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_education')->nullable();
            $table->string('mother_name');
            $table->string('mother_number')->nullable();
            $table->string('mother_email')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_education')->nullable();
            $table->string('admission_date');
            $table->string('last_school');
            $table->string('previous_class_percentage');
            $table->string('guardian_name');
            $table->string('guardian_number');
            $table->string('guardian_email');
            $table->string('guardian_education');
            $table->string('guardian_relation');
            $table->string('passport_number');
            $table->string('place_issue');
            $table->string('issue_date');
            $table->string('vissa_category');
            $table->string('birth_certificate');
            $table->string('photo');
            $table->string('disability');
            $table->string('special_instruction');
            $table->string('distinct_behaviour');
            $table->string('disease');
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
