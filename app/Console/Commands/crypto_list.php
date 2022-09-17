<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\CryptoConsoleController as Crypto;

class crypto_list extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crypto:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all crypto currencies';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('List of all supported currencie TAGs');
        $crypto = new Crypto;
        $list = $crypto->GetList();
        
        foreach ($list as $key ) {
            $this->info('*' . ' ' . $key);
        }
     

      
        return 0;
    }
}
