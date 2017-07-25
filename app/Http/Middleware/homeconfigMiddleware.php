<?php

namespace App\Http\Middleware;

use Closure;

class homeconfigMiddleware
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
        $res = \DB::table('config')->first()->status;

        if($res == 0)
        {
            return redirect('home/config/index');   
        }

        return $next($request);
    }
}
