<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class SecureConnection
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
        if(app()->environment() == 'testing')
            return $next($request);

        if (!$request->secure() || !Str::startsWith($request->header('host'), 'youth.')) {
            if(!Str::startsWith($request->header('host'), 'youth.'))
                $request->headers->set('host', 'youth.' . $request->header('host'));

            return \Redirect::to(str_replace("http://", 'https://', $request->fullUrl()), 302);
        }
        
        /*if ($request->secure() || !Str::startsWith($request->header('host'), 'youth.')) {
            if(!Str::startsWith($request->header('host'), 'youth.'))
                $request->headers->set('host', 'youth.' . $request->header('host'));

            return \Redirect::to(str_replace("https://", 'http://', $request->fullUrl()), 302);
        }*/

        return $next($request);
    }
}
