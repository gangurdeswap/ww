<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class checkLanguage {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Session::has('applocale') && Session::has('applocale') != '' && env('IS_MULTILANGUAGE')) {
            \Illuminate\Support\Facades\App::setLocale(Session::get('applocale'));
        }
        return $next($request);
    }

}
