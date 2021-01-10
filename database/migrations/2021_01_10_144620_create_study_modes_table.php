<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyModesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_modes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 32);
            $table->string('description', 64);
            $table->string('code', 8);
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
        Schema::dropIfExists('study_modes');
    }
}
