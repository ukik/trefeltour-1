<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class CulinaryPaymentsUnique extends Model
{
    use HasFactory;
    use SoftDeletes;

    // id
    // booking_id
    // customer_id
    // uuid
    // deleted_at

    protected $table = "culinary_payments_unique";


    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'customer_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'culinary_payments_unique', 'id', 'customer_id');
    }

    public function culinaryBooking()
    {
        return $this->belongsTo(CulinaryBookings::class,'booking_id','id');
    }

    public function culinaryBookings()
    {
        return $this->belongsToMany(CulinaryBookings::class, 'culinary_payments_unique', 'id', 'booking_id');
    }
}
