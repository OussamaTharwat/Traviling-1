<?php

namespace Modules\Rent\Models;

use Illuminate\Database\Eloquent\Model;

class PayoutRequest extends Model
{
    protected $fillable = [
        'user_id', 'transaction_id', 'amount', 'bank_details', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
