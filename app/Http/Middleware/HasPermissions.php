<?php

namespace App\Http\Middleware;

use App\Models\User;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Session;

class HasPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (Auth::check()) {
            if (!User::hasPermission($permission)) {
                Session::flash('error_msg', trans('messages.do_not_have_permissions'));
                return redirect()->back();
            }
        } else {
            Session::flash('error_msg', trans('messages.please_login_to_continue'));
            return redirect()->back();
        }

        return $next($request);
    }
}
