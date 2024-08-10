<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourProducts extends Model
{
    use HasFactory;
    use SoftDeletes;

    // id
    // uuid
    // store_id
    // name
    // category
    // others
    // stock
    // description
    // is_available
    // image
    // code_table
    // created_at
    // updated_at
    // deleted_at

    protected $casts = [
        'level' => 'integer',
    ];

    protected $table = "tour_products";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function tourStore()
    {
        return $this->belongsTo(TourStores::class,'store_id','id');
    }

    public function tourStores()
    {
        return $this->belongsToMany(TourStores::class, 'tour_products', 'id', 'store_id');
    }

    public function tourPrice()
    {
        return $this->hasOne(TourPrices::class, 'product_id', 'id');
    }

    public function tourPrices()
    {
        return $this->hasMany(TourPrices::class, 'product_id', 'id');
    }


    public function rating()
    {
        return $this->hasOne(TourProductsRatings::class, 'product_id', 'id');
    }

    public function ratingAvg()
    {
        return $this->hasOne(TourProductsRatingsAvg::class, 'product_id', 'id');
    }
}
