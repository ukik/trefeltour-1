<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportPrices extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "transport_prices";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function customer()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'customer_id','id');
    }

    public function transportRental()
    {
        return $this->belongsTo(TransportRentals::class,'rental_id','id');
    }

    public function transportRentals()
    {
        return $this->belongsToMany(TransportRentals::class, 'transport_prices', 'id', 'rental_id');
    }

    public function transportVehicle()
    {
        return $this->belongsTo(TransportVehicles::class,'vehicle_id','id');
    }

    public function transportVehicles()
    {
        return $this->belongsToMany(TransportVehicles::class, 'transport_prices', 'id', 'vehicle_id');
    }


    public function transportCart()
    {
        return $this->hasOne(TransportCarts::class, 'price_id', 'id');
    }

    public function transportCarts()
    {
        return $this->hasMany(TransportCarts::class, 'price_id', 'id');
    }
}
