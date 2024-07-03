<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportDriversRatings extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "transport_drivers_ratings";

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
        return $this->belongsToMany(BadasoUsersPublic::class, 'transport_drivers_ratings', 'id', 'user_id');
    }

    public function travelRental()
    {
        return $this->belongsTo(TransportDrivers::class,'driver_id','id');
    }

    public function travelRentals()
    {
        return $this->belongsToMany(TransportDrivers::class, 'transport_drivers_ratings', 'id', 'driver_id');
    }
}
