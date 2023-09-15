<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailTest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

// Import the Mail facade
use App\Models\User;

// Import the User model
use Carbon\Carbon;

// Import Carbon for date handling

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $matchedColumns;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $matchedColumns)
    {
        $this->user = $user;
        $this->matchedColumns = $matchedColumns;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)->send(new SendEmailTest($this->user, $this->matchedColumns));
    }
//    public function handle()
//    {
//        if ($this->user && $this->user->email) {
//            Mail::to($this->user->email)->send(new SendEmailTest($this->user, $this->matchedColumns));
//        }
//    }
}
