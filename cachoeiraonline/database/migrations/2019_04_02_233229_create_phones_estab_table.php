<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesEstabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones_estab', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->integer('establishments_id')->unsigned();
            $table->foreign('establishments_id')->references('id')->on('establishments');
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
        Schema::dropIfExists('phones_estab');
    }
}
