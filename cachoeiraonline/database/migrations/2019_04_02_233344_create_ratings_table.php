<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ratings');
            $table->text('description');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('establishment_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('establishment_id')->references('id')->on('establishments');
        });
    }

    /**
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
