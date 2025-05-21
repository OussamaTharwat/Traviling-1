<?php

namespace Modules\Footer\Transformers;

use App\Helpers\GeneralHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FooterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->whenHas('title', fn() => strip_tags($this->title)),
            'all_lang_title' => $this->when(request()->lang, function () {
                return GeneralHelper::getAllLang($this, 'title', true);
            }),

            'description' => $this->whenHas('description', fn() => strip_tags($this->description)),
            'all_lang_description' => $this->when(request()->lang, function () {
                return GeneralHelper::getAllLang($this, 'description', true);
            }),
        ];
    }
}
