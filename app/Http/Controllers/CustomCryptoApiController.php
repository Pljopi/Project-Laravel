<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class CustomCryptoApiController extends Controller
    //call api
{
    private $listOfCurrencies = null;

    public function apiCall($pricePairOrUrlPair){
        $url = $pricePairOrUrlPair;
        $response = Http::get($url);
        $data = $response->json();
        return $data;
    }
    //Get list of currencies from api url
    public function GetList(){
        if (!$this->listOfCurrencies) {
            $this->listOfCurrencies = $this->apiCall("https://api.coingecko.com/api/v3/simple/supported_vs_currencies");
        }
        $list = $this->listOfCurrencies;
       
        return $list;
    }
    //Pass list of currencies to show list view---kaj bi moglo to vrniti v route? Verjetno -.-''
    public function GetListOfCurrencies(){
       
    
      $list = $this->GetList();
      
        return view('pages/show_list_html',  [ 'ListOfCurrencies' => $list ]);
    }
    //Pass list of currencies to home view---isto kot zgoraj
    public function GetListOfCurrenciesHome(){
        $list = $this->GetList();
        return view('pages/list_html',  [ 'ListOfCurrencies' => $list ]);
    }

    //Get price of currency from api url
    public function GetPrice(Request $request){
        $currency = $request->currency;
        $criptoCurrency = $request->cripto_currency;
        $pricePairUrl = sprintf("https://api.coinbase.com/v2/prices/%s-%s/spot", $criptoCurrency, $currency);
       
        $pricePairUrlApiCall = $this->apiCall($pricePairUrl);

        $pricePair = [
        $pricePairUrlApiCall["data"]["base"],
        $pricePairUrlApiCall["data"]["amount"],
        $pricePairUrlApiCall["data"]["currency"],
        ];
        list($criptoCurrency, $price, $currency) = $pricePair;
      return view('pages/price_html',  [ 'criptoCurrency' => $criptoCurrency, 'price' => $price, 'currency' => $currency ]);
  
    
    }
    }
   

