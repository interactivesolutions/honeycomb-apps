<?php

namespace interactivesolutions\honeycombapps\app\http\middleware;

use Carbon\Carbon;
use Config;
use HCLog;
use Closure;
use File;
use interactivesolutions\honeycombapps\app\models\apps\Tokens;

class AuthApps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->token)
            return HCLog::error('APP-001', trans('Token missing'));

        $record = Tokens::where('value', $request->token)->where('expires_at', '>=', Carbon::now())->first();

        if (!$record)
            return HCLog::error('APP-002', trans('Token not found'));

        if (!env('HC_API_TOKEN_LIFESPAN'))
            return HCLog::error('APP-003', trans('HC_API_TOKEN_LIFESPAN is not set in .env file'));

        $expire_max = Carbon::now()->addMinutes(60);
        $expire_at = new Carbon($record->expires_at);

        if ($expire_at < $expire_max)
            $record->update(['expires_at' => $expire_max]);

        return $next($request);
    }
}
