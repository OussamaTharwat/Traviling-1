<?php

namespace Modules\Role\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Role\Models\Permission;
use Modules\Role\Models\Role;

trait HasPermissions
{
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission(string $permissionName): bool
    {
        $user = auth()->user();

        if (!$user) {
            return false; // لا يوجد مستخدم مسجل الدخول
        }

        $role = $user->roles()->first();

        if (!$role) {
            return false; // المستخدم ليس لديه أي دور
        }

        return $role->permissions()->where('name', $permissionName)->exists();
    }


    public function assignRole($role)
    {
        $role = Role::where('name', $role)->first();

        if ($role) {
            $this->roles()->sync($role->id);
        }
    }
}
