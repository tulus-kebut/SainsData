<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelompokPosyanduController;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // POSYANDU
    Route::get('/posyandu', [PosyanduController::class, 'index'])->name('posyandu');
    Route::get('/posyandu/create', [PosyanduController::class, 'create'])->name('posyandu.create');
    Route::post('/posyandu/create', [PosyanduController::class, 'store'])->name('posyandu.create');
    Route::get('/posyandu/edit/{id}', [PosyanduController::class, 'edit'])->name('posyandu.edit');
    Route::patch('/posyandu/edit/{id}', [PosyanduController::class, 'update'])->name('posyandu.update');
    Route::delete('/posyandu/delete/{id}', [PosyanduController::class, 'destroy'])->name('posyandu.delete');
    Route::get('/export', [PosyanduController::class, 'export'])->name('posyandu.export');

    // KELOMPOK POSYANDU
    Route::get('/kelompok-posyandu', [KelompokPosyanduController::class, 'index'])->name('kelompok-posyandu');
    Route::get('/kelompok-posyandu/create', [KelompokPosyanduController::class, 'create'])->name('kelompok-posyandu.create');
    Route::post('/kelompok-posyandu/create', [KelompokPosyanduController::class, 'store'])->name('kelompok-posyandu.create');
});

require __DIR__.'/auth.php';
