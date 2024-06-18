<?php

// namespace App\Models\Table\Travel;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourismFacilitiesRatingsAvg extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "tourism_facilities_ratings_avg";

    public function getAvgRatingAttribute($value) {
        return (int) $value;
    }

    public function tourismVenue()
    {
        return $this->belongsTo(TourismFacilities::class,'facilities_id','id');
    }

    public function tourismVenues()
    {
        return $this->belongsToMany(TourismFacilities::class, 'tourism_facilities_ratings', 'id', 'facilities_id');
    }
}
