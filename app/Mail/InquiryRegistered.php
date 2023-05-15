<?php

namespace App\Mail;

use App\Models\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;

class InquiryRegistered extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The inquiry instance.
     */
    public Inquiry $inquiry;

    /**
     * The PDF representation of the inquiry.
     */
    public string $pdf;

    /**
     * Create a new message instance.
     */
    public function __construct(Inquiry $inquiry, string $pdf)
    {
        $this->inquiry = $inquiry;
        $this->pdf = $pdf;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('contact-us@cadexsa.net', 'Inquiry Notification Service'),
            to: [env('MAIL_ADMIN_ADDRESS')],
            subject: 'New inquiry submitted',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.inquiries.registered',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData(fn () => $this->pdf, 'Inquiry.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
