<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignDeportmentClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_deportment_classes', function (Blueprint $table) {
            $table->id();
            $table->integer('level_id');
            $table->integer('faculty_id');
            $table->integer('class_id');
            $table->integer('term_id');
            $table->integer('deportment_id');
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
        Schema::dropIfExists('assign_deportment_classes');
    }
}
