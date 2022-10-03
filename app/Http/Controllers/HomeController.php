<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::all();

        $products = Product::orderBy('created_at', 'desc')->paginate(30);

        return view('pages.welcome', compact(['categories', 'products']));
    }

    public function category($id)
    {
        $categories = Category::all();

        $products = Product::where('category_id', $id)->paginate(18);

        return view('pages.category', compact(['categories', 'products']));
    }

    public function product(Product $product)
    {
        $category = $product->category;
        $productsInCategory = Category::find($category->id)->products()->paginate(12);
        $ratingAvg = Rating::where('product_id', $product->id)->avg('rating');
        $name = Rating::where('product_id', $product->id)->get();
        $contents = Rating::where('product_id', $product->id)->get();
        $ratings = Rating::where('product_id', $product->id)->get();

        return view('pages.product', compact(['product'], ['productsInCategory'], ['ratingAvg'], ['contents'], ['name'], ['ratings']));
    }

    public function orderDetail()
    {
        return view('pages.orderlist');
    }
}
