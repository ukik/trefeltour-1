<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class SouvenirBookingsCheckPayments extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "souvenir_bookings_check_payments";

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'customer_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'souvenir_bookings_check_payments', 'id', 'customer_id');
    }

    public function souvenirBookingItems()
    {
        return $this->hasMany(SouvenirBookingsItems::class, 'booking_id', 'id');
    }


    public function souvenirBooking()
    {
        return $this->belongsTo(SouvenirBookings::class,'booking_id','id');
    }

    public function souvenirBookings()
    {
        return $this->belongsToMany(SouvenirBookings::class, 'souvenir_bookings_check_payments', 'id', 'booking_id');
    }

    public function souvenirStore()
    {
        return $this->belongsTo(SouvenirStores::class,'store_id','id');
    }

    public function souvenirStores()
    {
        return $this->belongsToMany(SouvenirStores::class, 'souvenir_bookings_check_payments', 'id', 'store_id');
    }
}
