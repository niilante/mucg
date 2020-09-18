<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLectureHallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecture_halls', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('code', 10);
            $table->text('description');
            $table->integer('capacity');
            $table->integer('added_by_id')->unsigned()->index()->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecture_halls');
    }
}
