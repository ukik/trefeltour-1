<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourismFacilitiesRatings extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "tourism_facilities_ratings";

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
        return $this->belongsToMany(BadasoUsersPublic::class, 'tourism_facilities_ratings', 'id', 'user_id');
    }

    public function tourismFacility()
    {
        return $this->belongsTo(TourismFacilities::class,'facilities_id','id');
    }

    public function tourismFacilities()
    {
        return $this->belongsToMany(TourismFacilities::class, 'tourism_facilities_ratings', 'id', 'facilities_id');
    }
}
