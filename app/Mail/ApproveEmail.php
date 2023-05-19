<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApproveEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $mailData, $fname, $password;
    /**
     * Create a new message instance.
     */
    public function __construct($mailData,$fname,$password)
    {
        $this-> mailData=$mailData;
        $this-> fname=$fname;
        $this-> password=$password;
    }

    public function build()
    {
        return $this->subject('Access Request Approved')
                    ->view('email')
                    ->with([
                        'fname' => $this->fname,
                        'email' => $this->mailData['email'],
                        'password' => $this->password,
                        'body' => "We are pleased to inform you that your recent access request has been approved.",
                    ]);
    }
}
