<?php

// namespace App\Models\Table\Travel;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class CulinaryProductsRatingsAvg extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "culinary_products_ratings_avg";

    public function getAvgRatingAttribute($value) {
        return (int) $value;
    }

    public function culinaryProduct()
    {
        return $this->belongsTo(CulinaryProducts::class,'product_id','id');
    }

    public function culinaryProducts()
    {
        return $this->belongsToMany(CulinaryProducts::class, 'culinary_products_ratings', 'id', 'product_id');
    }
}
