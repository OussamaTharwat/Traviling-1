<?php

namespace Modules\Auth\Enums;

use App\Models\User;

enum UserTypeEnum
{
    const ADMIN = 1;

    const TOURIST = 2;

    const ADMIN_EMPLOYEE = 3;

    public static function availableTypes(): array
    {
        return [
            self::ADMIN,
            self::TOURIST,
            self::ADMIN_EMPLOYEE,
        ];
    }

    public static function getAvailable()
    {
        return [
            self::TOURIST
        ];
    }

    public static function getUserType(?User $user = null)
    {
        $user = ! is_null($user) ? $user : auth()->user();

        return $user?->type;
    }

    public static function alphaTypes(): array
    {
        return [
            self::ADMIN => 'admin',
            self::TOURIST => 'tourist',
            self::ADMIN_EMPLOYEE => 'admin_employee',
        ];
    }
    public static function textTypes($type)
    {
        $s= collect([
            'admin'=>1,
            'tourist'=>2,
            'admin_employee'=>3,
        ]);
      return  $s->only($type)->first();
    }
}
