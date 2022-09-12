<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class LoggedUserInfo
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
        if($request->session()->has('LoggedUser')){
            $user = User::where('id', '=', $request->session()->get('LoggedUser'))->first();
      
            $data = [
                'LoggedUserInfo' => $user
            ];
            $request->merge($data);
        }
      
        return $next($request);
    }
}
