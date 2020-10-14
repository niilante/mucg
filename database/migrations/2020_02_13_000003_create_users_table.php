<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create(
            'users',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('uname');
                $table->string('fname');
                $table->string('mname')->nullable();
                $table->string('lname');
                $table->integer('gender_id')->unsigned()->index();
                $table->string('dob')->nullable();
                $table->string('phone', 13)->nullable();
                $table->integer('added_by_id')->unsigned()->index();
                $table->integer('department_id')->unsigned()->index();
                // $table->integer('class_id')->nullable();
                $table->text('bio')->nullable();
                $table->string('img_url', 256)->default('public/assets/img/users/user.png');
                $table->string('email')->unique();
                $table->datetime('email_verified_at')->nullable();
                $table->string('password');
                $table->string('remember_token')->nullable();
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
        Schema::dropIfExists('users');
    }
}
