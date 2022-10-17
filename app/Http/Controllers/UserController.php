<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Role;
use App\Models\User;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $roles = Auth::user()->roles()->get();
        if ($roles->contains('name', 'admin')) {
            $users = User::query()
                ->when(request('key'), function (Builder $query, $search): void {
                $query
                    ->where('name', $search)
                    ->orWhere('name', 'like', "%{$search}%")
                    ->orWhere('email', $search)
                    ->orWhere('email', 'like', "%{$search}%")
                ;
            })
                ->orderBy('created_at', 'desc')
                ->paginate(30)
            ;

            return view('admin.user.index', compact('users'));
        }

        return abort(401);
    }

    public function create()
    {
        $roles = Role::all();

        return view('admin.user.add', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $users = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'email_verified_at' => now(),
            ]);

            $users->roles()->attach($request->role_id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $rolesOfUser = $user->roles();

        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,

                'email_verified_at' => now(),
            ]);
            $users = User::find($id);
            $users->roles()->sync($request->role_id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function delete($id)
    {
        try {
            User::find($id)->delete();

            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        } catch (\Exception $e) {
            Log::error('message: '.$e->getMessage().' line: '.$e->getLine());

            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }

    public function rating(Request $request)
    {
        $request->validate([
            'rating' => 'required',
            'content' => 'required',
        ]);
        $orders = Auth::user()->customer?->orderFlowers;
        if (! $orders) {
            $orders = collect();
        }

        try {
            DB::beginTransaction();
            // check order
            $checkOrder = $orders->where('product_id', $request->product_id)->first();
            if ($checkOrder) {
                if (Rating::where('user_id', $request->user_id)->where('product_id', $request->product_id)->exists()) {
                    Rating::where('user_id', $request->user_id)->where('product_id', $request->product_id)->update([
                        'rating' => $request->rating,
                        'content' => $request->content,
                    ]);
                } else {
                    $rating = Rating::create([
                        'user_id' => Auth::id(),
                        'product_id' => $request->product_id,
                        'rating' => $request->rating,
                        'content' => $request->content,
                        'name' => Auth::user()->name,
                    ]);
                }
                $product = Product::find($request->product_id);
                $product->update([
                    'rating' => $request->rating,
                ]);
            } else {
                return redirect()->back()->with('alert', 'Bạn chưa mua sản phẩm này nên không thể đánh giá!');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return redirect()->back()->with('success', 'Rating created successfully');
    }

    public function inUser()
    {
        return view('pages.inforuser');
    }
}
