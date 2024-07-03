<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportVehicles extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "transport_vehicles";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'user_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'transport_rentals', 'id', 'user_id');
    }

    public function transportRentals()
    {
        return $this->belongsToMany(TransportRentals::class, 'transport_vehicles', 'id', 'rental_id');
    }

    public function transportRental()
    {
        return $this->belongsTo(TransportRentals::class,'rental_id','id');
    }

    public function transportBookings()
    {
        return $this->hasMany(TransportBookings::class, 'vehicle_id', 'id');
    }

    public function transportBooking()
    {
        return $this->hasOne(TransportBookings::class, 'vehicle_id', 'id');
    }

    public function transportMaintenances()
    {
        return $this->hasMany(TransportMaintenances::class, 'vehicle_id', 'id');
    }

    public function transportMaintenance()
    {
        return $this->hasOne(TransportMaintenances::class, 'vehicle_id', 'id');
    }


    public function transportPrice()
    {
        return $this->hasOne(TransportPrices::class, 'vehicle_id', 'id');
    }

    public function transportPrices()
    {
        return $this->hasMany(TransportPrices::class, 'vehicle_id', 'id');
    }


    public function rating()
    {
        return $this->hasOne(TransportVehiclesRatings::class, 'vehicle_id', 'id');
    }

    public function ratingAvg()
    {
        return $this->hasOne(TransportVehiclesRatingsAvg::class, 'vehicle_id', 'id');
    }
}
