<?php

// namespace App\Models\Table;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DestinationPageModel extends Model
{
    use Notifiable;
    use HasFactory;

    protected $hidden = [
    ];

    protected $table = "page_destination_data";

    function getRatingAttribute($value) {
        return (!$value) ? 0 : (double) $value;
    }

    function getCategoryAttribute($value) {
        $str = str_replace("]", "",$value);
        return $str = str_replace("[", "",$str);
        return $str = preg_replace("/[ [ ]/", '', $str);
        return $str = preg_replace("/[ \ ]/", '', $str);
        return $str = preg_replace("/[ [ ]/", '', $str);
        return preg_replace("/[^A-Za-z0-9 ]/", '', $value);
    }
}
