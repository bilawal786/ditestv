<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailTest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

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
//    public function handle()
//    {
//        Mail::to($this->user->email)->send(new SendEmailTest($this->user, $this->matchedColumns));
//    }


    public function handle()
    {
        // Check if an email has already been sent for this date expiration
        if (!$this->isEmailSent()) {
            Mail::to($this->user->email)->send(new SendEmailTest($this->user, $this->matchedColumns));
            $this->markEmailAsSent();
        }
    }

    private function isEmailSent()
    {
        // Use the user's ID and the date event as the cache key
        $cacheKey = 'email_sent_' . $this->user->id . '_' . $this->matchedColumns;

        // Check if the cache key exists
        return Cache::has($cacheKey);
    }

    private function markEmailAsSent()
    {
        $cacheKey = 'email_sent_' . $this->user->id . '_' . $this->matchedColumns;

        Cache::put($cacheKey, true, now()->addMonths(1)); // Adjust the duration as needed
    }

}
