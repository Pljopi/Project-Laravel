<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\CryptoConsoleController as Crypto;

class crypto_user extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crypto:user';

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
$allUsers = $crypto->getAllUsers();

foreach ($allUsers as $user) {;
   $this->info($user->id,);
   $this->info($user->uid,);
   $this->info($user->email,);
   $this->info('-----------------');
}

        
    
    
    }
}   

