<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignSubjectClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_subject_classes', function (Blueprint $table) {
            $table->id();
            $table->integer('level_id');
            $table->integer('faculty_id');
            $table->integer('class_id');
            $table->integer('subject_id');
            $table->string('assign_subject');
            $table->string('grading_criteria');
            $table->string('sorting_order');
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
        Schema::dropIfExists('assign_subject_classes');
    }
}
