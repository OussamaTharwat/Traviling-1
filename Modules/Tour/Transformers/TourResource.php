<?php

namespace Modules\Tour\Transformers;

use App\Helpers\GeneralHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Category\Transformers\CategoryResource;
use Modules\Tour\Enum\MediaTourPhoto;

class TourResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->whenHas('title'),
            'all_lang_title' => $this->when(request()->lang, function () {
                return GeneralHelper::getAllLang($this, 'title');
            }),

            'description' => $this->whenHas('description'),
            'all_lang_description' => $this->when(request()->lang, function () {
                return GeneralHelper::getAllLang($this, 'description');
            }),

            'price_per_person' => $this->whenHas('price_per_person'),

            'discount' => $this->whenHas('discount', function () {
                $discount = number_format((float)$this->discount, 1, '.', '');
                $discount = rtrim(rtrim($discount, '0'), '.');
                return $discount . '%';
            }),

            'features' => $this->whenHas('features'),
            'facilities' => $this->whenHas('facilities'),
            'itinerary' => $this->whenHas('itinerary'),
            'duration' => $this->whenHas('duration'),
            'difficulty' => $this->whenHas('difficulty'),
            'group_size' => $this->whenHas('group_size'),

            'map_url' => $this->whenHas('map_url'),

            'category' => new CategoryResource($this->whenLoaded('category')),
            'image' => $this->getFirstMediaUrl(MediaTourPhoto::IMAGE) ?:  asset('images/blog.png'),
            'images' => $this->whenLoaded('images', function () {
                return $this->images->map(fn($media) => $media->getFullUrl());
            }),
        ];
    }
}
