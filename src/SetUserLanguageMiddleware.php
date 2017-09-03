<?php

namespace Zoomyboy\Translatable;

use Closure;

class SetUserLanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		if (auth()->check()) {
			app()->setLocale(auth()->user()->language->code);
		}

        return $next($request);
    }
}
