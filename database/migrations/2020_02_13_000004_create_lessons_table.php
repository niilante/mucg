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
                $table->integer('weekday_id')->nullable();
                $table->string('title')->nullable();
                $table->text('description')->nullable();
                $table->integer('department_id')->unsigned()->nullable();
                $table->integer('lecture_hall_id')->unsigned()->nullable();
                $table->string('session_week_day_id')->nullable();
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
