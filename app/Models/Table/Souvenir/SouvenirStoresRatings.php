<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class SouvenirStoresRatings extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "souvenir_stores_ratings";

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'user_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'souvenir_stores_ratings', 'id', 'user_id');
    }

    public function souvenirStore()
    {
        return $this->belongsTo(SouvenirStores::class,'store_id','id');
    }

    public function souvenirStores()
    {
        return $this->belongsToMany(SouvenirStores::class, 'souvenir_stores_ratings', 'id', 'store_id');
    }
}
