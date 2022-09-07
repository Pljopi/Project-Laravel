<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

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
    $user->pwd = $request->password;
    $resoult = $user->save();

    if($resoult){
        return back()->with('success', 'You have successfully registered');
    }else{
        return back()->with('fail', 'Something went wrong, try again later');
    }
}
}
