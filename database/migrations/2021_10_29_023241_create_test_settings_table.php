<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('level_id');
            $table->integer('faculty_id');
            $table->integer('class_id');
            $table->integer('section_id');
            $table->integer('test_id');
            $table->integer('subject_id');
            $table->string('pass_mark');
            $table->string('full_mark');
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
        Schema::dropIfExists('test_settings');
    }
}
