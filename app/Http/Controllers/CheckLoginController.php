<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CheckLoginController extends Controller
{
    public function checkUserType()
    {
        if ('ADM' === Auth::user()->userType) {
            return redirect()->route('admin.home');
        }

        if ('USR' === Auth::user()->userType) {
            return redirect()->route('dashboard');
        }
    }
}
