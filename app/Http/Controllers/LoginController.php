<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * 🪪 Tampilkan halaman login.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Proses autentikasi .
     */
public function loginAction(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $credentials = $request->only('email', 'password');

    // Ambil user berdasarkan email dulu
    $user = \App\Models\User::where('email', $credentials['email'])->first();

    if ($user) {
        if (!$user->is_active) {
            // User dinonaktifkan
            return back()->withErrors([
                'email' => 'Akun Anda sedang dinonaktifkan.'
            ])->onlyInput('email');
        }

        // Cek login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return $this->redirectByRole($user->role);
        }
    }

    // Default: login gagal
    return back()->withErrors(['email' => 'Email atau password salah.'])->onlyInput('email');
}


    /**
     *
     */
    protected function redirectByRole(string $role)
    {
        switch ($role) {
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

    /**
     * log out
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
