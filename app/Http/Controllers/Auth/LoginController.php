<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->akses == 'admin' || $user->akses == 'operator') {
            return redirect()->route('operator.beranda');
        } elseif ($user->akses == 'wali') {
            return redirect()->route('wali.beranda');
        }

        // Jika akses tidak valid, logout dan redirect ke login
        Auth::logout();
        return redirect()->route('login')->with('error', 'Akses tidak valid!');
    }
}


