<?php

// namespace App\Models\Table\Travel;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class LodgeProfilesRatingsAvg extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "lodge_profiles_ratings_avg";

    public function getAvgRatingAttribute($value) {
        return (int) $value;
    }

    public function lodgeProfile()
    {
        return $this->belongsTo(LodgeProfiles::class,'profile_id','id');
    }

    public function lodgeProfiles()
    {
        return $this->belongsToMany(LodgeProfiles::class, 'lodge_profiles_ratings', 'id', 'profile_id');
    }
}
