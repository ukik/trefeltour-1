<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportCarts extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "transport_carts";

    public $fillable = [
        'customer_id',
        'rental_id',
        'vehicle_id',
        'price_id',
        'date_checkin',
        'quantity',
        'description',
        'code_table',
    ];

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'customer_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'transport_carts', 'id', 'customer_id');
    }

    public function transportRental()
    {
        return $this->belongsTo(TransportRentals::class,'rental_id','id');
    }

    public function transportRentals()
    {
        return $this->belongsToMany(TransportRentals::class, 'transport_carts', 'id', 'rental_id');
    }

    public function transportVehicle()
    {
        return $this->belongsTo(TransportVehicles::class,'vehicle_id','id');
    }

    public function transportVehicles()
    {
        return $this->belongsToMany(TransportVehicles::class, 'transport_carts', 'id', 'vehicle_id');
    }

    public function transportPrice()
    {
        return $this->belongsTo(TransportPrices::class,'price_id','id');
    }

    public function transportPrices()
    {
        return $this->belongsToMany(TransportPrices::class, 'transport_carts', 'id', 'price_id');
    }
}
