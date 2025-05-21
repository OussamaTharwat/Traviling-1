<?php

namespace Modules\Auth\Traits;

use App\Helpers\MediaHelper;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Auth\Enums\AuthEnum;
use Modules\Role\Models\Role;

trait UserRelations
{
    public function avatar()
    {
        return MediaHelper::mediaRelationship($this, AuthEnum::AVATAR_COLLECTION_NAME);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissionsOnly(): BelongsToMany
    {
        return $this->roles();
    }
}
