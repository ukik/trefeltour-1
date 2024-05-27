<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsers;
use Illuminate\Database\Eloquent\SoftDeletes;

class CulinaryBookingsCheckPayments extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "culinary_bookings_check_payments";

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsers::class,'customer_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsers::class, 'culinary_bookings_check_payments', 'id', 'customer_id');
    }

    public function culinaryBookingItems()
    {
        return $this->hasMany(CulinaryBookingsItems::class, 'booking_id', 'id');
    }

    public function culinaryBooking()
    {
        return $this->belongsTo(CulinaryBookings::class,'booking_id','id');
    }

    public function culinaryBookings()
    {
        return $this->belongsToMany(CulinaryBookings::class, 'culinary_bookings_check_payments', 'id', 'booking_id');
    }

    public function culinaryStore()
    {
        return $this->belongsTo(CulinaryStores::class,'store_id','id');
    }

    public function culinaryStores()
    {
        return $this->belongsToMany(CulinaryStores::class, 'culinary_bookings_check_payments', 'id', 'store_id');
    }
}
