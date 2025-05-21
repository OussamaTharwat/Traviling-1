<?php

namespace Modules\ContactUs\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'contact_settings';

    protected $fillable = [
        'map_url',
    ];
}
