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
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminHomeController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $orderFlowers = OrderFlower::all();

        $total = 0;
        foreach ($orders as $order) {
            $total += $order->total;
        }

        $customers = Customer::all();
        $products = Product::all();
        $users = User::all();
        $rating = Rating::all();
        $rating5 = Rating::where('rating', 5)->get();
        $ratingAvg = Rating::avg('rating');
        $categories = Category::all();
        $role = Auth::user()->roles()->first()->name;

        if (Auth::check()) {
            $roles = Auth::user()->roles()->get();
            $role = Auth::user()->hasRole($roles);
            // dd($role);

            if (Auth::user()->hasRole($roles)) {
                return view('admin.home', compact('orders', 'orderFlowers', 'customers', 'products', 'users', 'total', 'ratingAvg', 'rating', 'rating5', 'categories', 'role'));
            }

            return abort(401);
        }

        return redirect()->route('login');
    }

    public function orderChart(Request $request)
    {
        $group = $request->query('group', 'month');

        $query = Order::select([
            DB::raw('count(*) as count'),
            DB::raw('SUM(total) as total'),
        ])
            ->groupBy([
                'label',
            ])
            ->orderBy('label')

        ;

        switch ($group) {
            case 'day':
                $query->addSelect(
                    DB::raw('DATE(created_at) as label')
                );
                $query->whereDate('created_at', '>=', Carbon::now()->startOfMonth());
                $query->whereDate('created_at', '<=', Carbon::now()->endOfMonth());
                $group_col = 'DATE(created_at) as label';

                break;

            case 'week':
                $query->addSelect(
                    DB::raw('WEEK(created_at) as label')
                );
                $query->whereDate('created_at', '>=', Carbon::now()->startOfWeek());
                $query->whereDate('created_at', '<=', Carbon::now()->endOfWeek());
                $group_col = 'WEEK(created_at) as label';

                break;

            case 'month':
                $query->addSelect(
                    DB::raw('MONTH(created_at) as label')
                );
                $query->whereYear('created_at', '>=', Carbon::now()->startOfYear());
                $query->whereYear('created_at', '<=', Carbon::now()->endOfYear());
                $group_col = 'MONTH(created_at) as label';

                break;

            case 'year':
                $query->addSelect(
                    DB::raw('YEAR(created_at) as label')
                );
                $query->whereYear('created_at', '>=', Carbon::now()->subYear(5)->year);
                $query->whereYear('created_at', '<=', Carbon::now()->addYear(4)->year);
                $group_col = 'YEAR(created_at) as label';

                // no break
            default:
            }

        $entries = $query->get();
        $labels = $total = $count = [];
        foreach ($entries as $item) {
            $labels[] = $item->label;
            $total[$item->label] = $item->total;
            $count[$item->label] = $item->count;
        }

        // dd($labels, $total, $count);

        return [
            'labels' => $labels,
            'group' => $group,
            'datasets' => [
                [
                    'label' => 'Thu nhập',
                    'data' => array_values($total),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                ],
                [
                    'label' => 'Số đơn hàng',
                    'data' => array_values($count),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];
    }
}
