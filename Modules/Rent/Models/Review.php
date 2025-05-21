<?php

namespace Modules\Rent\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'property_id', 'reservation_id', 'user_id', 'type', 'rating', 'comment'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
