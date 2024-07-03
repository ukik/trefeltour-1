<?php

// namespace App\Models\Table\Travel;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportRentalsRatingsAvg extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "transport_rentals_ratings_avg";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getAvgRatingAttribute($value) {
        return (int) $value;
    }

    public function travelRental()
    {
        return $this->belongsTo(TransportRentals::class,'rental_id','id');
    }

    public function travelRentals()
    {
        return $this->belongsToMany(TransportRentals::class, 'transport_rentals_ratings_avg', 'id', 'rental_id');
    }
}
