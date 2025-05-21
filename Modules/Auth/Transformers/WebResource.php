<?php

namespace Modules\Auth\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class WebResource extends JsonResource
{
    /**
     * @throws \Exception
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email ?? "",
            'status' => $this->whenHas('status'),
            'online' => $this->whenHas('chat_active'),
            'token' => $this->when($this->token, function () {
                return $this->token instanceof \Laravel\Sanctum\NewAccessToken
                    ? $this->token->plainTextToken
                    : $this->token;
            }),
        ];
    }
}
