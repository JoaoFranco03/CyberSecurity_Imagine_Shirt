<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\View\View;

class StatsController extends Controller
{
    public function index(): View
    {
        $orders = Order::orderByDesc('id')->paginate(21);
        $num_orders = Order::count();
        $num_clients = Customer::count();
        $profit = Order::sum("total_price");
        return view('dashboard.stats')->with('orders', $orders)
        ->with('num_orders', $num_orders)
        ->with('num_clients', $num_clients)
        ->with('profit', $profit);
    }
}
