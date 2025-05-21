<?php

namespace Modules\Tour\Enum;

enum StatusTour
{
    const APPROVED = 1;
    const WAITING = 2;
    const REJECTED = 3;

    public static function getLabel($type)
    {
        $types = [
            self::REJECTED => 'rejected',
            self::WAITING => 'waiting',
            self::APPROVED => 'approved',
        ];
        return $types[$type] ?? 'Unknown';
    }

    public static function getAvailable()
    {
        return [
            self::REJECTED,
            self::WAITING,
            self::APPROVED,
        ];
    }
}
