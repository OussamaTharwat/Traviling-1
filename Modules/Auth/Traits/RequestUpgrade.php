<?php
namespace App\Traits;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

trait RequestUpgrade
{
    protected $maxRequests = 1;
    protected $timeWindow = 60;

    public function checkUpgradeRequestLimit(Request $request)
    {
        $user = auth()->user();

        $cacheKey = 'user:' . $user->id . ':upgrade_request';

        $requestCount = Cache::get($cacheKey, 0);

        if ($requestCount >= $this->maxRequests) {
            return true;
        }

        Cache::put($cacheKey, $requestCount + 1, $this->timeWindow);

        return false;
    }
}
