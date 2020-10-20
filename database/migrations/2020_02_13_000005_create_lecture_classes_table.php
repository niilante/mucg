<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLectureClassesTable extends Migration
{
    public function up()
    {
        Schema::create(
            'lecture_classes',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('department_id')->unsigned()->index();
                $table->integer('capacity')->nullable();
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
        Schema::dropIfExists('lecture_classes');
    }
}
