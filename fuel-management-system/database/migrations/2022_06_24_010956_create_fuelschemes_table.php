<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuelschemes', function (Blueprint $table) {
            $table->id();
            $table->float('end_at');
            $table->float('price');
            $table->unsignedBigInteger('fuel');
            $table->timestamps();

            $table->foreign('fuel')->references('id')->on('fueltypes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fuelschemes');
    }
};
