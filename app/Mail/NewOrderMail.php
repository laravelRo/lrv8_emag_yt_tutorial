<?php

namespace App\Mail;

use App\Models\shop\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $alert;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $alert)
    {
        $this->order = $order;
        $this->alert = $alert;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->from('Eshop@admin.com', 'Administrator Eshop')
            ->subject('Comanda ' . $this->order->id . ' de la E-Shop')
            ->view('front.emails.new-order');
    }
}
