<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CustomCryptoApiController as Api;
use App\Http\Controllers\CustomFavouritesController as Fav;
use App\Http\Controllers\CustomAuthController as Auth;
use config\Twig;

class CryptoConsoleController extends Controller
{
   public function getPrice($criptoCurrency, $currency){
   $api = new Api();
   
   if ($this->isLenghtBetween($criptoCurrency) && $this->isLenghtBetween($currency)) {

    $criptoCurrency = strtolower($criptoCurrency);
    $currency = strtolower($currency);
  
      }else{
            echo "Please enter a valid currency pair \na currency TAG cannot be shorter than 2 or longer than 5 charcters \nfor help use the crypto:help command \n";
      exit;
    }
   if ($currency === $criptoCurrency) {
      echo "Please enter a valid currency pair \nthe currencies cannot be the same \nfor help use the crypto:help command \n";
      exit;
    }
    if (!$api->isCurrencyOnListOfSupported($currency) || !$api->isCurrencyOnListOfSupported($criptoCurrency)) {
     echo ("The currency pair you have entered is not on the list of supported currencies\n");
      exit;
    }else{
      $price = $api->priceCall($criptoCurrency, $currency);
      return $price;
    }
}

public function checkFavouriteCurrencyTag($currencyTag){
  if (empty($currencyTag) && $currencyTag !== '0') {
    echo "For this to work you have to enter a currency code, try again.\n";
    exit;
} else {

    return explode(",", str_replace(" ", "", ($currencyTag)));
}}
public function parseFavourite($favouriteCurrency)
{  $api = new Api();
   $list = $api->getList();

    foreach ($favouriteCurrency as $value) {
  //    var_dump($value);
        if (in_array($value, $list)) {
            $favs[] = $value;

        } else {
            $fail[] = $value;
        }
    }
    if (!empty($fail)) {
        echo "The following currencie TAG/s do not exist:\n";
        foreach ($fail as $value) {
            echo $value . "\n";
        }
    }
    if (!empty($favs)) {
               return array_unique($favs);
    }
    if (empty($favs)) {
        echo " You have not entered any valid currency codes, exiting...\n";
        exit;
    }

}





public function getList(){
   $api = new Api();
  return $api->GetList();
}

public function getFavourites($user_id){
    $fav = new Fav();
 
    return $fav->getFavourites($user_id);
    
}

public function getAllUsers(){
    $auth = new Auth();
    $users = $auth->getAllUsers();

    return $users;
}

public function isLenghtBetween(string $str, int $min = 2, int $max = 5): bool
{
    if (strlen($str) >= $min && strlen($str) <= $max) {
        return true;
    }
        return false;
}
}