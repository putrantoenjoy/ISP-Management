<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Pelanggan;
use App\Models\Tagihan;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    // user
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });
    
Route::middleware('auth')->group(function () {
    // dashboard
    Route::get('/dashboard', function () { 
        $totalPelanggan = Pelanggan::count();
        $pelangganAktif = Pelanggan::where('status_pelanggan', 'aktif')->count();
        $pelangganSuspend = Pelanggan::where('status_pelanggan', 'suspend')->count();
        $pelangganPutus = Pelanggan::where('status_pelanggan', 'putus')->count();
        $totalTagihanSudahBayar = Tagihan::where('status_pembayaran', 'lunas')->sum('nominal_tagihan');
        $totalTagihanBelumBayar = Tagihan::where('status_pembayaran', 'belum lunas')->sum('nominal_tagihan');
        $total = $pelangganAktif + $pelangganSuspend + $pelangganPutus;
        $aktifPercent = $total ? ($pelangganAktif / $total) * 100 : 0;
        $suspendPercent = $total ? ($pelangganSuspend / $total) * 100 : 0;
        $putusPercent = $total ? ($pelangganPutus / $total) * 100 : 0;

        return view('dashboard', compact('totalPelanggan', 'pelangganAktif', 'pelangganSuspend', 'pelangganPutus', 'totalTagihanSudahBayar', 'totalTagihanBelumBayar', 'aktifPercent', 'suspendPercent', 'putusPercent'));})
        ->name('dashboard');
    // pelanggan
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');
    // tagihan
    Route::get('/tagihan', [TagihanController::class, 'index'])->name('tagihan.index');
    Route::post('/tagihan', [TagihanController::class, 'store'])->name('tagihan.store');
    Route::patch('/tagihan/{id}', [TagihanController::class, 'update'])->name('tagihan.update');
    Route::delete('/tagihan/{id}', [TagihanController::class, 'destroy'])->name('tagihan.destroy');
});

require __DIR__.'/auth.php';
