<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class LodgeRooms extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "lodge_rooms";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }


    public function lodgeProfile()
    {
        return $this->belongsTo(LodgeProfiles::class,'profile_id','id');
    }

    public function lodgeProfiles()
    {
        return $this->belongsToMany(LodgeProfiles::class, 'lodge_rooms', 'id', 'profile_id');
    }

    public function lodgePrice()
    {
        return $this->hasOne(LodgePrices::class, 'room_id', 'id');
    }

    public function lodgePrices()
    {
        return $this->hasMany(LodgePrices::class, 'room_id', 'id');
    }

    public function rating()
    {
        return $this->hasOne(LodgeRoomsRatings::class, 'room_id', 'id');
    }

    public function ratingAvg()
    {
        return $this->hasOne(LodgeRoomsRatingsAvg::class, 'room_id', 'id');
    }
}
