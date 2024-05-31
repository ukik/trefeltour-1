<?php

// namespace App\Models\Table;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class BadasoUsersPublic extends Model
{
    use Notifiable;
    use HasFactory;

    protected $table = "badaso_users_public";

    // public function __construct(array $attributes = array())
    // {
    //     parent::__construct($attributes);

    //     dd(request()->route()->getName());

    //     $this->hidden = [
    //         // 'id',
    //         // 'name',
    //         // 'username',
    //         'email',
    //         // 'additional_info',
    //         // 'gender',
    //         // 'avatar',
    //         'phone',
    //         'address',
    //         'email_verified_at',
    //         'password',
    //         'remember_token',
    //         'last_sent_token_at',
    //         // 'created_at',
    //         // 'updated_at',
    //     ];
    // }

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->diffForHumans();
        // return $value->diffForHumans();
    }

    public function getUpdatedAtAttribute($value) {
        return Carbon::parse($value)->diffForHumans();
        // return $value->diffForHumans();
    }

    public function userRole()
    {
        return $this->hasOne(BadasoUserRoles::class, 'user_id', 'id');
    }

    public function userRoles()
    {
        return $this->hasMany(BadasoUserRoles::class, 'user_id', 'id');
    }
}