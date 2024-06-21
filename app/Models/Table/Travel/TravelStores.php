<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelStores extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "travel_stores";

    public function getCreatedAtAttribute($value) {
        return Carbon\Carbon::parse($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value) {
        return Carbon\Carbon::parse($value)->diffForHumans();
    }

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'user_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'travel_stores', 'id', 'user_id');
    }


    public function travelBooking()
    {
        return $this->hasOne(TravelBookings::class, 'store_id', 'id');
    }

    public function travelBookings()
    {
        return $this->hasMany(TravelBookings::class, 'store_id', 'id');
    }

    public function travelPrice()
    {
        return $this->hasOne(TravelPrices::class, 'store_id', 'id');
    }

    public function travelPrices()
    {
        return $this->hasMany(TravelPrices::class, 'store_id', 'id');
    }

    public function travelPricePublic()
    {
        return $this->hasOne(TravelPricesPublic::class, 'store_id', 'id');
    }

    public function travelPricePublics()
    {
        return $this->hasMany(TravelPricesPublic::class, 'store_id', 'id');
    }

    public function travelRating()
    {
        return $this->hasOne(TravelStoresRatings::class, 'store_id', 'id');
    }

    public function travelRatingAvg()
    {
        return $this->hasOne(TravelStoresRatingsAvg::class, 'store_id', 'id');
    }

    // public function travelTicket()
    // {
    //     return $this->hasOne(TravelTickets::class, 'store_id', 'id');
    // }

    // public function travelTickets()
    // {
    //     return $this->hasMany(TravelTickets::class, 'store_id', 'id');
    // }

    public function rating()
    {
        return $this->hasOne(TravelStoresRatings::class, 'store_id', 'id');
    }

    public function ratingAvg()
    {
        return $this->hasOne(TravelStoresRatingsAvg::class, 'store_id', 'id');
    }

}
