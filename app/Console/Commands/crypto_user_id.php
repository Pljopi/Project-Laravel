<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\CryptoConsoleController as Crypto;

class crypto_user_id extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crypto:user_id {user_id}';

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
        if ($this->argument('user_id') <= 0 || $this->argument('user_id') > count($allUsers)) {
            $this->info('User id must be greater than 0 and less than ' . count($allUsers));
        } else {
            $user_id = $this->argument('user_id');
            $thisUser = $allUsers[$user_id - 1];
            $this->info('id:' . $thisUser->id,);
            $this->info('username:' . $thisUser->uid,);
            $this->info('email:' . $thisUser->email,);
            $this->info('-----------------');
        }
    }
}
