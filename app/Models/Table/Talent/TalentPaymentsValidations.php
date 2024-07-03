<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class TalentPaymentsValidations extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "talent_payments_validations";

    public function getCreatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function getUpdatedAtAttribute($value) {
        return TimeMode($value);
    }

    public function user()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'validator_id','id');
    }

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsersPublic::class,'validator_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsersPublic::class, 'talent_payments_validations', 'id', 'validator_id');
    }

    public function talentPayments()
    {
        return $this->belongsToMany(TalentPayments::class, 'talent_payments_validations', 'id', 'payment_id');
    }

    public function talentPayment()
    {
        return $this->belongsTo(TalentPayments::class,'payment_id','id');
    }
}
