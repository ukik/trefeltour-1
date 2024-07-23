<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourStoresRatings extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "tour_stores_ratings";

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
        return $this->belongsToMany(BadasoUsersPublic::class, 'tour_stores_ratings', 'id', 'user_id');
    }

    public function tourStore()
    {
        return $this->belongsTo(TourStores::class,'store_id','id');
    }

    public function tourStores()
    {
        return $this->belongsToMany(TourStores::class, 'tour_stores_ratings', 'id', 'store_id');
    }
}
