<?php

// namespace App\Models\Table;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TestimonialPageModel extends Model
{
    use Notifiable;
    use HasFactory;

    protected $hidden = [];

    protected $appends = ['emoticon'];

    protected $table = "page_testimonial";

    function getRatingAttribute($value)
    {
        return (int) $value;
    }

    function getEmoticonAttribute()
    {
        switch ($this->rating) {
            case "1":
            case 1:
                return "SAYA MERASA <b>BIASA</b> DENGAN LAYANAN LAGIA ENTERPRISE";
            case "2":
            case 2:
                return "SAYA MERASA <b>CUKUP PUAS</b> DENGAN LAYANAN LAGIA ENTERPRISE";
            case "3":
            case 3:
                return "SAYA MERASA <b>PUAS</b> DENGAN LAYANAN LAGIA ENTERPRISE";
            case "4":
            case 4:
                return "SAYA MERASA <b>SANGAT PUAS</b> DENGAN LAYANAN LAGIA ENTERPRISE";
            case "5":
            case 5:
                return "SAYA MERASA <b>CINTA</b> DENGAN LAYANAN LAGIA ENTERPRISE";
        }
    }
}
