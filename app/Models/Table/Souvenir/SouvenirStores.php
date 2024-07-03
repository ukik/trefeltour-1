<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class SouvenirStores extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "souvenir_stores";

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
        return $this->belongsToMany(BadasoUsersPublic::class, 'souvenir_stores', 'id', 'user_id');
    }

    public function souvenirBooking()
    {
        return $this->hasOne(SouvenirBookings::class, 'store_id', 'id');
    }

    public function souvenirBookings()
    {
        return $this->hasMany(SouvenirBookings::class, 'store_id', 'id');
    }

    public function souvenirProduct()
    {
        return $this->hasOne(SouvenirProducts::class, 'store_id', 'id');
    }

    public function souvenirProducts()
    {
        return $this->hasMany(SouvenirProducts::class, 'store_id', 'id');
    }

    public function souvenirPrice()
    {
        return $this->hasOne(SouvenirPrices::class, 'store_id', 'id');
    }

    public function souvenirPrices()
    {
        return $this->hasMany(SouvenirPrices::class, 'store_id', 'id');
    }



    public function rating()
    {
        return $this->hasOne(SouvenirStoresRatings::class, 'store_id', 'id');
    }

    public function ratingAvg()
    {
        return $this->hasOne(SouvenirStoresRatingsAvg::class, 'store_id', 'id');
    }
}
