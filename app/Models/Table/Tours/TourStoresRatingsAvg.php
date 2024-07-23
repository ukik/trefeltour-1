<?php

// namespace App\Models\Table\Travel;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourStoresRatingsAvg extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "tour_stores_ratings_avg";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getAvgRatingAttribute($value) {
        return (int) $value;
    }

    public function tourStore()
    {
        return $this->belongsTo(SouvenirStores::class,'store_id','id');
    }

    public function tourStores()
    {
        return $this->belongsToMany(SouvenirStores::class, 'tour_stores_ratings', 'id', 'store_id');
    }
}
