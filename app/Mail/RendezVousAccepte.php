<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\RendezVous;

class RendezVousAccepte extends Mailable
{
    use Queueable, SerializesModels;

    public $rendezvous;

    /**
     * Create a new message instance.
     */
    public function __construct(RendezVous $rendezvous)
    {
        $this->rendezvous = $rendezvous;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Votre rendez-vous est confirmé — CUMC-CO',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.rendezvous-accepte',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}