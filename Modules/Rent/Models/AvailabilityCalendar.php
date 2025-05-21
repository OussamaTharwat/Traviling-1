<?php

namespace Modules\Rent\Models;

use Illuminate\Database\Eloquent\Model;

class AvailabilityCalendar extends Model
{
    protected $table = 'availability_calendar';

    protected $fillable = [
        'property_id', 'start_date', 'end_date', 'is_available', 'type', 'reservation_id', 'notes'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
