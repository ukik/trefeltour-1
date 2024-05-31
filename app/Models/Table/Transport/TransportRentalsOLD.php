<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportRentalsOLD extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'user_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'transport_rentals', 'id', 'user_id');
    }

    public function transportVehicles()
    {
        return $this->hasMany(TransportVehicles::class, 'rental_id', 'id');
    }

    public function transportVehicle()
    {
        return $this->hasOne(TransportVehicles::class, 'rental_id', 'id');
    }
}
