<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsers;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourismBookingsItems extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "tourism_booking_items";

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsers::class,'customer_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsers::class, 'tourism_booking_items', 'id', 'customer_id');
    }

    public function tourismBooking()
    {
        return $this->belongsTo(TourismBookings::class,'booking_id','id');
    }

    public function tourismBookings()
    {
        return $this->belongsToMany(TourismBookings::class, 'tourism_booking_items', 'id', 'booking_id');
    }

    public function tourismVenue()
    {
        return $this->belongsTo(TourismVenues::class,'venue_id','id');
    }

    public function tourismVenues()
    {
        return $this->belongsToMany(TourismVenues::class, 'tourism_booking_items', 'id', 'venue_id');
    }

}
