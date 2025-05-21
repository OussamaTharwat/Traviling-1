<?php

namespace Modules\Rent\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'name', 'city', 'description', 'is_active', 'order'
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
