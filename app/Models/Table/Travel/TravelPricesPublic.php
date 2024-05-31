<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelPricesPublic extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "travel_prices_public";

    public function getCreatedAtAttribute($value) {
        return Carbon\Carbon::parse($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value) {
        return Carbon\Carbon::parse($value)->diffForHumans();
    }

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'customer_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'travel_prices', 'id', 'customer_id');
    }

    public function travelStore()
    {
        return $this->belongsTo(TravelStores::class,'store_id','id');
    }

    public function travelStores()
    {
        return $this->belongsToMany(TravelStores::class, 'travel_prices', 'id', 'store_id');
    }

    public function travelReservation()
    {
        return $this->belongsTo(TravelReservations::class,'reservation_id','id');
    }

    public function travelReservations()
    {
        return $this->belongsToMany(TravelReservations::class, 'travel_prices', 'id', 'reservation_id');
    }


    public function travelCart()
    {
        return $this->hasOne(TravelCarts::class, 'price_id', 'id');
    }

    public function travelCarts()
    {
        return $this->hasMany(TravelCarts::class, 'price_id', 'id');
    }


}
