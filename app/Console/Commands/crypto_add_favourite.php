<?php

namespace App\Console\Commands;
use App\Http\Controllers\CryptoConsoleController as Crypto;
use Illuminate\Console\Command;

class crypto_add_favourite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crypto:add_favourite';

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
    {   $crypto = new Crypto();
        $currencyTag = $this->ask('Enter the currency TAGs you want to add to your favourites, separated by a comma');
        $favouriteTag = $crypto->checkFavouriteCurrencyTag($currencyTag);
        $parsedFavouriteTag = $crypto->parseFavourite($favouriteTag);
        $favouriteTags = implode("\n", $parsedFavouriteTag);
        $this->info('Your favourite currencies are: ' . $favouriteTags);
        return 0;
    }
}
