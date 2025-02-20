<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_statuses', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 64);
            $table->string('code', 64)->unique();
            $table->text('description');
            $table->boolean('is_active')->default(1);
            $table->integer('added_by_id')->unsigned()->index()->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('lesson_statuses');
    }
}
