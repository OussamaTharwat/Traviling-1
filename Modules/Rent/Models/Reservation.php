<?php

namespace Modules\Rent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'property_id', 'user_id', 'checkin_date', 'checkout_date', 'guests_count',
        'total_price', 'status', 'guest_notes', 'host_notes'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function guest()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function statusHistory()
    {
        return $this->hasMany(ReservationStatusHistory::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
