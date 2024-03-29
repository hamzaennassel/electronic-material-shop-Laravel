<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_data =[];
    /**
     * Create a new message instance.
     */
    public function __construct($mail_data)
    {
        $this->mail_data=$mail_data;
    }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: $this->mail_data['subject'],
    //     );
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'email-template',
    //     );
        
    // }

    public function build(){
        return $this->from($this->mail_data['fromEmail'],$this->mail_data['fromName'])
        ->subject($this->mail_data['subject'])
        ->view('email-template')->with('data',$this->mail_data);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    // public function attachments(): array
    // {
    //     return [];
    // }
}
