<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_remarks', function (Blueprint $table) {
            $table->id();
            $table->integer('term_id');
            $table->integer('level_id');
            $table->integer('faculty_id');
            $table->integer('class_id');
            $table->integer('section_id');
            $table->integer('student_id');
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
        Schema::dropIfExists('term_remarks');
    }
}
