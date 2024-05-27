<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsers;
use Illuminate\Database\Eloquent\SoftDeletes;

class SouvenirCarts extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "souvenir_carts";

    public $fillable = [
        'customer_id',
        'store_id',
        'product_id',
        'price_id',
        'quantity',
        'description',
        'code_table',
    ];

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsers::class,'customer_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsers::class, 'souvenir_carts', 'id', 'customer_id');
    }

    public function souvenirStore()
    {
        return $this->belongsTo(SouvenirStores::class,'store_id','id');
    }

    public function souvenirStores()
    {
        return $this->belongsToMany(SouvenirStores::class, 'souvenir_carts', 'id', 'store_id');
    }

    public function souvenirProduct()
    {
        return $this->belongsTo(SouvenirProducts::class,'product_id','id');
    }

    public function souvenirProducts()
    {
        return $this->belongsToMany(SouvenirProducts::class, 'souvenir_carts', 'id', 'product_id');
    }

    public function souvenirPrice()
    {
        return $this->belongsTo(SouvenirPrices::class,'price_id','id');
    }

    public function souvenirPrices()
    {
        return $this->belongsToMany(SouvenirPrices::class, 'souvenir_carts', 'id', 'price_id');
    }
}
