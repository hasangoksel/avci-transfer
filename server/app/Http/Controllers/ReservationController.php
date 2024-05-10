<?php

namespace App\Http\Controllers;

use App\Models\AircraftCompany;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\VehicleType;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $aircraftCompany = $request->input('aircraftCompany');
        $arrivalPoint = $request->input('arrivalPoint');
        $departurePoint = $request->input('departurePoint');
        $flightNumber = $request->input('flightNumber');
        $flightTime = $request->input('flightTime');
        $price = $request->input('price');
        $reservConfirm = $request->input('reservConfirm');

        $selectedDateTime = $request->input('selectedDateTime');
        $selectedDateTime = str_replace('T', ' ', $selectedDateTime).":00";

        $travellers = $request->input('travellers');
        $vehicle = $request->input('vehicle');
    
        $servicesID = Service::where('startingPoint', $departurePoint)
            ->where('arrivalPoint', $arrivalPoint)
            ->pluck('servicesID')
            ->first();
    
        $vehicleID = VehicleType::where('type', $vehicle)
            ->pluck('vehicleTypeID')
            ->first();
    
        $companyID = AircraftCompany::where('companyName', $aircraftCompany)
            ->pluck('companyID')
            ->first();
            
            $first_two_letters = strtoupper(substr($travellers[0]['nameSurname'], 0, 2));
            $last_four_digits = sprintf("%07d", rand(0, 9999999));
            $reservationNo = $first_two_letters.$last_four_digits;


        foreach ($travellers as $index => $traveller) { 
            $newReservation = new Reservation();
            $newReservation->reservationNo = $reservationNo;
            $newReservation->nameSurname = $traveller['nameSurname'];
            $newReservation->mail = $traveller['email'];
            $newReservation->phone = $traveller['tel'];
            $newReservation->isAdult = $traveller['age'] == 'adult';
            $newReservation->pickUpAdress = $index == 0 ? $traveller['address'] : null;
            $newReservation->vehicleTypeID = $vehicleID;
            $newReservation->servicesID = $servicesID;
            $newReservation->contractConfirmation = true;
            $newReservation->flightNumber = $flightNumber;
            $newReservation->landingTime = $flightTime;
            $newReservation->companyID = $companyID;
            $newReservation->reservationConfirmation = $reservConfirm;
            $newReservation->totalPrice = $price;
            $newReservation->dateTime = $selectedDateTime;
            $newReservation->save();
        }
    
        return response()->json(['success' => 'Rezervasyon başarıyla kaydedildi!'], 200);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
