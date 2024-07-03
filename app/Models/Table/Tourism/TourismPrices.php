<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourismPrices extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "tourism_prices";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function customer()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'customer_id','id');
    }

    public function tourismVenue()
    {
        return $this->belongsTo(TourismVenues::class,'venue_id','id');
    }

    public function tourismVenues()
    {
        return $this->belongsToMany(TourismVenues::class, 'tourism_prices', 'id', 'venue_id');
    }

    public function tourismCart()
    {
        return $this->hasOne(TourismCarts::class, 'price_id', 'id');
    }

    public function tourismCarts()
    {
        return $this->hasMany(TourismCarts::class, 'price_id', 'id');
    }
}
