<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailTest extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $matchedColumns;

    /**
     * Create a new message instance.
     *
     * @param string $triggeringField The triggering date field name
     * @return void
     */
    public function __construct($user, $matchedColumns)
    {
        $this->user = $user;
        $this->matchedColumns = $matchedColumns;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('backend.emails.test')->subject('ALLERTA SKYDIVE VERONA')
            ->with([
            'user' => $this->user,
            'matchedColumns' => $this->matchedColumns
        ]);
    }
}
