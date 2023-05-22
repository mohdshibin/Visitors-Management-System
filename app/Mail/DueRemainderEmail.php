<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class DueRemainderEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $mailData;
    /**
     * Create a new message instance.
     */
    public function __construct($mailData)
    {
        $this-> mailData=$mailData;
    }

    public function build()
    {
        return $this->subject('Due Remainder')
                    ->view('dueremainderemail')
                    ->with([
                        'due'=> $this->mailData['due'],
                    ]);
    }
}
