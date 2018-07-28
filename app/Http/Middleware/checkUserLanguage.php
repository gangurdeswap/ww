<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class checkUserLanguage {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Session::has('userlocale') && Session::has('userlocale') != '') {
            \Illuminate\Support\Facades\App::setLocale(Session::get('userlocale'));
        } else {
            \Illuminate\Support\Facades\App::setLocale('en');
        }
        return $next($request);
    }

}
