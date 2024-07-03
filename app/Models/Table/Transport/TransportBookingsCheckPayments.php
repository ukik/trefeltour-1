<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportBookingsCheckPayments extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = "transport_bookings_check_payments";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'customer_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'transport_bookings_check_payments', 'id', 'customer_id');
    }

    public function transportBookingItems()
    {
        return $this->hasMany(TransportBookingsItems::class, 'booking_id', 'id');
    }

    public function transportBooking()
    {
        return $this->belongsTo(TransportBookings::class,'booking_id','id');
    }

    public function transportBookings()
    {
        return $this->belongsToMany(TransportBookings::class, 'transport_bookings_check_payments', 'id', 'booking_id');
    }

    public function transportVehicle()
    {
        return $this->belongsTo(TransportVehicles::class,'vehicle_id','id');
    }

    public function transportVehicles()
    {
        return $this->belongsToMany(TransportVehicles::class, 'transport_bookings_check_payments', 'id', 'vehicle_id');
    }


    public function transportRentals()
    {
        return $this->belongsToMany(TransportRentals::class, 'transport_bookings', 'id', 'rental_id');
    }

    public function transportRental()
    {
        return $this->belongsTo(TransportRentals::class,'rental_id','id');
    }

}
