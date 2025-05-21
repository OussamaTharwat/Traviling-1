<?php

namespace Modules\Auth\Helpers;

use Modules\Auth\Enums\UserTypeEnum;

class UserTypeHelper
{
    public static function nonMobileTypes(): array
    {
        return [
            UserTypeEnum::ADMIN,
            UserTypeEnum::ADMIN_EMPLOYEE,
        ];
    }

    public static function mobileTypes(): array
    {
        return [
            UserTypeEnum::TOURIST,
        ];
    }

    public static function AdminTypes(): array
    {
        return [
            UserTypeEnum::ADMIN,
            UserTypeEnum::ADMIN_EMPLOYEE,
        ];
    }
}
