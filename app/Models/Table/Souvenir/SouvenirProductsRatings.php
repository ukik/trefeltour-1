<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class SouvenirProductsRatings extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "souvenir_products_ratings";

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'user_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'souvenir_products_ratings', 'id', 'user_id');
    }

    public function souvenirProduct()
    {
        return $this->belongsTo(TourismVenues::class,'product_id','id');
    }

    public function souvenirProducts()
    {
        return $this->belongsToMany(TourismVenues::class, 'souvenir_products_ratings', 'id', 'product_id');
    }
}
