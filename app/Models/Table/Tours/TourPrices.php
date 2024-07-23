<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourPrices extends Model
{
    use HasFactory;
    use SoftDeletes;

    // id
    // uuid
    // store_id
    // product_id
    // name
    // general_price
    // discount_price
    // cashback_price
    // description
    // code_table
    // created_at
    // updated_at
    // deleted_at

    protected $table = "tour_prices";

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

    public function tourStore()
    {
        return $this->belongsTo(TourStores::class,'store_id','id');
    }

    public function tourStores()
    {
        return $this->belongsToMany(TourStores::class, 'tour_prices', 'id', 'store_id');
    }

    public function tourProduct()
    {
        return $this->belongsTo(TourProducts::class,'product_id','id');
    }

    public function tourProducts()
    {
        return $this->belongsToMany(TourProducts::class, 'tour_prices', 'id', 'product_id');
    }

    public function tourCart()
    {
        return $this->hasOne(TourCarts::class, 'price_id', 'id');
    }

    public function tourCarts()
    {
        return $this->hasMany(TourCarts::class, 'price_id', 'id');
    }

}
