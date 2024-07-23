<?php

// namespace App\Models\Table\Travel;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourProductsRatingsAvg extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "tour_products_ratings_avg";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getAvgRatingAttribute($value) {
        return (int) $value;
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
