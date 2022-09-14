<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::all();

        $products = Product::orderBy('created_at', 'desc')->paginate(30);

        return view('pages.welcome', compact(['categories', 'products']));
    }

    public function theme()
    {
        $categories = Category::all();

        $products = Product::orderBy('created_at', 'desc')->paginate(12);

        return view('pages.theme', compact(['categories', 'products']));
    }

    public function product(Product $product)
    {
        $category = $product->category;
        $productsInCategory = Category::find($category->id)->products()->paginate(12);

        return view('pages.product', compact(['product'], ['productsInCategory']));
    }
}
