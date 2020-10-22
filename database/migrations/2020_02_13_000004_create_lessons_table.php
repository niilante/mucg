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
                $table->integer('weekday')->nullable();
                $table->string('title');
                $table->text('description');
                $table->integer('department_id')->unsigned()->index();
                $table->integer('lecture_hall_id')->unsigned()->nullable();
                $table->string('weekname')->nullable();
                $table->time('start_time')->nullable();
                $table->time('end_time')->nullable();
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
