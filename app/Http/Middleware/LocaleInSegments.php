<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class HandleLocale.
 */
class LocaleInSegments
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param null    $guard
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        $locale = trim($request->segment(1));

        if (! in_array($locale, config('app.locales'), true)) {
            $locale = config('app.defaultLocale');
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
