<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelReservations extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'customer_id','id');
    }

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'customer_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'travel_reservations', 'id', 'customer_id');
        // return $this->belongsTo(BadasoUsersPublic::class,'customer_id','id');
    }


    public function travelPrice()
    {
        return $this->hasOne(TravelPrices::class, 'reservation_id', 'id');
    }

    public function travelPrices()
    {
        return $this->hasMany(TravelPrices::class, 'reservation_id', 'id');
    }

    // public function travelTicket()
    // {
    //     return $this->hasOne(TravelTickets::class, 'reservation_id', 'id');
    // }

}
