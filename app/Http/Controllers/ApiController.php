<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Product;

class ApiController extends Controller
{
    public function ajaxSearch()
    {
        return Product::where('name', 'like', '%'.request()->search.'%')->get();
    }
}
