<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourPaymentsValidations extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "tour_payments_validations";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }


    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'validator_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'tour_payments_validations', 'id', 'validator_id');
    }

    public function tourPayment()
    {
        return $this->belongsTo(TourPayments::class,'payment_id','id');
    }

    public function tourPayments()
    {
        return $this->belongsToMany(TourPayments::class, 'tour_payments_validations', 'id', 'payment_id');
    }
}
