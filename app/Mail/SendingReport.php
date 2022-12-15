<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendingReport extends Mailable
{
    use Queueable, SerializesModels;
  
    // public $mailData;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct($mailData)
    // {
    //     $this->mailData = $mailData;
    // }

    public function __construct($pdf)
    {
        $this->pdf = $pdf;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Percobaan Testing Email')
                    ->view('emails.demoMail')
                    ->attachData($this->pdf->output(), 'stock_report.pdf');
    }
}
