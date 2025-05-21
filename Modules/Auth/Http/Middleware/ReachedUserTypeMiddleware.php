<?php

namespace Modules\Auth\Http\Middleware;

use App\Traits\HttpResponse;
use Closure;
use Illuminate\Http\Request;
use Modules\Auth\Enums\UserTypeEnum;

class ReachedUserTypeMiddleware
{
    use HttpResponse;

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $types)
    {
        $types = explode('|', $types);
        $allowed = false;
        $source = UserTypeEnum::reachedTypeArray();

        if (auth()->check()) {
            foreach ($types as $type) {
                if (auth()->user()->{$source[$type]}) {
                    $allowed = true;
                }
            }
        }

        if (! $allowed) {
            return $this->forbiddenResponse();
        }

        return $next($request);
    }
}
