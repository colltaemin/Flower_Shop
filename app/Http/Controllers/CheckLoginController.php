<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class CheckLoginController extends Controller
{
    public function checkLogin()
    {
        return route('admin.home');
    }
}
