<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class CustomCryptoApiController extends Controller
{
    private $listOfCurrencies = null;

    public function apiCall($pricePairOrUrlPair){
        $url = $pricePairOrUrlPair;
        $response = Http::get($url);
        $data = $response->json();
        return $data;
    }
    //
    public function getListOfCurrencies(Request $request){
       
    
        if (!$this->listOfCurrencies) {
            $this->listOfCurrencies = $this->apiCall("https://api.coingecko.com/api/v3/simple/supported_vs_currencies");
        }
        $list = $this->listOfCurrencies;
        $user= $request->user();
        return view('pages/show_list_html',  [ 'ListOfCurrencies' => $list , 'LoggedUserInfo' => $user]);
    }

    
}
