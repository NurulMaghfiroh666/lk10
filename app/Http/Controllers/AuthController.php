<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilan Form Login
    public function showLogin() {
        return view('auth.login');
    }

    // Aksi Pengolahan Data Login
    public function login(Request $request) {
        // Validasi data input [cite: 31, 57]
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $credentials = $request->only('email', 'password');

        // Proses pencocokan kredensial dengan database [cite: 57]
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Pengalihan halaman berdasarkan hak akses (Role) 
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->role === 'staff') {
                return redirect()->intended('/staff/dashboard');
            }
            return redirect()->intended('/dashboard'); // default role untuk customer [cite: 61]
        }

        // Kembalikan ke login jika data tidak cocok dengan pesan error session [cite: 57]
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // Tampilan Form Register 
    public function showRegister() {
        return view('auth.register');
    }

    // Aksi Pengolahan Data Register [cite: 63]
    public function register(Request $request) {
        // Validasi input register 
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed', // Validasi konfirmasi password 
        ]);

        // Input data pendaftar baru ke database [cite: 63]
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'customer', // Pendaftar baru otomatis memiliki hak akses customer [cite: 46]
            'status' => 'active',
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Aksi Proses Logout 
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}