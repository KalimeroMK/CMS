<?php

namespace App\Http\Middleware;

use App;
use App\Libraries\Utils;
use App\Setting;
use Carbon\Carbon;
use Closure;
use Config;
use Exception;
use Illuminate\Http\Request;

class BeforeRequest
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
        $general = Utils::getSettings(Setting::CATEGORY_GENERAL);

        App::setLocale($general->locale);

        try {
            setlocale(LC_TIME, $general->locale);
            Carbon::setLocale($general->locale);
        } catch (Exception $e) {
            dd($e);
        }

        Config::set('app.timezone', $general->timezone);
        Config::set('app.locale', $general->locale);

        date_default_timezone_set($general->timezone);

        return $next($request);
    }
}
