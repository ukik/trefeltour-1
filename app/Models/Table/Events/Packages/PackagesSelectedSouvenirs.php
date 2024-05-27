<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsers;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackagesSelectedSouvenirs extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "event_package_selected_souvenirs";
}
