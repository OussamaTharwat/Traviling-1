<?php

namespace Modules\Rent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyDocument extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'property_id', 'type', 'file_path', 'uploaded_at', 'status', 'notes'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
