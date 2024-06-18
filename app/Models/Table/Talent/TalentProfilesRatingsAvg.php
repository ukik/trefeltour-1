<?php

// namespace App\Models\Table\Travel;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TalentProfilesRatingsAvg extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "talent_profiles_ratings_avg";

    public function getAvgRatingAttribute($value) {
        return (int) $value;
    }

    public function tourismVenue()
    {
        return $this->belongsTo(TourismVenues::class,'profile_id','id');
    }

    public function tourismVenues()
    {
        return $this->belongsToMany(TourismVenues::class, 'talent_profiles_ratings', 'id', 'profile_id');
    }
}
