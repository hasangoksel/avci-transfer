<?php

namespace App\Http\Controllers;

use App\Models\AircraftCompany;
use Illuminate\Http\Request;

class AircraftCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Hava yolu firmaları tablosundaki değerlerden yalnızca companyName olanları almak.
        $company = AircraftCompany::all()->pluck('companyName');
        if(!$company){
            return response()->json(['error'=>'Uçak Firması Bulunamadı!'], 404);
        }
        return response()->json($company);
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
    public function show(AircraftCompany $aircraftCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AircraftCompany $aircraftCompany)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AircraftCompany $aircraftCompany)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AircraftCompany $aircraftCompany)
    {
        //
    }
}
