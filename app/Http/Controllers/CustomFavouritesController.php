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
    public function insertFavourite(Request $request)
    {
        if ($request->session()->has('LoggedUser')) {
            $user_id = Session::get('LoggedUser', 'id');
        } else {
            $user_id = 0;
        }

        Favourite::insertOrIgnore([
            'user_id' => $user_id,
            'tag' => $request->currency
        ]);


        return redirect('show_list',);
    }




    public function insertTag($user_id, $tag)
    {
        foreach ($tag as $tag) {
            Favourite::insertOrIgnore([
                'user_id' => $user_id,
                'tag' => $tag
            ]);
        }
    }

    public function getFavourites($user_id)
    {
        $favourites = Favourite::where('user_id', $user_id)->get('tag');
        $favourites = array_column($favourites->toArray(), 'tag');
        return $favourites;
    }


    public function showFavourites(Request $request)
    {
        if ($request->session()->has('LoggedUser')) {
            $user_id = Session::get('LoggedUser', 'id');
        } else {
            $user_id = 0;
        }
        $favourites = $this->getFavourites($user_id);

        return  response()->view('pages/favourites_html', ['printFavourites' => $favourites]);
    }


    public function removeFromFavourites(Request $request)
    {
        if ($request->session()->has('LoggedUser')) {
            $user_id = Session::get('LoggedUser', 'id');
        } else {
            $user_id = 0;
        }
        $tag = $request->tag;
        Favourite::where('user_id', $user_id)->where('tag', $request->favourite)->delete();

        return  redirect('favourites');
    }


    public function removeTag($user_id, $tag)
    {

        foreach ($tag as $tag) {
            Favourite::where('user_id', $user_id)->where('tag', $tag)->delete();
        }
    }
}
