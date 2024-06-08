<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportVehiclesRatings extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "transport_vehicles_ratings";

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'user_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'transport_vehicles_ratings', 'id', 'user_id');
    }

    public function travelVehicle()
    {
        return $this->belongsTo(TransportVehicles::class,'vehicle_id','id');
    }

    public function travelVehicles()
    {
        return $this->belongsToMany(TransportVehicles::class, 'transport_vehicles_ratings', 'id', 'vehicle_id');
    }
}
