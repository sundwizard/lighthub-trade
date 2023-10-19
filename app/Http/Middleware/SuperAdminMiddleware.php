<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $auth_user_type = Auth::user()->user_type;// get the type of user loged in

        if(Auth::user()->user_type==="Super Admin"){
            return $next($request);
        }else{
            Session::flush();
            return redirect()->route('login');
        }

        return $next($request);
    }
}
