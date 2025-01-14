<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Price;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'about',
            'index',
        ]]);;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::whereNull('customer_id')->offset(0)->limit(3)->get();
        $price = Price::all()[0]->unit_price_catalog;
        return view('homepage.index')->with("products", $products)->with("price", $price);
    }
}
