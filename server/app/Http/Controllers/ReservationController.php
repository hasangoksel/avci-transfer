<?php

namespace App\Http\Controllers;

use App\Models\AircraftCompany;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\VehicleType;

use function Laravel\Prompts\error;

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
        //Front'ta belirtilen key'leri kendi değişkenlerimize atıyoruz. 
        $aircraftCompany = $request->input('aircraftCompany');
        $arrivalPoint = $request->input('arrivalPoint');
        $departurePoint = $request->input('departurePoint');
        $flightNumber = $request->input('flightNumber');
        $flightTime = $request->input('flightTime');
        $price = $request->input('price');
        $reservConfirm = $request->input('reservConfirm');

        //Datetime'dan gelen değeri sql'e kaydetmek için formatını değiştiriyoruz.
        $selectedDateTime = $request->input('selectedDateTime');
        $selectedDateTime = str_replace('T', ' ', $selectedDateTime).":00";

        $travellers = $request->input('travellers');
        $vehicle = $request->input('vehicle');
    
        //Veri tabanında bulunan sütunlar ile front'ta belirtilenler arasında ilişki kurup servicesID'ye göre alma işlemi.
        $servicesID = Service::where('startingPoint', $departurePoint)
            ->where('arrivalPoint', $arrivalPoint)
            ->pluck('servicesID')
            ->first();
        
        //Veri tabanında bulunan sütun ile front'ta belirtilen arasında ilişki kurup vehicleTypeID'ye göre alma işlemi.
        $vehicleID = VehicleType::where('type', $vehicle)
            ->pluck('vehicleTypeID')
            ->first();
    
        //Veri tabanında bulunan sütun ile front'ta belirtilen arasında ilişki kurup companyID'ye göre alma işlemi.
        $companyID = AircraftCompany::where('companyName', $aircraftCompany)
            ->pluck('companyID')
            ->first();
            
            //ReservationNo belirlemek için travellers'a girilen ad soyad değerindeki ilk 2 harfi alıp yanına 7 haneli random sayı üretiyoruz.
            $first_two_letters = strtoupper(substr($travellers[0]['nameSurname'], 0, 2));
            $last_four_digits = sprintf("%07d", rand(0, 9999999));
            $reservationNo = $first_two_letters.$last_four_digits;

        //Kontroller ve veri tabanına kayıt işlemleri.
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
        //Geri dönüş işlemleri.
        return response()->json(['success' => 'Rezervasyon başarıyla kaydedildi!'], 200);
    }
    public function deleteReservation($reservationNo)
    {
        // Belirtilen rezervasyon numarasına sahip tüm rezervasyonları sil
        $deletedRows = Reservation::where('reservationNo', $reservationNo)->delete();
    
        // Eğer silinen bir kayıt yoksa veya belirtilen rezervasyon numarasına sahip hiçbir rezervasyon yoksa hata döndür
        if ($deletedRows == 0) {
            return response()->json(['error' => 'Belirtilen rezervasyon bulunamadı.'], 404);
        }
    
        return response()->json(['success' => 'Rezervasyonlar başarıyla silindi!'], 200);
    }
    public function getByReservationNo($reservationNo)
    {
        $reservations = Reservation::where('reservationNo',$reservationNo)->get();
        if($reservations->isEmpty())
        {
            return response()->json(['error'=> 'Belirtilen rezervasyon bulunamadı!'],404);
        }
        $responseData = [];
        foreach($reservations as $reservation)
        {
            $vehicleType = VehicleType::find($reservation->vehicleTypeID);
            $services = Service::find($reservation->servicesID);
            $company = AircraftCompany::find($reservation->companyID);

            $responseData[] = [
                'reservationNo' => $reservation->reservationNo,
                'nameSurname' => $reservation->nameSurname,
                'mail' => $reservation->mail,
                'phone' => $reservation->phone,
                'isAdult' => $reservation->isAdult,
                'type' => $vehicleType->type,
                'service_type' => $vehicleType->service_type,
                'dateTime' => $reservation->dateTime,
                'startingPoint' => $services->startingPoint,
                'arrivalPoint' => $services->arrivalPoint,
                'flightNumber' => $reservation->flightNumber,
                'landingTime' => $reservation->landingTime,
                'companyName' => $company->companyName,
                'pickUpAdress' => $reservation->pickUpAdress,
                'totalPrice' => $reservation->totalPrice,
            ];
        }
        return response()->json(['success'=> 'Rezervasyon başarıyla bulundu!','data' => $responseData],200);
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
