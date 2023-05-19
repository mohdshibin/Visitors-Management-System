<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RejectEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $fname;
    /**
     * Create a new message instance.
     */
    public function __construct($fname)
    {
        $this-> fname=$fname;
    }

    public function build()
    {
        return $this->subject('Access Request Rejected')
                    ->view('email')
                    ->with([
                        'fname' => $this->fname,
                        'body' => "We regret to inform you that your recent access request has been rejected.",
                    ]);
    }
}
