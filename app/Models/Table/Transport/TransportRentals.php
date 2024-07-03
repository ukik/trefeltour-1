<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportRentals extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "transport_rentals";

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

    public function transportBooking()
    {
        return $this->hasOne(TransportBookings::class, 'vehicle_id', 'id');
    }

    public function transportBookings()
    {
        return $this->hasMany(TransportBookings::class, 'vehicle_id', 'id');
    }

    public function transportVehicle()
    {
        return $this->hasOne(TransportVehicles::class, 'rental_id', 'id');
    }

    public function transportVehicles()
    {
        return $this->hasMany(TransportVehicles::class, 'rental_id', 'id');
    }


    public function transportPrice()
    {
        return $this->hasOne(TransportPrices::class, 'rental_id', 'id');
    }

    public function transportPrices()
    {
        return $this->hasMany(TransportPrices::class, 'rental_id', 'id');
    }



    public function rating()
    {
        return $this->hasOne(TransportRentalsRatings::class, 'rental_id', 'id');
    }

    public function ratingAvg()
    {
        return $this->hasOne(TransportRentalsRatingsAvg::class, 'rental_id', 'id');
    }
}
