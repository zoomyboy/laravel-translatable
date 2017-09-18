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
		if (auth()->check() && !$this->byLanguageHeader($request)) {
			app()->setLocale(auth()->user()->language->code);
		} elseif ($this->byLanguageHeader($request)) {
			app()->setLocale(substr($request->header('Accept-Language'), 4));
		}

        return $next($request);
    }

	private function byLanguageHeader($request) {
		return substr($request->header('Accept-Language'), 0, 4) == 'set:';
	}
}
