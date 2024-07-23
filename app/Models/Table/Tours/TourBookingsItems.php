<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourBookingsItems extends Model
{
    use HasFactory;
    use SoftDeletes;

    // id
    // uuid
    // store_id
    // booking_id
    // product_id
    // name
    // get_price
    // get_discount
    // get_cashback
    // get_total_amount
    // quantity
    // get_final_amount
    // description
    // code_table
    // created_at
    // updated_at
    // deleted_at

    protected $table = "tour_booking_items";

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
        return $this->belongsToMany(BadasoUsersPublic::class, 'tour_booking_items', 'id', 'customer_id');
    }

    public function tourBooking()
    {
        return $this->belongsTo(TourBookings::class,'booking_id','id');
    }

    public function tourBookings()
    {
        return $this->belongsToMany(TourBookings::class, 'tour_booking_items', 'id', 'booking_id');
    }

    public function tourStore()
    {
        return $this->belongsTo(TourStores::class,'store_id','id');
    }

    public function tourStores()
    {
        return $this->belongsToMany(TourStores::class, 'tour_booking_items', 'id', 'store_id');
    }


    public function tourProduct()
    {
        return $this->belongsTo(TourProducts::class,'product_id','id');
    }

    public function tourProducts()
    {
        return $this->belongsToMany(TourProducts::class, 'tour_booking_items', 'id', 'product_id');
    }

}
