<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    public function up()
    {
        Schema::create(
            'lessons', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('weekday');
                $table->string('title');
                $table->string('description');
                $table->string('weekname');
                $table->time('start_time');
                $table->time('end_time');
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
