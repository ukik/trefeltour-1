<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourismVenues extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "tourism_venues";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function user()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'user_id','id');
    }

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'user_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'tourism_venues', 'id', 'user_id');
    }

    public function tourismPrices()
    {
        return $this->hasMany(TourismPrices::class, 'venue_id', 'id');
    }

    public function tourismPrice()
    {
        return $this->hasOne(TourismPrices::class, 'venue_id', 'id');
    }

    public function tourismFacilities()
    {
        return $this->hasMany(TourismFacilities::class, 'venue_id', 'id');
    }

    public function tourismFacility()
    {
        return $this->hasOne(TourismFacilities::class, 'venue_id', 'id');
    }

    public function tourismServices()
    {
        return $this->hasMany(TourismServices::class, 'venue_id', 'id');
    }

    public function tourismService()
    {
        return $this->hasOne(TourismServices::class, 'venue_id', 'id');
    }

    public function tourismBookings()
    {
        return $this->hasMany(TourismBookings::class, 'venue_id', 'id');
    }

    public function tourismBooking()
    {
        return $this->hasOne(TourismBookings::class, 'venue_id', 'id');
    }


    public function rating()
    {
        return $this->hasOne(TourismVenuesRatings::class, 'venue_id', 'id');
    }

    public function ratingAvg()
    {
        return $this->hasOne(TourismVenuesRatingsAvg::class, 'venue_id', 'id');
    }
}
