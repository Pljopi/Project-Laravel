<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {      
        View::composer('*', function($view){
      
        if(session()->has('LoggedUser')){
        $user = User::where('id', '=', session()->get('LoggedUser'))->first();
                           
        $view->with('LoggedUserInfo', $user);
            }
        });
    //
    }
}
