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

    public function talentProfile()
    {
        return $this->belongsTo(TalentProfiles::class,'profile_id','id');
    }

    public function talentProfiles()
    {
        return $this->belongsToMany(TalentProfiles::class, 'talent_profiles_ratings', 'id', 'profile_id');
    }    
}
