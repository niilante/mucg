<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    public function up()
    {
        Schema::create(
            'lessons',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('code')->unique();
                $table->integer('study_mode_id');
                $table->string('title')->nullable();
                $table->text('description')->nullable();
                $table->integer('department_id')->unsigned()->nullable();
                $table->integer('lecturer_id')->unsigned()->nullable();
                $table->integer('lesson_status_id')->unsigned()->nullable();
                $table->integer('class_id')->unsigned()->nullable();
                $table->integer('duration');
                // $table->time('start_time')->nullable();
                // $table->time('end_time')->nullable();
                $table->timestamps();
                $table->softDeletes();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
