<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourismCarts extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "tourism_carts";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }

    public $fillable = [
        'customer_id',
        'venue_id',
        'price_id',
        'quantity',
        'description',
        'code_table',
    ];

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'customer_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'tourism_carts', 'id', 'customer_id');
    }

    public function tourismVenue()
    {
        return $this->belongsTo(TourismVenues::class,'venue_id','id');
    }

    public function tourismVenues()
    {
        return $this->belongsToMany(TourismVenues::class, 'tourism_carts', 'id', 'venue_id');
    }

    public function tourismPrice()
    {
        return $this->belongsTo(TourismPrices::class,'price_id','id');
    }

    public function tourismPrices()
    {
        return $this->belongsToMany(TourismPrices::class, 'tourism_carts', 'id', 'price_id');
    }
}
