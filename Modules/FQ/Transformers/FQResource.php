<?php

namespace Modules\FQ\Transformers;

use App\Helpers\GeneralHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FQResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->whenHas('id'),
            'question' => $this->whenHas('question', fn() => strip_tags($this->question)),
            'all_lang_question' => $this->when(request()->lang, function () {
                return GeneralHelper::getAllLang($this, 'question');
            }),
            'answer' => $this->whenHas('answer', fn() => strip_tags($this->answer)),
            'all_lang_answer' => $this->when(request()->lang, function () {
                return GeneralHelper::getAllLang($this, 'answer');
            }),
        ];
    }
}
