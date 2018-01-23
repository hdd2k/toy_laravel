<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    protected $signature = 'email:send';
    protected $description = 'Email sending commands';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // TODO: Log instead of sending an actual email
    }
}

