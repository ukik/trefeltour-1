<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class CulinaryProductsRatings extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "culinary_products_ratings";

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'user_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'culinary_products_ratings', 'id', 'user_id');
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
