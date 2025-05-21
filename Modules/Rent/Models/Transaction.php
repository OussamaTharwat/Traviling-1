<?php

namespace Modules\Rent\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'reservation_id', 'property_id', 'user_id', 'type', 'amount',
        'payment_method_id', 'status', 'payment_reference'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
