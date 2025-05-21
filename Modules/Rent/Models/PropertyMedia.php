<?php

namespace Modules\Rent\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyMedia extends Model
{
    protected $fillable = [
        'property_id', 'type', 'file_path', 'order', 'caption'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
