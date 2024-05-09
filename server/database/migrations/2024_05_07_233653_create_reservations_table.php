<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('reservationID');
            $table->string('reservationNo');
            $table->string('nameSurname');
            $table->string('mail');
            $table->string('phone');
            $table->boolean('isAdult');
            $table->bigInteger('vehicleTypeID');
            $table->datetime('dateTime');
            $table->bigInteger('servicesID');
            $table->boolean('contractConfirmation');
            $table->string('flightNumber');
            $table->time('landingTime');
            $table->bigInteger('companyID');
            $table->string('pickUpAdress');
            $table->boolean('reservationConfirmation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
