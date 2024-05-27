<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsers;
use Illuminate\Database\Eloquent\SoftDeletes;

class LodgeCarts extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = "lodge_carts";

    public $fillable = [
        'customer_id',
        'profile_id',
        'room_id',
        'price_id',
        'date_checkin',
        'quantity',
        'description',
        'code_table',
    ];

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsers::class,'customer_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsers::class, 'lodge_carts', 'id', 'customer_id');
    }

    public function lodgeProfile()
    {
        return $this->belongsTo(LodgeProfiles::class,'profile_id','id');
    }

    public function lodgeProfiles()
    {
        return $this->belongsToMany(LodgeProfiles::class, 'lodge_carts', 'id', 'profile_id');
    }

    public function lodgeRoom()
    {
        return $this->belongsTo(LodgeRooms::class,'room_id','id');
    }

    public function lodgeRooms()
    {
        return $this->belongsToMany(LodgeRooms::class, 'lodge_carts', 'id', 'room_id');
    }

    public function lodgePrice()
    {
        return $this->belongsTo(LodgePrices::class,'price_id','id');
    }

    public function lodgePrices()
    {
        return $this->belongsToMany(LodgePrices::class, 'lodge_carts', 'id', 'price_id');
    }
}
