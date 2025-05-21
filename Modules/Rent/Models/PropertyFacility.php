<?php

namespace Modules\Rent\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyFacility extends Model
{
    protected $table = 'property_facility';

    protected $fillable = ['property_id', 'facility_id'];
}
