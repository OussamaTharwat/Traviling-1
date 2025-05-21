<?php

namespace Modules\Rent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'area_id', 'title', 'description', 'type', 'price', 'beds', 'bathrooms', 'floor_number',
        'building_name', 'area', 'address', 'location_lat', 'location_lng', 'google_maps_url',
        'verification_status', 'verified_at', 'is_available', 'status', 'suspended_reason',
        'views_count', 'bookings_count', 'average_rating', 'main_image_url'
    ];

    public function owner()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function documents()
    {
        return $this->hasMany(PropertyDocument::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'property_facility');
    }

    public function media()
    {
        return $this->hasMany(PropertyMedia::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function availability()
    {
        return $this->hasMany(AvailabilityCalendar::class);
    }
}
