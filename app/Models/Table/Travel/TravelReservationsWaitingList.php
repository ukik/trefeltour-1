<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelReservationsWaitingList extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "travel_reservations_waiting_list";

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
    }

}
