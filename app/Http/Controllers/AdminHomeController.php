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
use Auth;

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

        if (Auth::check()) {
            $roles = Auth::user()->roles()->get();
            $role = Auth::user()->hasRole($roles);
            // dd($role);

            if (Auth::user()->hasRole($roles)) {
                return view('admin.home', compact('orders', 'orderFlowers', 'customers', 'products', 'users', 'ratingAvg', 'total', 'rating', 'rating5', 'categories'));
            }

            return abort(401);
        }

        return redirect()->route('login');
    }
}
