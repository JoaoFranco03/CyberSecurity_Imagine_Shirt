<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Mail\InvoiceMail;
use App\Models\Customer;
use App\Models\OrderItem;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

use App\Mail\OrderCanceled;
use App\Mail\OrderClosed;
use App\Mail\OrderPaid;
use App\Mail\OrderMade;


class OrderController extends Controller
{
    public function __construct()
    {
        //$this->AuthorizeResource(Order::class, 'order');
    }

    public function index(Request $request): View
    {
        if (Auth::user()->user_type == 'C') {
            $orders = Order::with(['orderItems', 'customer'])->where('customer_id', Auth::user()->id)->orderByDesc('id')->paginate(21);
            return view('settings.orders')->with('orders', $orders)->with('page', 'Orders');#change
        } elseif (Auth::user()->user_type == 'E') {
            $orders = Order::with(['orderItems', 'customer'])->whereIn('status', ['paid', 'pending']);
        } else {
            $orders = Order::with(['orderItems', 'customer'])->orderByDesc('id');
        }

        $search_filter = $request->name_email ?? '';
        if ($search_filter != '') {
            $orders = $orders->where(function ($query) use ($search_filter) {
                $query->whereHas('customer.user', function ($query) use ($search_filter) {
                    $query->where('name', 'like', '%' . $search_filter . '%')
                        ->orWhere('email', 'like', '%' . $search_filter . '%');
                });
            });
        }

        if ($request->order_status == 'pending') {
            $orders = $orders->where('status', 'pending');
        } elseif ($request->order_status == 'paid') {
            $orders = $orders->where('status', 'paid');
        } elseif ($request->order_status == 'closed') {
            $orders = $orders->where('status', 'closed');
        } elseif ($request->order_status == 'canceled') {
            $orders = $orders->where('status', 'canceled');
        }

        if ($request->start_date)
        {
            if (strtotime($request->start_date))
            {
                $orders = $orders->where('date', '>=', $request->start_date);
            }
        }

        if ($request->end_date)
        {
            if (strtotime($request->end_date))
            {
                $orders = $orders->where('date', '<=', $request->end_date);
            }
        }

        $sort = $request->sort ?? 'Newest';
        if ($sort == 'Newest') {
            $orders = $orders->orderBy('created_at', 'desc');
        } elseif ($sort == 'Oldest') {
            $orders = $orders->orderBy('created_at', 'asc');
        }


        $orders = $orders->paginate(21);
        return view('dashboard.orders.index')->with('orders', $orders)->with('order_status', $request->order_status)->with('name_email', $search_filter)->with('start_date', $request->start_date)->with('end_date', $request->end_date)->with('sort', $sort);
    }

    public function show(Order $order): View
    {
        $admin = Auth::user()->user_type == 'A';
        return view('dashboard.orders.show')
            ->with('order', $order)
            ->with('admin', $admin);
    }

    public function create(): View
    {
        $cart = session('cart', []);
        $total_price = session('total_price', 0);
        return view('cart.checkout')
            ->with('cart', $cart)->with('total_price', $total_price);
    }

    public function store(OrderRequest $request): View
    {
        try {
            $cart = session('cart', []);
            $total_price = session('total_price', 0);
            $order = null;
            $user = null;
            if ($cart) {
                DB::transaction(function () use ($request, &$order) {
                    $total_price = session('total_price', 0);
                        $order = new Order();
                        $order->status = 'pending';
                        $order->date = date("Y-m-d");
                        $order->total_price = $total_price;
                        $order->nif = $request->nif;
                        $order->address = $request->address;
                        $order->payment_type = $request->payment_type;
                        $order->payment_ref = $request->payment_ref;
                        $order->notes = $request->notes ? $request->notes : '';
                        $order->customer_id = Auth::user()->id;
                        $filename = uniqid('pdf_receipt_') . '.pdf';

                        // Define a URL do recibo no objeto de pedido
                        $order->receipt_url = $filename;

                        // Salva o objeto de pedido no banco de dados
                        $order->save();

                        foreach (session('cart', []) as $item) {
                            $orderItem= new OrderItem();
                            $orderItem->order_id = $order->id;
                            $orderItem->tshirt_image_id = $item['id'];
                            $orderItem->qty = $item['qty'];
                            $orderItem->unit_price = $item['price'];
                            $orderItem->sub_total = $item['price'] * $item['qty'];
                            $orderItem->color_code = $item['color'];
                            $orderItem->size = $item['size'];
                            $orderItem->save();
                        }

                        $pdf = new Dompdf();
                        $pdf = PDF::loadView('dashboard.orders.showPDF', ['order' => $order]);
                        $pdf->render();
                        $output = $pdf->output();
                        Storage::disk('public')->put('pdf_receipts/' . $filename, $output);

                    $user = $order->customer->user;
                    Mail::to($user->email)->send(new OrderMade($order));
                });
            } else {
                return view('404')->withErrors(['error' => 'Error creating order. Please try again.']);
            }
            session(['cart' => []]);
            session(['total' => 0]);
            session(['total_price' => 0]);
            return view('cart.success')->with('order', $order)->with('cart', $cart)->with('total_price', $total_price);
        } catch (\Exception $e) {
            return view('404')->withErrors(['error' => 'Error creating order. Please try again.']);
        }
    }

    public function update(Order $order, Request $request): RedirectResponse
    {
        $action = $request->action;
        $user = $order->customer->user;

        if ($action == null) {
            return redirect()->route('orders.index')->withErrors(['error' => 'Invalid action.']);
        }
        if ($action == "Mark as Paid") {
            $order->status = "paid";
            Mail::to($user->email)->send(new OrderPaid($order));
        } elseif ($action == "Mark as Closed") {
            $order->status = "closed";
            Mail::to($user->email)->send(new OrderClosed($order));
        } elseif ($action == "Cancel") {
            $order->status = "canceled";
            Mail::to($user->email)->send(new OrderCanceled($order));
        }
        $order->save();
        return redirect()->route('orders.index');
    }


    public function edit(Order $order): View
    {
        return view('dashboard.orders.show')
            ->with('order', $order);
    }
}
