<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourPaymentsUnique extends Model
{
    use HasFactory;
    use SoftDeletes;

    // id
    // booking_id
    // customer_id
    // uuid
    // deleted_at

    protected $table = "tour_payments_unique";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }


    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'customer_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'tour_payments_unique', 'id', 'customer_id');
    }

    public function tourBooking()
    {
        return $this->belongsTo(TourBookings::class,'booking_id','id');
    }

    public function tourBookings()
    {
        return $this->belongsToMany(TourBookings::class, 'tour_payments_unique', 'id', 'booking_id');
    }
}
