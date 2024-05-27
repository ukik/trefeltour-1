<?php

// namespace App\Models\Table\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Table\BadasoUsers;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourismPayments extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "tourism_payments";

    protected $fillable = [
        'id',
        'booking_id',
        'customer_id',
        'uuid',
        'total_amount',
        'code_transaction',
        'method',
        'date',
        'status',
        'receipt',
        'description',
        'code_table',
        'created_at',
        'updated_at',
        'deleted_at',
        'is_selected',
    ];

    public function user()
    {
        return $this->belongsTo(BadasoUsers::class,'customer_id','id');
    }

    public function badasoUser()
    {
        return $this->belongsTo(BadasoUsers::class,'customer_id','id');
    }

    public function badasoUsers()
    {
        return $this->belongsToMany(BadasoUsers::class, 'tourism_payments', 'id', 'customer_id');
    }

    public function tourismBookings()
    {
        return $this->belongsToMany(TourismBookings::class, 'tourism_payments', 'id', 'booking_id');
    }

    public function tourismBooking()
    {
        return $this->belongsTo(TourismBookings::class,'booking_id','id');
    }

    public function tourismPaymentsValidations()
    {
        return $this->hasMany(TourismPaymentsValidations::class, 'payment_id', 'id');
    }

    public function tourismPaymentsValidation()
    {
        return $this->hasOne(TourismPaymentsValidations::class, 'payment_id', 'id');
    }


    public function tourismPayment()
    {
        return $this->hasOne(TourismPayments::class, 'booking_id', 'id');
    }

    public function tourismPayments()
    {
        return $this->hasMany(TourismPayments::class, 'booking_id', 'id');
    }
}
