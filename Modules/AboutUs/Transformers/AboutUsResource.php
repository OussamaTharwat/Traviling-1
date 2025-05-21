<?php

namespace Modules\AboutUs\Transformers;

use App\Helpers\GeneralHelper;
use Illuminate\Http\Resources\Json\JsonResource;

use Illuminate\Support\Str;

class AboutUsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'title_about' => $this->whenHas('title_about', fn() => strip_tags($this->title_about)),
            'all_lang_title_about' => $this->when(request()->lang, function () {
                return GeneralHelper::getAllLang($this, 'title_about', true);
            }),

            'description_about' => $this->whenHas('description_about', fn() => strip_tags($this->description_about)),
            'all_lang_description_about' => $this->when(request()->lang, function () {
                return GeneralHelper::getAllLang($this, 'description_about', true);
            }),

            'title_mission' => $this->whenHas('title_mission', fn() => strip_tags($this->title_mission)),
            'all_lang_title_mission' => $this->when(request()->lang, function () {
                return GeneralHelper::getAllLang($this, 'title_mission', true);
            }),

            'description_mission' => $this->whenHas('description_mission', fn() => strip_tags($this->description_mission)),
            'all_lang_description_mission' => $this->when(request()->lang, function () {
                return GeneralHelper::getAllLang($this, 'description_mission', true);
            }),

            'title_vision' => $this->whenHas('title_vision', fn() => strip_tags($this->title_vision)),
            'all_lang_title_vision' => $this->when(request()->lang, function () {
                return GeneralHelper::getAllLang($this, 'title_vision', true);
            }),

            'description_vision' => $this->whenHas('description_vision', fn() => strip_tags($this->description_vision)),
            'all_lang_description_vision' => $this->when(request()->lang, function () {
                return GeneralHelper::getAllLang($this, 'description_vision', true);
            }),

            'image' => $this->getFirstMediaUrl('about_us_image'),
        ];
    }
}
