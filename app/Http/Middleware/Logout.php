<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Logout
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
        $user = Auth::user();
        if($user->should_re_login == 1){
        $user->should_re_login = 0;
        $user->save();
        Auth::logout();
        return redirect('/login');
        }
        return $next($request);
    }
}
