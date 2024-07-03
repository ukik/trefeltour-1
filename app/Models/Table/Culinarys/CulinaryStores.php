<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class CulinaryStores extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "culinary_stores";

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
        return $this->belongsToMany(BadasoUsersPublic::class, 'culinary_stores', 'id', 'user_id');
    }

    public function culinaryBooking()
    {
        return $this->hasOne(CulinaryBookings::class, 'store_id', 'id');
    }

    public function culinaryBookings()
    {
        return $this->hasMany(CulinaryBookings::class, 'store_id', 'id');
    }

    public function culinaryProduct()
    {
        return $this->hasOne(CulinaryProducts::class, 'store_id', 'id');
    }

    public function culinaryProducts()
    {
        return $this->hasMany(CulinaryProducts::class, 'store_id', 'id');
    }

    public function culinaryPrice()
    {
        return $this->hasOne(CulinaryPrices::class, 'store_id', 'id');
    }

    public function culinaryPrices()
    {
        return $this->hasMany(CulinaryPrices::class, 'store_id', 'id');
    }


    public function rating()
    {
        return $this->hasOne(CulinaryStoresRatings::class, 'store_id', 'id');
    }

    public function ratingAvg()
    {
        return $this->hasOne(CulinaryStoresRatingsAvg::class, 'store_id', 'id');
    }
}
