<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        // if (auth()->user()->level == 1) {
        //     # code...
        //     return $next($request);
        // }
        if(in_array($request->user()->level, $levels)){
            return $next($request);
        }
        if(auth()->user()->level == 3){
            return redirect('/customers');
        }
        return redirect('/');
    }
}
