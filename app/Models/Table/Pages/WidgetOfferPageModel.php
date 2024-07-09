<?php

// namespace App\Models\Table;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WidgetOfferPageModel extends Model
{
    use Notifiable;
    use HasFactory;

    protected $hidden = [
    ];

    protected $table = "page_widget_offer";
}
