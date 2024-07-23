<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourBookingsCheckPayments extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "tour_bookings_check_payments";

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
        return $this->belongsToMany(BadasoUsersPublic::class, 'tour_bookings_check_payments', 'id', 'customer_id');
    }

    public function tourBookingItems()
    {
        return $this->hasMany(TourBookingsItems::class, 'booking_id', 'id');
    }

    public function tourBooking()
    {
        return $this->belongsTo(TourBookings::class,'booking_id','id');
    }

    public function tourBookings()
    {
        return $this->belongsToMany(TourBookings::class, 'tour_bookings_check_payments', 'id', 'booking_id');
    }

    public function tourStore()
    {
        return $this->belongsTo(TourStores::class,'store_id','id');
    }

    public function tourStores()
    {
        return $this->belongsToMany(TourStores::class, 'tour_bookings_check_payments', 'id', 'store_id');
    }
}
