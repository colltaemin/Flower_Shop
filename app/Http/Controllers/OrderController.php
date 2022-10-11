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
                // update customer
                $customers->update([
                    'name' => $request->name_buy,
                    'email' => $request->email,
                ]);
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
                    'price' => $value['price'] * $value['quantity'],
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        if ('Thanh toán khi nhận hàng' === $request->paid_at) {
            Mail::send('Mail.sendmail', compact('customers', 'order'), function ($email) use ($customers): void {
                $email->to($customers->email, $customers->name);
                $email->subject('Xác nhận đơn hàng');
            });
            Session::forget('cart');

            return redirect()->route('home')->with('success', 'User created successfully');
        }

        if ('Thanh toán qua ví điện tử' === $request->paid_at) {
            return redirect()->to(route('momo_payment'));
        }
    }

    public function momoCheck(Request $request)
    {
        $resultCode = $request->get('resultCode');
        if (0 === $resultCode) {
            Session::forget('cart');

            return redirect()->route('home')->with('success', 'User created successfully');
        }

        // delete order and orderflower in database
        $order = Order::orderBy('id', 'desc')->first();
        $order->delete();

        return redirect()->route('home')->with('success', 'User created successfully');
    }

    public function index()
    {
        $orders = Order::paginate(10);

        $orderFlowers = OrderFlower::with('order')->get();
        if ($key = request()->key) {
            $orders = Order::where('name', 'like', '%'.$key.'%')->orderBy('created_at', 'desc')->paginate(12);
        }
        // dd($orderFlowers);

        return view('admin.order.index', compact('orders', 'orderFlowers'));
    }

    public function storeStatus(Request $request)
    {
        $order = Order::find($request->id);
        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function sendMail(): void
    {
    }
}
