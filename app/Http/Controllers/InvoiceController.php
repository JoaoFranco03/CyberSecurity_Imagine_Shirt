<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class InvoiceController extends Controller
{
    public function show()
    {
        $customer = new Buyer([
        'name'          => 'John Doe',
        'custom_fields' => [
            'email' => 'test@example.com',
        ],
    ]);

    $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

    $invoice = Invoice::make()
        ->buyer($customer)
        ->discountByPercent(10)
        ->taxRate(15)
        ->shipping(1.99)
        ->addItem($item);

    return $invoice->stream();
    }
}