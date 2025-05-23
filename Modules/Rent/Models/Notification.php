<?php

namespace Modules\Rent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Rent\Database\Factories\NotificationFactory;

class Notification extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): NotificationFactory
    {
        //return NotificationFactory::new();
    }
}
