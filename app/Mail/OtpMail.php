<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $username;

    /**
     * Create a new message instance.
     */
    public function __construct($otp, $username)
    {
        $this->otp = $otp;
        $this->username = $username;
    }

    public function build()
{
    return $this->subject('Kode OTP Anda')
        ->view('auth.otp')
        ->with([
            'otp' => $this->otp,
            'username' => $this->username,
            'expired' => 5, // menit kedaluwarsa
        ])
        ->text('auth.otp'); // versi teks (fallback)
}



    public function attachments(): array
    {
        return [];
    }
}
