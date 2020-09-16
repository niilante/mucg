<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLessonsTable extends Migration
{
    public function up()
    {
        Schema::table(
            'lessons', function (Blueprint $table) {
                $table->unsignedInteger('lecturer_id');
                $table->foreign('lecturer_id', 'lecturer_fk_1001496')->references('id')->on('users');
                $table->unsignedInteger('class_id');
                $table->foreign('class_id', 'class_fk_1001508')->references('id')->on('lecture_classes');
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
