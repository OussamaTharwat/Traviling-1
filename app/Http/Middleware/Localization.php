<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    protected static array $supportedLanguages = ['ar', 'en', 'fr', 'de', 'pl', 'ru', 'zh', 'tr', 'nl'];
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->hasHeader("Accept-Language")) {
            $lang = $request->header("Accept-Language");
            $lang = in_array($lang, self::$supportedLanguages) ? $lang : 'en';
            App::setLocale($lang);
        }
        return $next($request);
    }

    public static function getLang(): array
    {
        return self::$supportedLanguages;
    }
}
