<?php

namespace Modules\Auth\Helpers;

use Modules\Role\Abstracts\PermissionDefinition;

class AuthPermissionDefinition extends PermissionDefinition
{
    public static function permissions(): array
    {
        return [
            'users' => self::generatePermissionsArray(['approve','reject'] ,additionalPermissions:['add_coin','add_certificate','updateStatus']),
        ];
    }
}
