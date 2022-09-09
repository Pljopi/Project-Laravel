<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class CustomDashboardController extends Controller
{


    public function dashboard(){
        if(Session::has('LoggedUser')){
            $user = Users::where('id', '=', Session::get('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $user
            ];
            return view('pages/dashboard_html', $data);
        }else{
            return redirect('login')->with('fail', 'You must be logged in');
        }
    }
    //
}
