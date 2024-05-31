<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportWorkshops extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'user_id','id');
    }

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'user_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'transport_workshops', 'id', 'user_id');
    }


    public function transportMaintenances()
    {
        return $this->hasMany(TransportMaintenances::class, 'workshop_id', 'id');
    }

    public function transportMaintenance()
    {
        return $this->hasOne(TransportMaintenances::class, 'workshop_id', 'id');
    }

}
