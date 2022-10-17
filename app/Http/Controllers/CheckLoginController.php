<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Auth;

class CheckLoginController extends Controller
{
    public function checkLogin()
    {
        if (Auth::check()) {
            if (1 === Auth::user()->role_id) {
                return redirect()->route('index');
            }

            return redirect()->route('home');
        }

        return redirect()->route('login');
    }
}
