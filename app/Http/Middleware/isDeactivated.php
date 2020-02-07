<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class isDeactivated
{

    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->is_deactivated == 1) {

            Auth::logout();

            return redirect('/')->withWarning('This account has been deactivated.');
        }

        return $next($request);
    }
}
