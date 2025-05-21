<?php

namespace Modules\Tour\Helpers;
use Modules\Role\Abstracts\PermissionDefinition;

class TourermissionDefinition extends PermissionDefinition
{
    public static function permissions(): array
    {
        return [
            'tours' => self::generatePermissionsArray(),
        ];
    }
}
