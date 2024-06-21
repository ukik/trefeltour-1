<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class CulinaryStoresRatings extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "culinary_stores_ratings";

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'user_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'culinary_stores_ratings', 'id', 'user_id');
    }

    public function culinaryStore()
    {
        return $this->belongsTo(CulinaryStores::class,'store_id','id');
    }

    public function culinaryStores()
    {
        return $this->belongsToMany(CulinaryStores::class, 'culinary_stores_ratings', 'id', 'store_id');
    }
}
