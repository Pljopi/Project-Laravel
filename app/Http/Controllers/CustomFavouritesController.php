<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Http;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\Favourite;

class CustomFavouritesController extends Controller
{
 public function insertFavourite(Request $request){
       if ($request->session()->has('LoggedUser')) {
     $user_id = Session::get('LoggedUser','id');
 }else{
    $user_id = 0;
 }

 Favourite::insertOrIgnore([
    'user_id' => $user_id, 
    'tag' => $request->currency
 ]);


return redirect('show_list',);

}
    public function showFavourites(Request $request){
        if ($request->session()->has('LoggedUser')) {
            $user_id = Session::get('LoggedUser','id');
                    }else{
           $user_id = 0;
         
        }
        $favourites = Favourite::where('user_id', $user_id)->get('tag');
      
        $favourites = array_column($favourites->toArray(), 'tag');

        return  response()->view('pages/favourites_html', ['printFavourites' => $favourites]);
    }


public function removeFromFavourites(Request $request){
    if ($request->session()->has('LoggedUser')) {
        $user_id = Session::get('LoggedUser','id');
                }else{
       $user_id = 0;
         }
  $user = $request->favourite;
    Favourite::where('user_id', $user_id)->where('tag', $request->favourite)->delete();
      
    return  redirect('favourites');
}
}

