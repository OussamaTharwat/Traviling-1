<?php

namespace Modules\Auth\Transformers;

use App\Helpers\ResourceHelper;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Auth\Enums\AuthEnum;
use Modules\Role\Transformers\RoleResource;

class UserResource extends JsonResource
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
            'email' => $this->email != null ? $this->email : "",
            'status' => $this->whenHas('status'),
            'online' => $this->whenHas('chat_active'),
            'token' => $this->when(
                $this->token,
                function () {
                    return  ($this->token instanceof \Laravel\Sanctum\NewAccessToken
                        ? $this->token->plainTextToken
                        : $this->token);
                }
            ),
            $this->mergeWhen(! is_null($this->token), function () {
                return SanctumTokenResource::make($this->token);
            }),
            $this->mergeWhen(! is_null($this->refresh_token), function () {
                $data = collect(SanctumTokenResource::make($this->refresh_token))->toArray();
                return [
                    'refresh_token' => $data['token'],
                    'refresh_token_expires_at' => $data['token_expires_at'],
                ];
            }),
        ];
    }

    /**
     * @throws \Exception
     */
    private function getAvatar($url)
    {
        return ResourceHelper::getFirstMediaOriginalUrl(
            $this,
            AuthEnum::AVATAR_RELATIONSHIP_NAME,
            'user.png'
        );
    }
}
