<?php
namespace Modules\FQ\Helpers;
use Modules\Role\Abstracts\PermissionDefinition;
class FQPermissionDefinition extends PermissionDefinition
{
    public static function permissions(): array
    {
        return [
            'Fq' => self::generatePermissionsArray(),
        ];
    }
}
