<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TalentProfilesRatings extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "talent_profiles_ratings";

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'user_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'talent_profiles_ratings', 'id', 'user_id');
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
