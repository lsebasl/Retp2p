<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Mixed_;

class CheckStatus
{
    /**
     * Get the path the user should be redirected to when they are not enable.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->status == User::DISABLE_STATUS) {
                return redirect('/')->with('error', 'Client Disable!');

        }


        return $next($request);
    }
}
