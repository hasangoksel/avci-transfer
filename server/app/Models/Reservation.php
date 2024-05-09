<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Service;
use App\Models\VehicleType;
use App\Models\AircraftCompany;

class Reservation extends Model
{
    use HasFactory;
    /**
     * Get the user associated with the Reservation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function services(): HasOne
    {
        return $this->hasOne(Service::class, 'servicesID', 'servicesID');
    }

    /**
     * Get the user associated with the Reservation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vehicleType(): HasOne
    {
        return $this->hasOne(VehicleType::class, 'vehicleTypeID', 'vehicleTypeID');
    }

    /**
     * Get the user associated with the Reservation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company(): HasOne
    {
        return $this->hasOne(AircraftCompany::class, 'companyID', 'companyID');
    }
}
