<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Alihkan rute utama aplikasi langsung ke halaman login
Route::get('/', function () {
    return redirect('/login');
});

// Group Route Guest: Hanya bisa diakses oleh user yang belum masuk sistem [cite: 26]
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login'); // [cite: 52]
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register'); // 
    Route::post('/register', [AuthController::class, 'register']);
});

// Group Route Terproteksi Auth: Harus login terlebih dahulu [cite: 26, 59]
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // 

    // Pasangkan view utama halaman To-Do List milikmu di sini
    Route::get('/dashboard', function () {
        return view('dashboard'); // Ubah bagian ini sesuai nama view to-do list kamu [cite: 61]
    })->name('dashboard');
    
    // Proteksi Khusus Role Admin 
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', function () {
            return "<h1>Selamat Datang di Halaman Utama Admin</h1>"; // 
        });
    });

    // Proteksi Khusus Role Staff 
    Route::middleware('role:staff')->group(function () {
        Route::get('/staff/dashboard', function () {
            return "<h1>Selamat Datang di Halaman Utama Staff</h1>"; // 
        });
    });
});

// Endpoint API Sederhana (JSON)
Route::get('/api/todos', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Data To-Do List',
        'data' => \App\Models\Todo::all()
    ]);
});