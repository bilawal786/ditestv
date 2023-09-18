<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\EmailService;

class SendAllEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send all emails';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $emailService = new EmailService(); // Replace with the actual service class
        $emailService->sendAllEmails();
        $this->info('All emails sent successfully.');
    }
}
