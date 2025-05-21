<?php

namespace Modules\Rent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'code', 'is_active', 'order', 'settings'
    ];

    protected $casts = [
        'settings' => 'array',
    ];
}
