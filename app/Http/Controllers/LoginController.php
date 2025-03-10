<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('index', [
            'tittle' => 'Login || Sistem Informasi Manajemen Laptop'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:4',
            'password' => 'required'
        ]);

        $username = $request->username;

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->level == 1 &&  auth()->user()->username === $username) {
                return redirect()->intended('/dashboard');
            } elseif (auth()->user()->level == 2 &&  auth()->user()->username === $username) {
                return redirect()->intended('/dashboard');
            }
        }
        return back()->with('loginError', 'Login Failed!!!');
    }

    public function logout(Request $request)
    {
        // hapus session
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
