<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class crypto_help extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crypto:help';

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
        $this->info('After php artiisan crypto: type >list< for a list of all supported currencies or >price< for a price of a currency pair. You can also use >favourite< to see the favourite currencies of selected user');
    
        return 0;
    }
}
