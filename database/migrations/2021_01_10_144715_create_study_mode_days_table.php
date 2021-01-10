<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyModeDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_mode_days', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 32);
            $table->integer('week_day_id')->unsigned()->index()->nullable();
            $table->integer('study_mode_id')->unsigned()->index()->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('is_active');
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
        Schema::dropIfExists('study_mode_days');
    }
}
