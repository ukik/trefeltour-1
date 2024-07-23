<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourProductsRatings extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "tour_products_ratings";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'user_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'tour_products_ratings', 'id', 'user_id');
    }

    public function tourProduct()
    {
        return $this->belongsTo(TourProducts::class,'product_id','id');
    }

    public function tourProducts()
    {
        return $this->belongsToMany(TourProducts::class, 'tour_products_ratings', 'id', 'product_id');
    }
}
