<?php

namespace App\Http\Middleware\tenancy;
use App\Models\Tenancy\SittingDomain;
use Closure;
use DateTime;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authuserclient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {  
        $sitting=SittingDomain::find(1);


       

        if($sitting->datatime <date("Y-m-d"))
        {
            return redirect('Tenancy.loginTenancy');
        }
       
        if($sitting->active==0) {
          //  abort(404);
            return redirect('Tenancy.loginTenancy');
        }
      
        return $next($request);
    }
}
