<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class PDFController extends Controller
{
    public function pdfFromOrder(Order $order)
    {
        $this->authorize('viewInvoice', $order);
        $pdf = PDF::loadView('dashboard.orders.showPDF', ['order' => $order]);
        $pdf->render();
        return $pdf->download('order_' . $order->id . '.pdf');
    }
}
