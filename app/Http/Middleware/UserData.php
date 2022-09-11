<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Users;
use Session;
class UserData
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
            $user = Users::where('id', '=', Session::get('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $user
            ];
            return  response()->view('pages/favourites_html', $data);
        }
        else{
            return $next($request);
        }

    }
}

