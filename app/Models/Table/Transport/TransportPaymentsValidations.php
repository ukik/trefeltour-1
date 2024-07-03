<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsersPublic;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportPaymentsValidations extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "transport_payments_validations";

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
        return $this->belongsToMany(BadasoUsersPublic::class, 'transport_payments_validations', 'id', 'validator_id');
    }

    public function transportPayment()
    {
        return $this->belongsTo(TransportPayments::class,'payment_id','id');
    }

    public function transportPayments()
    {
        return $this->belongsToMany(TransportPayments::class, 'transport_payments_validations', 'id', 'payment_id');
    }
}
