<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;

class DashboardController extends Controller
{

    public function __construct()
    {
        //$this->AuthorizeResource(User::class, 'user');
    }

    public function index(Request $request): View
    {
        $start_date = $request->start_date ?? '';
        $end_date = $request->end_date ?? '';

        $chart_data = Order::selectRaw("DATE_FORMAT(created_at, '%Y-%m') AS formatted_date, SUM(total_price) AS total, ROUND(AVG(total_price), 2) AS mean")
            ->groupBy('formatted_date');

        if ($request->start_date)
        {
            $chart_data = $chart_data->whereRaw("DATE_FORMAT(created_at, '%Y-%m') >= ?", [$request->start_date]);
        }

        if ($request->end_date)
        {
            $chart_data = $chart_data->whereRaw("DATE_FORMAT(created_at, '%Y-%m') <= ?", [$request->end_date]);
        }

        $chart_data = $chart_data->get();

        //top 10 users that spent more money on the store (sum of orders->total_price), dont use selectRaw, add the sum to the user
        $most_valuable_customers = Customer::with('orders')->get()->sortByDesc(function ($customer) {
            return $customer->orders->sum('total_price');
        })->take(10);

        $best_sellers = Product::whereNull('customer_id')->with('order_items')->get()->sortByDesc(function ($product) {
            return $product->order_items->sum('qty');
        })->take(10);

        $nProductsWithoutCategory = Product::whereNull('customer_id')->whereNull('category_id')->count();

        //get the list of category_id's and associate with the category name
        $categories = Categorie::all();
        $orders = Order::orderByDesc('id')->paginate(21);
        $num_orders = Order::count();
        $num_clients = Customer::count();
        $profit = Order::sum("total_price");

        return view('dashboard.index')->with('orders', $orders)
            ->with('num_orders', $num_orders)
            ->with('num_clients', $num_clients)
            ->with('profit', $profit)
            ->with('chart_data', $chart_data)
            ->with('most_valuable_customers', $most_valuable_customers)
            ->with('best_sellers', $best_sellers)
            ->with('best_sell', $best_sellers)
            ->with('categories', $categories)
            ->with('nProductsWithoutCategory', $nProductsWithoutCategory)
            ->with('start_date', $start_date)
            ->with('end_date', $end_date);
    }

    public function show(): View
    {
        return view('404');
    }
}
