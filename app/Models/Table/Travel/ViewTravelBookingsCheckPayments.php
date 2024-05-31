<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class ViewTravelBookingsCheckPayments extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "view_travel_bookings_check_payments";

    public function user()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'customer_id','id');
    }


}
