<?php

namespace Modules\Tour\Models\Builder;

use Illuminate\Database\Eloquent\Builder;

class TourBuilder extends Builder
{
    public function withAllDetails()
    {
        return $this->select([
            'id',
            'title',
            'description',
            'duration',
            'price_per_person',
            'category_id',
        ])->with(['image', 'category']);
    }

    public function withAdminShowDetails()
    {
        return $this->select([
            'id',
            'title',
            'description',
            'duration',
            'price_per_person',
            'category_id',
            'itinerary',
            'facilities',
            'features',
            'difficulty',
            'group_size',
            'discound',
            'map_url',
        ])->with(['image', 'images', 'category']);
    }

    public function withShowDetails()
    {
        return $this->select([
            'id',
            'title',
            'description',
            'duration',
            'price_per_person',
            'category_id',
            'itinerary',
            'facilities',
            'features',
            'difficulty',
            'group_size',
            'discound',
            'map_url'
        ])->with(['image', 'images', 'category']);
    }
}
