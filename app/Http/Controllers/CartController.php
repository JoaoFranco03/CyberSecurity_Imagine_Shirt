<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Color;

class CartController extends Controller
{
    protected $priceController;

    public function __construct(PriceController $priceController)
    {
        $this->priceController = $priceController;
    }

    public function index(): View
    {
        return view('cart.show');
    }

    public function show(): View
    {
        $cart = session('cart', []);
        $total = session('total');
        $total_price = session('total_price', 0);
        $colors = Color::all();
        return view('cart.show', compact('cart', 'total', 'total_price', 'colors'));
    }


    public function addToCart(CartRequest $request, Product $t_shirt): RedirectResponse
    {
        $cart = session('cart', []);
        $total = session('total', 0);
        $total_price = session('total_price', 0);

        if ($t_shirt) {
            $unique_id = $t_shirt->id . '_' . $request->color . '_' . $request->size;
            $color_name = DB::table('colors')->where('code', $request->color)->value('name');
        } else {
        }
        $custormer_id = DB::table('tshirt_images')->where('id', $t_shirt->id)->value('customer_id');
        if ($custormer_id != null) {
            $propria = true;
        } else {
            $propria = false;
        }

        $price_tshirt = $this->priceController->unit_price($request->qty, $propria);

        if (array_key_exists($unique_id, $cart)) {
            $cart[$unique_id]['qty'] += intval($request->qty);
        } else {
            $id = ['id' => $t_shirt->id,
                'unique_id' => $unique_id,
                'image_url' => $t_shirt->image_url,
                'name' => $t_shirt->name,
                'color' => $request->color,
                'color_name' => $color_name,
                'size' => $request->size,
                'qty' => intval($request->qty),
                'price' => number_format($price_tshirt, 2, '.'),
                'subtotal' => number_format($price_tshirt * $request->qty, 2, '.'),
            ];

            $cart[$unique_id] = $id;
            $total_price = number_format($price_tshirt * $request->qty + $total_price, 2, '.');
            $total++;
            session(['total' => $total]);
            session(['total_price' => $total_price]);
        }
        session(['cart' => $cart]);
        return back();
    }

       public function removeFromCart($id): RedirectResponse
    {
        $cart = session('cart', []);
        $total = session('total', 0);
        $total_price = session('total_price', 0);
        if (array_key_exists($id, $cart)) {
            $total_price -= $cart[$id]['subtotal'];
            unset($cart[$id]);
            $total--;

        }
        session(['cart' => $cart]);
        session(['total' => $total]);
        session(['total_price' => $total_price]);
        $url = route('cart.show');
//        $htmlMessage = "T-shirt <a href='$url'>#{$id}</a>foi removida do carrinho!";
        return back();
//            ->with('alert-msg', $htmlMessage)
//            ->with('alert-type', 'success');
    }

    public function destroy(): RedirectResponse
    {
        session(['cart' => []]);
        session(['total' => 0]);
        session(['total_price' => 0]);
        $htmlMessage = "Carrinho está limpo!";
        return back()
            ->with('alert-msg', $htmlMessage)
            ->with('alert-type', 'success');
    }

    public function store(): View
    {
        $cart = session('cart', []);
        $total_price = session('total_price', '0');
        return view('cart.checkout')->with('cart', $cart)->with('total_price', $total_price);
    }


    public function update(CartRequest $request, $id): RedirectResponse
    {
        $cart = session('cart', []);
        $total_price = session('total_price', 0);
        $t_shirt = $cart[$id]['id'];
        $custormer_id = DB::table('tshirt_images')->where('id', $t_shirt)->value('customer_id');

        $color_name = DB::table('colors')->where('code', $request->color)->value('name');

        if ($custormer_id != null) {
            $propria = true;
        } else {
            $propria = false;
        }

        $quantity = intval($request->qty);
        if ($quantity == 0) {
            return $this->removeFromCart($id);
        }
        $price_tshirt = $this->priceController->unit_price($quantity, $propria);
        $cart[$id] =
            ['id' => $cart[$id]['id'],
                'unique_id' => $cart[$id]['unique_id'],
                'image_url' => $cart[$id]['image_url'],
                'name' => $cart[$id]['name'],
                'color' => $request->color,
                'color_name' => $color_name,
                'size' => $request->size,
                'qty' => $quantity,
                'price' => $price_tshirt,
                'subtotal' => number_format($price_tshirt * $quantity, 2, '.')];

        $total_price = 0;
        foreach ($cart as $item) {
            $total_price += $item['subtotal'];
        }
        session(['cart' => $cart]);
        session(['total_price' => $total_price]);
        return back();
    }
}
