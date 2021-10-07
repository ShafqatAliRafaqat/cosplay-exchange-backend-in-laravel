<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Laravel\Cashier\Cashier;
class SubscriptionMiddleware
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
/*
        if (!Auth::user()->subscribed('main')) {
            Alert::Error('Oops!','Subscribe Now To Unlock All Features!');
            return redirect('member/subscription');
        }
*/
        return $next($request);
    }
}
