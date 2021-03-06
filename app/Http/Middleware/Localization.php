<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!in_array(Session::get('locale'), ['en', 'mk'])) {
            $locale = 'mk';
            Session::put('locale', $locale);

        }
        if (Session::has('locale')) {
            App::setlocale(Session::get('locale'));
        }
        return $next($request);
    }
}
