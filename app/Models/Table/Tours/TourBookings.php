<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourBookings extends Model
{
    use HasFactory;
    use SoftDeletes;

    // id
    // customer_id
    // store_id
    // uuid
    // description
    // get_final_amount
    // code_table
    // created_at
    // updated_at
    // deleted_at

    protected $table = "tour_bookings";

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
        return $this->belongsToMany(BadasoUsersPublic::class, 'tour_bookings', 'id', 'customer_id');
    }


    public function tourStore()
    {
        return $this->belongsTo(TourStores::class,'store_id','id');
    }

    public function tourStores()
    {
        return $this->belongsToMany(TourStores::class, 'tour_bookings', 'id', 'store_id');
    }

    public function tourBookingItem()
    {
        return $this->hasOne(TourBookingsItems::class, 'booking_id', 'id');
    }

    public function tourBookingItems()
    {
        return $this->hasMany(TourBookingsItems::class, 'booking_id', 'id');
    }

    public function tourPayment()
    {
        return $this->hasOne(TourPayments::class, 'booking_id', 'id');
    }

    public function tourPayments()
    {
        return $this->hasMany(TourPayments::class, 'booking_id', 'id');
    }
}
