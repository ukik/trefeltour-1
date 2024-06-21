<?php

// namespace App\Models\Table\Travel;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelStoresRatingsAvg extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "travel_store_ratings_avg";

    public function getAvgRatingAttribute($value) {
        return (int) $value;
    }

    // public function badasoUser()
    // {
    //     return $this->belongsTo(BadasoUsersPublic::class,'user_id','id');
    // }

    // public function badasoUsers()
    // {
    //     return $this->belongsToMany(BadasoUsersPublic::class, 'travel_store_ratings', 'id', 'user_id');
    // }

    public function travelStore()
    {
        return $this->belongsTo(TravelStores::class,'store_id','id');
    }

    public function travelStores()
    {
        return $this->belongsToMany(TravelStores::class, 'travel_store_ratings_avg', 'id', 'store_id');
    }
}