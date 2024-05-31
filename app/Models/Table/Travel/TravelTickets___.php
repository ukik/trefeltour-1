<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelTickets___ extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'customer_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'travel_tickets', 'id', 'customer_id');
    }

    public function travelReservations()
    {
        return $this->belongsToMany(TravelReservations::class, 'travel_tickets', 'id', 'reservation_id');
    }

    public function travelBooking()
    {
        return $this->hasOne(TravelBookings::class, 'ticket_id', 'id');
    }

    public function travelPayment()
    {
        return $this->hasOne(TravelPayments::class, 'ticket_id', 'id');
    }

    public function travelReservation()
    {
        return $this->belongsTo(TravelReservations::class,'reservation_id','id');
    }


}
