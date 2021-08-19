<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $Prodcuts = Product::with(['galleries'])->latest()->paginate(8);
        return view('pages.categories', [
            'categories' => $categories,
            'products' => $Prodcuts
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        $Prodcuts = Product::with(['galleries'])->where('categories_id', $category->id)->latest()->paginate(8);
        return view('pages.categories', [
            'categories' => $categories,
            'products' => $Prodcuts
        ]);
    }
}
