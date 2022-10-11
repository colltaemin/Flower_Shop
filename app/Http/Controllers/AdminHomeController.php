<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderFlower;
use App\Models\Product;
use App\Models\Rating;
use App\Models\User;

class AdminHomeController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $orderFlowers = OrderFlower::all();
        $total = $orderFlowers->sum('price');
        $customers = Customer::all();
        $products = Product::all();
        $users = User::all();
        $rating = Rating::all();
        $rating5 = Rating::where('rating', 5)->get();
        $ratingAvg = Rating::avg('rating');
        $categories = Category::all();

        return view('admin.home', compact('orders', 'orderFlowers', 'customers', 'products', 'users', 'ratingAvg', 'total', 'rating', 'rating5', 'categories'));
    }
}
