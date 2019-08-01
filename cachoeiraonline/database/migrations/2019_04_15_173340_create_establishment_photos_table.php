<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstablishmentPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establishment_photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('establishments_id')->unsigned();
            $table->string('photo');
            $table->timestamps();

            $table->foreign('establishments_id')->references('id')->on('establishments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('establishment_photos');
    }
}
