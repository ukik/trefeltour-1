<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class SouvenirProducts extends Model
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

    protected $table = "souvenir_products";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function souvenirStore()
    {
        return $this->belongsTo(SouvenirStores::class,'store_id','id');
    }

    public function souvenirStores()
    {
        return $this->belongsToMany(SouvenirStores::class, 'souvenir_products', 'id', 'store_id');
    }

    public function souvenirPrice()
    {
        return $this->hasOne(SouvenirPrices::class, 'product_id', 'id');
    }

    public function souvenirPrices()
    {
        return $this->hasMany(SouvenirPrices::class, 'product_id', 'id');
    }

    public function rating()
    {
        return $this->hasOne(SouvenirProductsRatings::class, 'product_id', 'id');
    }

    public function ratingAvg()
    {
        return $this->hasOne(SouvenirProductsRatingsAvg::class, 'product_id', 'id');
    }
}
