<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home'; // Tentukan rute setelah login berhasil



    public function showLoginForm($guard = null)
    {
        // Anda bisa menggunakan $guard untuk menentukan tampilan atau logika tambahan
        return view('auth.login', ['guard' => $guard]);
    }

    protected function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('user')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('users.order');
        } elseif (Auth::guard('userEvent')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('user-event.home');
        } elseif (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
