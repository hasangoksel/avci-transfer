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
            $table->foreignId('vehicleTypeID');
            $table->datetime('dateTime');
            $table->foreignId('servicesID');
            $table->boolean('contractConfirmation');
            $table->string('flightNumber');
            $table->time('landingTime');
            $table->foreignId('companyID');
            $table->string('pickUpAdress');
            $table->boolean('reservationConfirmation');
            $table->decimal('totalPrice',10,2);
            $table->timestamps();

            //Foreign Key tanımlama
            $table->foreign('vehicleTypeID')->references('vehicleTypeID')->on('vehicle_types');
            $table->foreign('servicesID')->references('servicesID')->on('services');
            $table->foreign('companyID')->references('companyID')->on('aircraft_companies');

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
