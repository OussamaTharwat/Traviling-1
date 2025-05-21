<?php

namespace App\Helpers;

use Modules\Auth\Enums\UserTypeEnum;

class GeneralHelper
{
    public static function adminMiddlewares(): array
    {
        return array_merge(self::getDefaultLoggedUserMiddlewares(), ['user_type_in:' . UserTypeEnum::ADMIN . '|' . UserTypeEnum::ADMIN_EMPLOYEE]);
    }

    public static function getDefaultLoggedUserMiddlewares(array $additionalMiddlewares = []): array
    {
        return [
            self::authMiddleware(),
            ...$additionalMiddlewares,
        ];
    }

    public static function touristMiddlewares(): array
    {
        return self::getDefaultLoggedUserMiddlewares(['user_type_in:' . UserTypeEnum::TOURIST]);
    }


    public static function authMiddleware(): string
    {
        return 'auth:sanctum';
    }

    public static function langMiddleware(): string
    {
        return "localization";
    }

    public static function userTypesIn(array $types)
    {
        return ['user_type_in:' . implode('|', $types)];
    }
    public static function userReachedIn(array $types)
    {
        return ['reached_user_type:' . implode('|', $types)];
    }

    public static function reachedUserMiddlewares(string $reachedTypeMiddleware)
    {
        return array_merge(self::getDefaultLoggedUserMiddlewares(), [$reachedTypeMiddleware]);
    }

    public static function getAllLang($model, $key)
    {
        $lang = request()->lang;

        if ($lang && in_array($lang, self::getLang())) {
            return [$lang => strip_tags($model->getTranslation($key, $lang))];
        }

        $defaultLang = app()->getLocale();
        return [$defaultLang => strip_tags($model->getTranslation($key, $defaultLang))];
    }



    public static function defaultImage()
    {
        return "";
    }

    public static function pdfRules(bool $inUpdate = false, array $replaceDefaultRules = [])
    {

        $rules = [
            'required' => $inUpdate ? 'nullable' : 'required',
            'type' => 'file',
            'mimes' => 'mimes:pdf',
            'max' => 'max:10000', // 10mg

        ];
        return implode('|', array_values($rules));
    }

    public static function convertSecondsToHours($seconds)
    {
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds % 3600) / 60);
        $remainingSeconds = $seconds % 60;

        return $hours . ' ' . __('H') . ' ' . $minutes . ' ' . __('M');
    }


    public static function getLang()
    {
        return ['ar', 'en', 'fr', 'de', 'pl', 'ru', 'zh', 'tr', 'nl'];
    }
}
