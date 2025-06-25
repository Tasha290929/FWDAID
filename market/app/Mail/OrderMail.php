<?php

namespace App\Mail;

use Illuminate\Mail\Mailables\Address; 
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $items, $user, $total;
    /**
     * Create a new message instance.
     */
    public function __construct($items, $user, $total)
    {
        $this->items = $items;
        $this->user = $user;
        $this->total = $total;
    }

    public function build()
    {
        return $this->from('jeffrey@example.com', 'Cat’s Company')
                    ->subject('Order Confirmation')
                    ->markdown('email.order') // вот тут Markdown подключается
                    ->with([
                        'items' => $this->items,
                        'user' => $this->user,
                        'total' => $this->total,
                    ]);
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('jeffrey@example.com', 'Jeffrey Way'),
            subject: 'Order Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.order',
            with:[
                'items' =>$this->items,
                'user'=> $this->user,
                'total'=> $this->total
            ],
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
