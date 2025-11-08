<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Proses login user.
     */
    public function loginAction(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        /*
       login
        */
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            
            switch ($user->role) {
                case 'admin':
                    return redirect()->intended('/admin/dashboard')->with('success', 'Selamat datang, Admin!');
                case 'petugas':
                    return redirect()->intended('/petugas/dashboard')->with('success', 'Selamat datang, Petugas!');
                case 'guru':
                    return redirect()->intended('/guru/dashboard')->with('success', 'Selamat datang, Guru!');
                default:
                    Auth::logout();
                    return redirect()->route('login')->withErrors('Role tidak dikenali.');
            }
        }
            /*
           Jika login nanti gagal
            */
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Logout user dari sistem.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
