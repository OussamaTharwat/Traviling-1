<?php

namespace Modules\Tour\Models;

use App\Traits\PaginationTrait;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Modules\Tour\Enum\MediaTourPhoto;
use Modules\Tour\Models\Builder\TourBuilder;
use Modules\Tour\Traits\TourRelation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Tour extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia, TourRelation, PaginationTrait, Searchable;

    protected $fillable = [
        'title',
        'description',
        'features',
        'facilities',
        'itinerary',
        'duration',
        'difficulty',
        'group_size',
        'discound',
        'price_per_person',
        'map_url',
        'category_id',
    ];

    protected $translatable = [
        'title',
        'description'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(MediaTourPhoto::IMAGE)->singleFile();
        $this->addMediaCollection(MediaTourPhoto::IMAGES);
    }

    protected $casts = [
        'itinerary' => 'array',
        'facilities' => 'array',
        'features' => 'array',
    ];


    public function newEloquentBuilder($query)
    {
        return new TourBuilder($query);
    }
}
