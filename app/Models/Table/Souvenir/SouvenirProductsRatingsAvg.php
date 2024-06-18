<?php

// namespace App\Models\Table\Travel;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class SouvenirProductsRatingsAvg extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "souvenir_products_ratings_avg";

    public function getAvgRatingAttribute($value) {
        return (int) $value;
    }

    public function souvenirProduct()
    {
        return $this->belongsTo(SouvenirProducts::class,'product_id','id');
    }

    public function souvenirProducts()
    {
        return $this->belongsToMany(SouvenirProducts::class, 'souvenir_products_ratings', 'id', 'product_id');
    }
}
