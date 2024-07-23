<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourStores extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "tour_stores";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'user_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'tour_stores', 'id', 'user_id');
    }

    public function tourBooking()
    {
        return $this->hasOne(TourBookings::class, 'store_id', 'id');
    }

    public function tourBookings()
    {
        return $this->hasMany(TourBookings::class, 'store_id', 'id');
    }

    public function tourProduct()
    {
        return $this->hasOne(TourProducts::class, 'store_id', 'id');
    }

    public function tourProducts()
    {
        return $this->hasMany(TourProducts::class, 'store_id', 'id');
    }

    public function tourPrice()
    {
        return $this->hasOne(TourPrices::class, 'store_id', 'id');
    }

    public function tourPrices()
    {
        return $this->hasMany(TourPrices::class, 'store_id', 'id');
    }


    public function rating()
    {
        return $this->hasOne(TourStoresRatings::class, 'store_id', 'id');
    }

    public function ratingAvg()
    {
        return $this->hasOne(TourStoresRatingsAvg::class, 'store_id', 'id');
    }
}
