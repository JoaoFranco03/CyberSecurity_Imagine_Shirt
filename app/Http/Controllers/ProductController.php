<?php

namespace App\Http\Controllers;

use App\Http\Requests\OwnProductRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Models\Curso;
use App\Models\Disciplina;
use App\Models\Product;
use App\Models\Price;
use App\Models\Color;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;


class ProductController extends Controller
{
    public function __construct()
    {
//        $this->AuthorizeResource(Product::class, 'product');
    }

    public function index(Request $request): View
    {
        $search_filter = $request->search ?? '';
        $current_color = $request->color ?? 'fafafa';
        $category = $request->query('category', []);
        $current_color = Color::where('code', $current_color)->first();
        $sort = $request->sort ?? 'Newest';


        $products = Product::query();
        $products->where(function ($query) {
            $query->whereNull('customer_id');
            if (Auth::check() && Auth::user()->user_type == 'C') {
                $query->orWhere('customer_id', Auth::user()->id);
            }
        });


        if ($category != null) {
            $products->whereIn('category_id', $category);
        }

        if ($search_filter) {
            $products->where(function ($query) use ($search_filter) {
                $query->where('name', 'like', '%' . $search_filter . '%')
                    ->orWhere('description', 'like', '%' . $search_filter . '%');
            });
        }

        //Sort
        if ($sort == 'Newest') {
            $products = $products->orderBy('created_at', 'desc');
        } elseif ($sort == 'Alphabetical') {
            $products = $products->orderBy('name', 'asc');
        } elseif ($sort == 'Popularity') {
            $products = Product::withCount(['order_items as total_qty' => function ($query) {
                $query->select(DB::raw('sum(qty)'));
            }])
                ->orderByDesc('total_qty');

        }

        $products = $products->paginate(16);
        $prices = Price::all();
        $categories = Categorie::orderBy('name')
            ->get();
        $colors = Color::select("*")
            ->orderBy('code', 'desc')
            ->get();
        return view('products.index')
            ->with("products", $products)
            ->with("select_categories", $category)
            ->with("prices", $prices[0])
            ->with("categories", $categories)
            ->with("search_filter", $search_filter)
            ->with("colors", $colors)
            ->with("current_color", $current_color)
            ->with("sort_method", $sort);
    }

    public function edit(Product $product): View
    {
        $categories = Categorie::All();
        return view('dashboard.prints.edit')->with('product', $product)->with('categories', $categories);
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        try {
            DB::transaction(function () use ($request, $product) {
                $product->name = $request->name;
                $product->description = $request->description;

                if ($request->category != 0)
                {
                    $product->category_id = $request->category;
                } else {
                    $product->category_id = null;
                }

                if ($request->hasFile('image_url')) {
                    if ($product->image_url) {
                        Storage::delete('public/tshirt_images/' . $product->image_url);
                    }
                    $path = $request->image_url->store('public/tshirt_images');
                    $product->image_url = basename($path);
                }

                $product->save(); // Realizar a atualização

            });
        } catch (\Exception $e) {
            return redirect()->route('home')->withErrors(['error' => 'Error updating product. Please try again.' . $e->getMessage()]);
        }

        return redirect()->route('prints.index');
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        try {
            $product = null;
            DB::transaction(function () use ($request, &$product) {
                $product = new Product();
                $product->name = $request->name;
                $product->description = $request->description;
                $product->image_url = $request->image_url;

                if ($request->category != 0)
                {
                    $product->category_id = $request->category;
                }

                if ($request->hasFile('image_url')) {
                    $path = $request->image_url->store('public/tshirt_images');
                    $product->image_url = basename($path);

                }
                $product->save();
            }
            );

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->route('home')->withErrors(['error' => 'Error creating product. Please try again.' . $e->getMessage()]);
        }
    }

    public function removeProduct(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('prints.index');
    }


    public function show(Product $product, Request $request): View
    {
        $color = $request->query('color_choice', 'fafafa');

        $prices = Price::all();
        if ($product->customer_id == null) {
            $price = $prices[0]->unit_price_catalog;
        } else {
            $price = $prices[0]->unit_price_own;
        }
        $colors = Color::select("*")
            ->orderBy('code', 'desc')
            ->get();

        $suggestions = Product::whereNull('customer_id')
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('products.show')
            ->with('product', $product)
            ->with("price", $price)
            ->with("colors", $colors)
            ->with("color", $color)
            ->with("suggestions", $suggestions);
    }

    public function adminIndex(Request $request): View
    {
        // <option value="A_Z" selected>Name: A to Z</option>
        // <option value="Z_A">Name: Z to A</option>
        // <option value="Description_A_Z">Description: A to Z</option>
        // <option value="Description_Z_A">Description: Z to A</option>
        // <option value="Newest">Newest Prints</option>
        // <option value="Oldest">Oldest Prints</option>
        $products = Product::whereNull('customer_id');

        $sort = $request->sort ?? 'A_Z';
        if ($sort == 'A_Z') {
            $products = $products->orderBy('name', 'asc');
        } elseif ($sort == 'Z_A') {
            $products = $products->orderBy('name', 'desc');
        } elseif ($sort == 'Description_A_Z') {
            $products = $products->orderBy('description', 'desc');
        } elseif ($sort == 'Description_Z_A') {
            $products = $products->orderBy('description', 'asc');
        } elseif ($sort == 'Newest') {
            $products = $products->orderBy('created_at', 'desc');
        } elseif ($sort == 'Oldest') {
            $products = $products->orderBy('created_at', 'asc');
        }

        $products = $products->paginate(21);
        return view('dashboard.prints.index')
            ->with('products', $products)
            ->with('sort', $sort);
    }

    public function adminShow(Product $product): View
    {

        return view('dashboard.prints.show')
            ->with('product', $product);
    }

}
