<?php

namespace Modules\Rent\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationStatusHistory extends Model
{
    protected $fillable = [
        'reservation_id', 'old_status', 'new_status', 'changed_by_user_id', 'notes'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function changer()
    {
        return $this->belongsTo(\App\Models\User::class, 'changed_by_user_id');
    }
}
