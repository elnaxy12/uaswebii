<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentLinkMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $order;
    public $paymentLink;

    public function __construct($order, $paymentLink)
    {
        $this->order = $order;
        $this->paymentLink = $paymentLink;
    }

    public function build()
    {
        return $this->subject('Link Pembayaran Order #' . $this->order->id)
                    ->view('emails.payment_link');
    }
}
