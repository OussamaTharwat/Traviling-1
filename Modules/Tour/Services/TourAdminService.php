<?php

namespace Modules\Tour\Services;

use App\Helpers\MediaHelper;
use Illuminate\Support\Facades\DB;
use Modules\Tour\Enum\MediaTourPhoto;
use Modules\Tour\Models\Builder\TourBuilder;
use Modules\Tour\Models\Tour;

class TourAdminService
{
    public function index()
    {
        $categoryId = request('category_id');
        return Tour::query()
            ->latest()
            ->when(
                $categoryId,
                fn($q) => $q->withAdminShowDetails()->where('category_id', $categoryId),
                fn($q) => $q->withAllDetails()
            )
            ->paginatedCollection();
    }

    public function show($id)
    {
        return Tour::query()
            ->latest()
            ->when(true, fn(TourBuilder $d) => $d->withAdminShowDetails())
            ->findOrFail($id);
    }

    public function store(array $data)
    {
        DB::transaction(function () use ($data) {
            $tour = Tour::create($data);
            MediaHelper::uploadMedia($tour, $data['image'] ?? null, MediaTourPhoto::IMAGE);
            if (!empty($data['images']) && is_array($data['images'])) {
                foreach ($data['images'] as $img) {
                    MediaHelper::uploadMedia($tour, $img, MediaTourPhoto::IMAGES);
                }
            }
        });
    }

    public function update(array $data, $id)
    {
        DB::transaction(function () use ($data, $id) {
            $tour = Tour::query()->findOrFail($id);
            $tour->update($data);
            MediaHelper::uploadMedia($tour, $data['image'] ?? null, MediaTourPhoto::IMAGE);
            if (!empty($data['images']) && is_array($data['images'])) {
                foreach ($data['images'] as $img) {
                    MediaHelper::uploadMedia($tour, $img, MediaTourPhoto::IMAGES);
                }
            }
        });
    }

    public function destroy($id)
    {
        $tour = Tour::query()->findOrFail($id);
        $tour->delete();
    }
}
