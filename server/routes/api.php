<?php

use App\Http\Controllers\AircraftCompanyController;
use App\Http\Controllers\CodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VehicleTypeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Conctact
Route::post('/message',[ContactController::class, 'store']);


//Vehicle Types with Service Types
Route::get('/vehicle-type/service-type/{type}',[VehicleTypeController::class, 'indexByServiceType']);

//Price by Vehicle Types
Route::get('/vehicle-type/price/{vehicleTypeID}', [VehicleTypeController::class, 'getPriceByVehicleTypeID']);

//Aircraft Compaines
Route::get('/aircraft-company',[AircraftCompanyController::class,'index']);


//Index By Airport (Dalaman Airport)
Route::get('/start-airport',[ServiceController::class,'indexByAirport']);

//Get prices based on departure and arrival points
Route::post('/point-price',[ServiceController::class,'pointByPrice']);

//Reservations
Route::post('/reservation',        [ReservationController::class,'store']);
Route::put('/updateByReservation/{reservationNo}', [ReservationController::class,'updateByReservationNo']);
Route::get('/getByReservation/{reservartionNo}',[ReservationController::class,'getByReservationNo']);
Route::delete('/reservations/{reservationNo}',[ReservationController::class,'deleteReservation']);


//-c route generates 6-digit random code
Route::get('/generate-code',[CodeController::class,'generate']);
