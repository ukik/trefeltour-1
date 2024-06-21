<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class LodgeRoomsQuotaSum extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "lodge_rooms_quota_sum";
}
