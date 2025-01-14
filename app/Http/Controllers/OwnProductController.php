<?php

namespace App\Http\Controllers;

use App\Http\Requests\OwnProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Categorie;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class OwnProductController extends Controller
{
    public function destroy(Product $my_print): RedirectResponse
    {
        $my_print->delete();
        return redirect()->route('my_prints.index');

    }
    public function edit(Product $my_print): view
    {
        $categories = Categorie::All();
        return view('settings.edit_myprint')->with('product', $my_print)->with('categories', $categories);
    }

    public function update(UpdateProductRequest $request, Product $my_print): RedirectResponse
    {
        try {
            DB::transaction(function () use ($request, $my_print) {
                $my_print->name = $request->name;
                $my_print->description = $request->description;

                if ($request->category != 0)
                {
                    $my_print->category_id = $request->category;
                } else {
                    $my_print->category_id = null;
                }

                $my_print->save(); // Realizar a atualização

            });
        } catch (\Exception $e) {
            return redirect()->route('home')->withErrors(['error' => 'Error updating product. Please try again.' . $e->getMessage()]);
        }
        return redirect()->route('my_prints.index')->with('product', $my_print);
    }

    public function store(OwnProductRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request, &$t_shirt) {
            $t_shirt = new Product();
            $t_shirt->fill($request->all());
            $t_shirt->customer_id = Auth::user()->id;
        }
        );
        if ($request->image) {
            $img = $request->image;
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $file = md5(microtime() . date('Y-m-d')) . '.png';
            $success = file_put_contents('storage/tshirt_images/' . $file, $data);
            $t_shirt->image_url = $file;
        }

        $t_shirt->save();
        return redirect()->route('products.show', ['product' => $t_shirt]);
    }

    public function own_product()
    {
        $colors = Color::all();
        $default_color = $colors->first();
        $products = Product::whereNull('customer_id')->get();
        //dd($default_color);
        return view('create_your_own_tshirt.index')->with('colors', $colors)->with('default_color', $default_color)->with('products', $products);
    }

    public function index(): View
    {
        $products = Product::where('customer_id', Auth::user()->id)->get();
        return view('settings.my_prints')->with('products', $products)->with('page', 'Prints');
    }

}
