<?php

namespace App\Observers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderObserver
{
    public function created(Order $order)
    {
        $pdf = Pdf::loadView('orders.ticket', compact('order'))->setPaper('letter');
        $pdf->save(storage_path('app/public/tickets/ticket-'. $order->id . '.pdf'));
        $order->pdf_path = 'tickets/ticket-'. $order->id . '.pdf';
        $order->save();
    }
}
