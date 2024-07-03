<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportDrivers extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "transport_drivers";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function user()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'user_id','id');
    }

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'user_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'transport_drivers', 'id', 'user_id');
    }

    public function transportReturns()
    {
        return $this->hasMany(TransportReturns::class, 'driver_id', 'id');
    }

    public function transportReturn()
    {
        return $this->hasOne(TransportReturns::class, 'driver_id', 'id');
    }


    public function transportBookings()
    {
        return $this->hasMany(TransportBookings::class, 'driver_id', 'id');
    }

    public function transportBooking()
    {
        return $this->hasOne(TransportBookings::class, 'driver_id', 'id');
    }


    public function transportPayment()
    {
        return $this->hasMany(TransportPayments::class, 'driver_id', 'id');
    }

    public function transportPayments()
    {
        return $this->hasOne(TransportPayments::class, 'driver_id', 'id');
    }


    public function rating()
    {
        return $this->hasOne(TransportDriversRatings::class, 'driver_id', 'id');
    }

    public function ratingAvg()
    {
        return $this->hasOne(TransportDriversRatingsAvg::class, 'driver_id', 'id');
    }
}
