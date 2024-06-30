<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function indexByAirport()
    {
        //Tabloda başlangıç noktası seçtik ve ona göre varış noktalarını aldık.
       $startAirport = Service::where('startingPoint', 'Dalaman Havalimanı')->pluck('arrivalPoint');
        if ($startAirport->isEmpty()) {
            return response()->json(['error' => 'Başlangıç Noktası Hatalı!'], 404);
        }
        else{
            return response()->json(['startAirport' => $startAirport]);
        }
    }
    public function pointByPrice(Request $request)
    {
        //kalkış ve varış noktalarına göre yetişkin fiyatı aldık.
        $startingPoint = $request->input('startingPoint');
        $arrivalPoint = $request->input('arrivalPoint');
        $price = Service::where('startingPoint', $startingPoint)
                        ->where('arrivalPoint', $arrivalPoint)
                        ->pluck('adultFare');

        if($price->isEmpty()) {
            return response()->json(['error' => 'Hata!'], 404);
        } else {
            return response()->json(['price'=> $price]);
        }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
