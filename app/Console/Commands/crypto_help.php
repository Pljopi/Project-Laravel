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
        $this->info("list of all commands: \n crypto:list \n crypto:price \n crypto:favourite \n crypto:user \n crypto:user_id \n crypto:add_favourite \n crypto:remove_favourite \n crypto:help");
    
        return 0;
    }
}
