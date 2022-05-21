<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->get('identify')!==null && $request->session()->get('password')!==null) {
            if ($request->session()->get('identify')==="AdminChangePro" && $request->session()->get('password')==="01233378marie") {
                 return $next($request);
            }else {
                 return abort(403,"OUPS , Accès intedit  !");
            }
        }else{
            return abort(403,"OUPS , Accès intedit  !");
        }
    }
}
