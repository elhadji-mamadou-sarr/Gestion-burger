<?php

namespace App\Listeners;

use App\Events\OrderReady;
use App\Mail\OrderReadyMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class SendOrderReadyNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderReady $event): void
    {
        $order = $event->order;

        // Générer le PDF de la facture
        $pdf = Pdf::loadView('emails.order-invoice', compact('order'));

        // Envoyer l'e-mail avec la facture en pièce jointe
        Mail::to($order->user->email)->send(new OrderReadyMail($order, $pdf));
    }
    
}
