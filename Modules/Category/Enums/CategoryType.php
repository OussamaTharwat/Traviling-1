<?php

namespace Modules\Category\Enums;

enum CategoryType
{
    const BLOG = 1;
    const ASSESSMENT = 2;
    public static function availableTypes(): array
    {
        return [
            'Blog' => self::BLOG,
            'Assessment' => self::ASSESSMENT,
        ];
    }
}
