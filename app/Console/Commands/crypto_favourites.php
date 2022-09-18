<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\CryptoConsoleController as Crypto;

class crypto_favourites extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'crypto:favourite';

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
    $user_id =  $this->ask('What is the user_id, you want to get favourites for?');
    $crypto = new Crypto();
    $favourites = $crypto->getFavourites($user_id);
    $this->info('Your favourites are:');
    foreach ($favourites as $favourite) {
      $this->info($favourite);
    }
  }
}
