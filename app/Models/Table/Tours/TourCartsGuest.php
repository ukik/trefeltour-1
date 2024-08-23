<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourCartsGuest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "tour_carts_guest";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }

    public $fillable = [
        'customer_id',
        'store_id',
        'product_id',
        'price_id',
        'name',
        'get_price',
        'get_price_child',
        'get_discount',
        'get_cashback',
        'get_total_amount',
        'get_total_amount_child',
        'quantity',
        'get_final_amount',
        'stock',
        'date_start',
        'participant_adult',
        'participant_young',
        'hotel',
        'code_table',
        'created_at',
        'updated_at',
        'deleted_at',


        // 'customer_id',
        // 'store_id',
        // 'product_id',
        // 'price_id',
        // 'quantity',
        // 'description',
        // 'code_table',

        // 'date_start',
        // 'participant_adult',
        // 'participant_young',
        // 'hotel',
    ];

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'customer_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'tour_carts', 'id', 'customer_id');
    }

    public function tourStore()
    {
        return $this->belongsTo(TourStores::class,'store_id','id');
    }

    public function tourStores()
    {
        return $this->belongsToMany(TourStores::class, 'tour_carts', 'id', 'store_id');
    }

    public function tourProduct()
    {
        return $this->belongsTo(TourProducts::class,'product_id','id');
    }

    public function tourProducts()
    {
        return $this->belongsToMany(TourProducts::class, 'tour_carts', 'id', 'product_id');
    }

    public function tourPrice()
    {
        return $this->belongsTo(TourPrices::class,'price_id','id');
    }

    public function tourPrices()
    {
        return $this->belongsToMany(TourPrices::class, 'tour_carts', 'id', 'price_id');
    }
}
