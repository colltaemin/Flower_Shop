<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\OrderPostRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderFlower;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use Session;

class OrderController extends Controller
{
    public function store(OrderPostRequest $request)
    {
        try {
            DB::beginTransaction();

            if (Customer::where('email', $request->email)->exists()) {
                $customers = Customer::where('email', $request->email)->first();
                // update customer
                $customers->update([
                    'name' => $request->name_buy,
                    'phone' => $request->phone_buy,
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

            return redirect()->route('order-confrim')->with('success', 'User created successfully');
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

            return redirect()->route('order-confirm')->with('success', 'User created successfully');
        }

        // delete order and orderflower in database
        $order = Order::orderBy('id', 'desc')->first();
        $order->delete();

        return redirect()->route('home')->with('success', 'User created successfully');
    }

    public function index()
    {
        $orderFlowers = OrderFlower::with('order')->get();
        $orders = Order::query()
            ->when(request('key'), function (Builder $query, $search): void {
            $query
                ->where('name', $search)
                ->orWhere('name', 'like', "%{$search}%")
                ->orWhere('phone', $search)
                ->orWhere('phone', 'like', "%{$search}%")
            ;
        })
            ->orderBy('created_at', 'desc')
            ->paginate(30)
        ;

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

    public function listOrder()
    {
        $orders = Auth::user()->customer?->orders;

        if (! $orders) {
            $orders = collect();
        }

        $orderFlowers = OrderFlower::all();
        $productInOrder = OrderFlower::with('order')->get();

        return view('pages.orderlist', compact('orders', 'orderFlowers', 'productInOrder'));
    }

    public function show()
    {
        return view('pages.ordercustomer');
    }
}
