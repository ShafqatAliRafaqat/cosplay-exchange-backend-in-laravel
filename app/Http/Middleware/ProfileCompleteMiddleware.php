<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileCompleteMiddleware
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
        if (Auth::user()->profile()->first()->complete==0) {
            Alert::Error('Error!','Complete Your Profile To Unlock All Features');
            return redirect('member/profile/create');
        }
        else
        {
            return $next($request);
        }
    }
}
