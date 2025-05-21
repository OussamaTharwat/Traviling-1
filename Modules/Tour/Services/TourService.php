<?php

namespace Modules\Tour\Services;

use Modules\Tour\Models\Builder\TourBuilder;
use Modules\Tour\Models\Tour;

class TourService
{
    public function index()
    {
        return Tour::query()
            ->latest()
            ->when(
                request()->has('category_id'),
                fn($query) => $query->where('category_id', request('category_id'))
            )
            ->when(true, fn(TourBuilder $d) => $d->withShowDetails())
            ->paginatedCollection();
    }

    public function show($id)
    {
        return Tour::query()
            ->latest()
            ->when(true, fn(TourBuilder $d) => $d->withShowDetails())
            ->findOrFail($id);
    }
}
