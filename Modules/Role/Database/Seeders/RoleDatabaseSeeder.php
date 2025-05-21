<?php

namespace Modules\Role\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\AboutUs\Helpers\AboutUsPermissionDefinition;
use Modules\Category\Helpers\CategoryPermissionDefinition;
use Modules\ContactUs\Helpers\ContactUsPermissionDefinition;
use Modules\FQ\Helpers\FQPermissionDefinition;
use Modules\Role\Helpers\PermissionCacheHelper;
use Modules\Role\Helpers\PermissionHelper;
use Modules\Role\Helpers\RolePermissionDefinition;
use Modules\Role\Models\Role;

class RoleDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Model::unguard();
        $permissions = $this->createPermissions();
        $this->createRoles($permissions);
    }

    public function createPermissions()
    {
        $allPermissions = [
            ...AboutUsPermissionDefinition::permissions(),
            ...ContactUsPermissionDefinition::permissions(),
            ...FQPermissionDefinition::permissions(),
            ...CategoryPermissionDefinition::permissions(),
            ...RolePermissionDefinition::permissions(),
        ];

        $latestPermissions = [];

        foreach ($allPermissions as $parentPermission => $operations) {
            $permission = [];
            foreach ($operations as $operation) {
                $permissionName = PermissionHelper::generatePermissionName($operation, $parentPermission);
                $permission['name'] = $permissionName;

                PermissionHelper::permissionModel()::firstOrCreate(['name' => $permission['name']], $permission);
                $latestPermissions[] = $permission;
            }
        }

        PermissionCacheHelper::setCachedPermissions();

        $permissions = collect($latestPermissions)->pluck('name')->toArray();

        return PermissionHelper::permissionModel()::whereIn('name', $permissions)->get();
    }

    private function createRoles($permissions)
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->permissions()->sync($permissions->pluck('id')->toArray());
        $user = User::where('email', 'admin@admin.com')->first();
        if ($user) {
            $user->roles()->sync([$adminRole->id]);
        }
    }
}
