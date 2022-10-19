<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::all();

        $product_rate = Product::orderBy('rating', 'desc')->take(18)->get();

        if ($q = request('key')) {
            $category = Category::where('name', 'like', '%'.$q.'%')->first();

            if ($category) {
                return redirect()->route('category', $category);
            }
        }
        $products = Product::query()
            ->when(request('key'), function (Builder $query, $search): void {
                $query
                    ->whereFulltext('name', $search)
                    ->orWhere('name', 'like', "%{$search}%")
                    ->orWhereFulltext('content', $search)
                    ->orWhere('content', 'like', "%{$search}%")
                    ->orWhereHas('tags', function (Builder $query) use ($search): void {
                        $query
                            ->whereFulltext('name', $search)
                            ->orWhere('name', 'like', "%{$search}%")
                        ;
                    })
                ;
            })
            ->orderBy('created_at', 'desc')
            ->paginate(30)
        ;

        return view('pages.welcome', compact(['categories', 'products', 'product_rate']));
    }

    public function category($id)
    {
        $categories = Category::all();

        $products = Product::where('category_id', $id)->paginate(18);
        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            if ('price_asc' === $sort_by) {
                $products = Product::where('category_id', $id)->orderBy('price', 'asc')->paginate(30);
            } elseif ('price_desc' === $sort_by) {
                $products = Product::where('category_id', $id)->orderBy('price', 'desc')->paginate(30);
            } elseif ('name_asc' === $sort_by) {
                $products = Product::where('category_id', $id)->orderBy('name', 'asc')->paginate(30);
            } elseif ('name_desc' === $sort_by) {
                $products = Product::where('category_id', $id)->orderBy('name', 'desc')->paginate(30);
            }
        } else {
            $products = Product::where('category_id', $id)->paginate(30);
        }

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

        return view('pages.product', compact('product', 'productsInCategory', 'ratingAvg', 'contents', 'name', 'ratings'));
    }
}
