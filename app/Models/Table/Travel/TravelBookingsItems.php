<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelBookingsItems extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = "travel_booking_items";


    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'customer_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'travel_booking_items', 'id', 'customer_id');
    }

    public function travelBooking()
    {
        return $this->belongsTo(TravelBookings::class,'booking_id','id');
    }

    public function travelBookings()
    {
        return $this->belongsToMany(TravelBookings::class, 'travel_booking_items', 'id', 'booking_id');
    }

    public function travelStore()
    {
        return $this->belongsTo(TravelStores::class,'store_id','id');
    }

    public function travelStores()
    {
        return $this->belongsToMany(TravelStores::class, 'travel_booking_items', 'id', 'store_id');
    }


    public function travelReservation()
    {
        return $this->belongsTo(TravelReservations::class,'reservation_id','id');
    }

    public function travelReservations()
    {
        return $this->belongsToMany(TravelReservations::class, 'travel_booking_items', 'id', 'reservation_id');
    }

}
