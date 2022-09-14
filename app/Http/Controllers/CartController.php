<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'quantity' => 'integer',
        ]);

        $product = Product::findOrFail($request->id);

        $cart = Session::get('cart');
        if (isset($cart[$product->id])) {
            ++$cart[$product->id]['quantity'];
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'quantity' => $product->quantity ?? 1,
                'price' => $product->price,
                'name' => $product->name,
            ];
        }
        Session::put('cart', $cart);

        return $this->getCart();
    }

    public function removeProduct(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        $product = Product::findOrFail($request->id);
        $cart = Session::get('cart');
        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
        }

        Session::put('cart', $cart);

        return $this->getCart();
    }

    public function getCart()
    {
        return Session::get('cart', []);
    }

    public function increaseQuantity(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        $product = Product::findOrFail($request->id);
        $cart = Session::get('cart');
        if (isset($cart[$product->id])) {
            ++$cart[$product->id]['quantity'];
        }

        Session::put('cart', $cart);

        return $this->getCart();
    }

    public function decreaseQuantity(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        $product = Product::findOrFail($request->id);
        $cart = Session::get('cart');

        if (isset($cart[$product->id])) {
            if ($cart[$product->id]['quantity'] > 1) {
                --$cart[$product->id]['quantity'];
            } else {
                unset($cart[$product->id]);
            }
        }

        Session::put('cart', $cart);

        return $this->getCart();
    }
}
