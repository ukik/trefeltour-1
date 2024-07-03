<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourismFacilities extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "tourism_facilities";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }


    public function tourismVenue()
    {
        return $this->belongsTo(TourismVenues::class,'venue_id','id');
    }

    public function tourismVenues()
    {
        return $this->belongsToMany(TourismVenues::class, 'tourism_facilities', 'id', 'venue_id');
    }


    public function rating()
    {
        return $this->hasOne(TourismFacilitiesRatings::class, 'facilities_id', 'id');
    }

    public function ratingAvg()
    {
        return $this->hasOne(TourismFacilitiesRatingsAvg::class, 'facilities_id', 'id');
    }
}
