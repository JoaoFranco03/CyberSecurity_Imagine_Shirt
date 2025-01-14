<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderClosed extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Order #'.$this->order->id.' Closed')
                    ->view('emails.order-closed')
                    ->attachData($this->generatePDF(), 'order.pdf');
    }


    private function generatePDF()
    {
        $pdf = \PDF::loadView('dashboard.orders.showPDF', ['order' => $this->order]);
        return $pdf->output();
    }
}
