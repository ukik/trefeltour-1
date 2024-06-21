<?php

// namespace App\Models\Table\Travel;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class LodgeRoomsRatingsAvg extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "lodge_rooms_ratings_avg";

    public function getAvgRatingAttribute($value) {
        return (int) $value;
    }

    public function lodgeRoom()
    {
        return $this->belongsTo(LodgeRooms::class,'room_id','id');
    }

    public function lodgeRooms()
    {
        return $this->belongsToMany(LodgeRooms::class, 'lodge_rooms_ratings', 'id', 'room_id');
    }
}
