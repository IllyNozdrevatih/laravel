<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name',100);
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('number');
            $table->string('address',255);
            $table->string('path_to_image',255);
            $table->string('role');
            $table->integer('id_doctors')
                ->unsigned()
                ->nullable('NULL');
            $table->foreign('id_doctors')->references('id')->on('users')
                ->unsigned()
                ->default(0);
            $table->time('start_working')->default('8:00:00');
            $table->time('finish_working')->default('17:00:00');
            $table->string('specialization')
                ->nullable('NULL');
            $table->mediumText('about_doctor')
                ->nullable('NULL');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
