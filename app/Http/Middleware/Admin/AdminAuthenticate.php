<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userType = (isset(Auth::user()->user_type)) ? Auth::user()->user_type : '';
        switch($userType)
        {
            case 1 :
                return $next($request);
                break;
            default :
            return response(view('auth.login'));
                break;    
        }
    }
}
