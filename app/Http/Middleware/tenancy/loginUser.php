<?php

namespace App\Http\Middleware\tenancy;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class loginUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!session()->has('loginuser'))
        {
            return redirect('Tenancy.loginTenancy');
        }

        // dd('loginclient');
        return $next($request);
    }
}
