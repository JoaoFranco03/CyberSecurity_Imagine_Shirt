<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceRequest;
use App\Models\Price;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class PriceController extends Controller
{
    public function index()
    {
        $price = Price::first();
        return view('dashboard.prices.index')->with('price', $price);
    }

    public function edit()
    {
        $price = Price::first();
        return view('dashboard.prices.edit')->with('price', $price);
    }

    public function update(PriceRequest $request, Price $price)
    {
        $price->unit_price_catalog = $request->unit_price_catalog;
        $price->unit_price_catalog_discount = $request->unit_price_catalog_discount;
        $price->unit_price_own = $request->unit_price_own;
        $price->unit_price_own_discount = $request->unit_price_own_discount;
        $price->qty_discount = $request->qty_discount;
        $price->save();
        return redirect()->route('prices.index');
    }

    public function unit_price(Int $qtd, Bool $propria){
        $price = Price::first();
        if($propria){
            if($qtd >= $price -> qty_discount){
                return $price -> unit_price_own_discount;
            }else{
                return $price -> unit_price_own;
            }
        }else{
            if($qtd >= $price -> qty_discount){
                return $price -> unit_price_catalog_discount;
            }
        }
    return $price -> unit_price_catalog;
    }
}
