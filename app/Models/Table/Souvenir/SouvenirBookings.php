<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class SouvenirBookings extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "souvenir_bookings";

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
        return $this->belongsToMany(BadasoUsersPublic::class, 'souvenir_bookings', 'id', 'customer_id');
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
