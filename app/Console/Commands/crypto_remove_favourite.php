<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\CryptoConsoleController as Crypto;

class crypto_remove_favourite extends Command

{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crypto:remove_favourite';

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
        $crypto = new Crypto();
        $currencyTag = $this->ask('Enter the currency TAGs you want to remove from favourites, separated by a comma');
        $removeTag = $crypto->checkCurrencyTag($currencyTag);
        $parsedRemoveTag = $crypto->parseTag($removeTag);
        $removeTags = implode("\n", $parsedRemoveTag);
        $crypto->removeFav($parsedRemoveTag);
        $this->info('The following currencies have been removed from Favourites: ' . $removeTags);
    }
}
