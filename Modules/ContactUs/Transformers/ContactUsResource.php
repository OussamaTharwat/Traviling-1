<?php

namespace Modules\ContactUs\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactUsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->whenHas('first_name', fn() => strip_tags($this->first_name)),
            'last_name' => $this->whenHas('last_name', fn() => strip_tags($this->last_name)),
            'email' => $this->whenHas('email'),
            'phone' => $this->whenHas('phone'),
            'url' => $this->whenHas('url'),
            'message' => $this->whenHas('message', fn() => strip_tags($this->message)),
        ];
    }
}
