<?php

namespace Modules\Category\Transformers;

use App\Helpers\GeneralHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,
            'name' => $this->whenHas('name', fn() => strip_tags($this->name)),
        ];
    }
}
