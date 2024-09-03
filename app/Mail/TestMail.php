<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $backupName;
    public $eventName;
    public $eventToken;
    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->email =$data['email'];
        $this->backupName = $data['backupName'];
        $this->eventName = $data['eventName'];
        $this->eventToken = $data['eventToken'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->email, $this->name),
            subject: 'Restore request',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail',
            with:[
                'backupName'=>$this->backupName,
                'eventName'=>$this->eventName,
                'eventToken'=>$this->eventToken
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
