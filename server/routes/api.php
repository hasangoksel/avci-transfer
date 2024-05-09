<?php

use App\Http\Controllers\AircraftCompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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


Route::post('/message',[ContactController::class, 'store']);

//Araçların paylaşımlı ya da özel olup olmadığını döndürür
Route::get('/vehicle-type/service-type/{type}',[VehicleTypeController::class, 'indexByServiceType']);
//Uçak firmalarını döndürür.
Route::get('/aircraft-company',[AircraftCompanyController::class,'index']);
//Dalaman havalimanına göre varış noktalarıı döndürür.
Route::get('/start-airport',[ServiceController::class,'indexByAirport']);
Route::post('/point-price',[ServiceController::class,'pointByPrice']);
