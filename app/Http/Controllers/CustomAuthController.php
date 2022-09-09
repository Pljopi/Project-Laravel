<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class CustomAuthController extends Controller
{
   public function login(){
         return view('pages/auth/login_html');

   }

   public function registration(){
    return view('pages/auth/signup_html');

   }

   public function registerUser(Request $request){
     
    $request->validate([
           
        'username' => 'required | unique:users,uid',
        'password' => 'required | min:5 | max:12',
        'password_confirmation' => 'required | same:password',
        'email' => 'required | unique:users,email',
        
      ]);

    $user = new Users();
    $user->uid = $request->username;
    $user->email = $request->email;
    $user->pwd = Hash::make($request->password);
    $resoult = $user->save();

    if($resoult){
        return back()->with('success', 'You have successfully registered');
    }else{
        return back()->with('fail', 'Something went wrong, try again later');
    }
}

public function loginUser(Request $request){
    $request->validate([
        'username' => 'required| exists:users,uid',
        'password' => 'required',
    ]);

    $user = Users::where('uid', $request->username)->first();
    if($user){
        if(Hash::check($request->password, $user->pwd)){
            $request->session()->put('LoggedUser', $user->id);
            Session::put('LoggedUser', $user->id);

            return redirect('dashboard')->with('success', 'You are logged in');
        }else{
            return back()->with('fail', 'Incorrect password');
        }
    }else{
        return back()->with('fail', 'No account found for this username');
    }
}



public function logout(){
    if(Session::has('LoggedUser')){
        Session::pull('LoggedUser');
        return redirect('login')->with('success', 'You have been logged out');
    }
}

}
