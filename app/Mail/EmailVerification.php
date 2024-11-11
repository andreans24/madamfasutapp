<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $admin;

    public function __construct($admin)
    {
        $this->admin = $admin;
    }

    public function build()
    {
        return $this->subject('Verifikasi Email Anda')
                    ->view('emails.verify');
    }

    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Email Verification',
    //     );
    // }

    // public function content()
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    // public function attachments()
    // {
    //     return [];
    // }
}
