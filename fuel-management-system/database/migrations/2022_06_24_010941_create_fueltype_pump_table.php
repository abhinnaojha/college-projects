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
        Schema::create('fueltype_pump', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fuel');
            $table->unsignedBigInteger('pump');
            $table->timestamps();

            $table->foreign('fuel')->references('id')->on('fueltypes');
            $table->foreign('pump')->references('id')->on('pumps');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fueltype_pump');
    }
};
