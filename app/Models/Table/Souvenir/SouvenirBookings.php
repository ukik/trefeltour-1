<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsers;
use Illuminate\Database\Eloquent\SoftDeletes;

class SouvenirBookings extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "souvenir_bookings";


    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsers::class,'customer_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsers::class, 'souvenir_bookings', 'id', 'customer_id');
    }


    public function souvenirStore()
    {
        return $this->belongsTo(SouvenirStores::class,'store_id','id');
    }

    public function souvenirStores()
    {
        return $this->belongsToMany(SouvenirStores::class, 'souvenir_bookings', 'id', 'store_id');
    }

    public function souvenirBookingItem()
    {
        return $this->hasOne(SouvenirBookingsItems::class, 'booking_id', 'id');
    }

    public function souvenirBookingItems()
    {
        return $this->hasMany(SouvenirBookingsItems::class, 'booking_id', 'id');
    }

    public function souvenirPayment()
    {
        return $this->hasOne(SouvenirPayments::class, 'booking_id', 'id');
    }

    public function souvenirPayments()
    {
        return $this->hasMany(SouvenirPayments::class, 'booking_id', 'id');
    }

}
