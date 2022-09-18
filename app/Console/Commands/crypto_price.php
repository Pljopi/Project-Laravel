<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\CryptoConsoleController as Crypto;

class crypto_price extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'crypto:price';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Command description';

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    $criptoCurrency = $this->ask('Enter the cripto currency you want to get the price for');
    $currency = $this->ask('Enter the currency you want to get the price in');
    $crypto = new Crypto();
    $pricePairUrl = $crypto->getPrice($criptoCurrency, $currency);
    $this->info('The price for ' . $criptoCurrency . ' in ' . $currency . ' is ' . $pricePairUrl[1] . ' ' . $currency);
  }
}
