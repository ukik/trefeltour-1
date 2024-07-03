<?php

// namespace App\Models\Table\Travel;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportVehiclesRatingsAvg extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "transport_vehicles_ratings_avg";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getAvgRatingAttribute($value) {
        return (int) $value;
    }

    public function travelVehicle()
    {
        return $this->belongsTo(TransportVehicles::class,'vehicle_id','id');
    }

    public function travelVehicles()
    {
        return $this->belongsToMany(TransportVehicles::class, 'transport_vehicles_ratings_avg', 'id', 'vehicle_id');
    }
}
