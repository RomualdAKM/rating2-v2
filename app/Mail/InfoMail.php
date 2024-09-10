<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InfoMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name_structure = '';
    public $email_structure = '';
    public $name_admin = '';
    public $email_admin = '';
    public $adress = '';
    public $phone = '';
    public $city = '';
    public $postal = '';
    public $promo = '';
    public $prix = '';
    
    /**
     * Create a new message instance.
     */
    public function __construct($name_structure,$email_structure,$name_admin,$email_admin,$adress,$phone,$city,$postal,$promo,$prix)
    {
        $this->name_structure = $name_structure;
        $this->email_structure = $email_structure;
        $this->name_admin = $name_admin;
        $this->email_admin = $email_admin;
        $this->adress = $adress;
        $this->phone = $phone;
        $this->city = $city;
        $this->postal = $postal;
        $this->promo = $promo;
        $this->prix = $prix;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Info Structure Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.info',
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
