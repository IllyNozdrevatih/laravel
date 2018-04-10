<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeclarationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('declarations',function (Blueprint $table){
            $table->increments('id');
            $table->integer('id_user')->unsigned()->default(1);
                $table->integer('id_doctor')->unsigned()->default(1);
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_doctor')->references('id')->on('users');
            $table->string('massage');
            $table->enum('status',['ожидание','отказ','принят'])
                ->default('ожидание');
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
        Schema::dropIfExists('doctors');
    }
}
