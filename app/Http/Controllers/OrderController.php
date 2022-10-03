<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderFlower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use Session;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
        ]);

        try {
            DB::beginTransaction();

            if (Customer::where('phone', $request->phone_buy)->exists()) {
                $customers = Customer::where('phone', $request->phone_buy)->first();
            } else {
                $customers = Customer::create([
                    'name' => $request->name_buy,
                    'email' => $request->email,
                    'phone' => $request->phone_buy,
                ]);
            }

            $customers->orders()->create([
                'customer_id' => $customers->id,
                'name' => $request->name,
                'address' => $request->address,
                'district' => $request->district,
                'province' => $request->province,
                'phone' => $request->phone,
                'note' => $request->note,
                'message' => $request->message,
                'shipped_at' => $request->shipped_at,
                'paid_at' => $request->paid_at,
            ]);

            $order = Order::orderBy('id', 'desc')->first();
            foreach (Session::get('cart') as $key => $value) {
                $order->orderFlowers()->create([
                    'order_id' => $order->id,
                    'product_id' => $key,
                    'product_name' => $value['name'],
                    'quantity' => $value['quantity'],
                    'price' => $value['price'],
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }
        Mail::send('Mail.sendmail', compact('customers', 'order'), function ($email) use ($customers): void {
            $email->to($customers->email, $customers->name);
            $email->subject('Xác nhận đơn hàng');
        });
        Session::forget('cart');

        return redirect()->route('home')->with('success', 'User created successfully');
    }

    public function index()
    {
        $orders = Order::all();

        $orderFlowers = OrderFlower::with('order')->get();

        // dd($orderFlowers);

        return view('admin.order.index', compact('orders', 'orderFlowers'));
    }
}
