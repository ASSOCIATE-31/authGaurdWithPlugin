<?php

namespace App\Http\Middleware\User;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userType = (isset(Auth::guard('frontend')->user()->user_type)) ? Auth::guard('frontend')->user()->user_type : '';
        switch($userType)
        {
            case 2 :
                return $next($request);
                break;
            default :
                return redirect()->route('user.login.redirect');    
                break;    
        }
        
    }
}
