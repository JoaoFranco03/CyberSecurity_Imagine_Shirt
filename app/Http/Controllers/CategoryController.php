<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(Request $request): View
    {
        $sort = $request->sort ?? 'ID_1to2';

        // <option value="ID_1to2" @if($sort == "ID_1to2")selected @endif>ID: Lowest to Biggest</option>
        // <option value="ID_2to1" @if($sort == "ID_2to1")selected @endif>ID: Biggest to Lowest</option>
        // <option value="A_Z" @if($sort == "A_Z")selected @endif>Name: A to Z</option>
        // <option value="Z_A" @if($sort == "Z_A")selected @endif>Name: Z to A</option>

        $categories= Categorie::select('*');

        if ($sort == 'ID_1to2') {
            $categories = Categorie::orderBy('id');
        } elseif ($sort == 'ID_2to1') {
            $categories = Categorie::orderByDesc('id');
        } elseif ($sort == 'A_Z') {
            $categories = Categorie::orderBy('name');
        } elseif ($sort == 'Z_A') {
            $categories = Categorie::orderByDesc('name');
        }
        $categories = $categories->paginate(21);


        return view('dashboard.categories.index')->with('categories', $categories)->with('sort', $sort);
    }

    public function destroy(Categorie $category): RedirectResponse
    {
        $count_tshirt = $category->products->count();
        if ($count_tshirt > 0) {
            return redirect()->route('categories.index')->withErrors(['error' => 'You can not delete this category because it has t-shirts']);
        }

        DB::transaction( function() use ($category) {
            $category->delete();
        });

        return redirect()->route('categories.index');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $request->validated();
        DB::transaction( function() use ($request, &$category) {
            $category = new Categorie();
            $category->name = $request->name;
            $category->save();
        });

        $category = Categorie::orderByDesc('name')->paginate(21);
        return back();
    }

    public function edit(Categorie $category): View
    {
        $count_tshirt = $category->products()->count();
        return view('dashboard.categories.edit')->with('category', $category)->with('count_tshirt', $count_tshirt);
    }

    public function update(CategoryRequest $request, Categorie $category): RedirectResponse
    {
        DB::transaction( function() use ($request, $category) {
            $category->name = $request->name;
            $category->save();
        });
        return redirect()->route('categories.index');
    }
}
