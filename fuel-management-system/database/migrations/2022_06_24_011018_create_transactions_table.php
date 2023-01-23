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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer');
            $table->unsignedBigInteger('pump');
            $table->unsignedBigInteger('fuel');
            $table->float('quantity');
            $table->unsignedFloat('amount');
            $table->timestamps();

            $table->foreign('customer')->references('id')->on('customers');
            $table->foreign('pump')->references('id')->on('pumps');
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
        Schema::dropIfExists('transactions');
    }
};
