<?php

namespace Modules\Role\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Role\Models\Permission;

trait RoleRelations
{
    // public function permissions(): BelongsToMany
    // {
    //     return $this->belongsToMany(Permission::class);
    // }

    public function permissionsOnly()
    {
        return $this->permissions();
    }

    public function permissions()
{
    return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
}

}
