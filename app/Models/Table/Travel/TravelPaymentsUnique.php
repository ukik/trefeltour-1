<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelPaymentsUnique extends Model
{
    use HasFactory;
    use SoftDeletes;

    // id
    // booking_id
    // customer_id
    // uuid
    // deleted_at

    protected $table = "travel_payments_unique";


    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'customer_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'travel_payments_unique', 'id', 'customer_id');
    }

    public function travelBooking()
    {
        return $this->belongsTo(TravelBookings::class,'booking_id','id');
    }

    public function travelBookings()
    {
        return $this->belongsToMany(TravelBookings::class, 'travel_payments_unique', 'id', 'booking_id');
    }
}
