<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportRentalsRatings extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "transport_rentals_ratings";

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'user_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'transport_rentals_ratings', 'id', 'user_id');
    }

    public function travelRental()
    {
        return $this->belongsTo(TransportRentals::class,'rental_id','id');
    }

    public function travelRentals()
    {
        return $this->belongsToMany(TransportRentals::class, 'transport_rentals_ratings', 'id', 'rental_id');
    }
}
