<?php


use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','is.user'])->group(function () {
    Route::resource('/dashboard',DashboardController::class)->names('dashboard');
    Route::post('/dashboard/filter', [DashboardController::class,'filter'])->name('dashboard.filter');
    Route::get('/dashboard/{beasiswa}', [DashboardController::class, 'show'])->name('dashboard.show');

});

Route::middleware(['auth','is.admin'])->group(function () {
    Route::get('/admin', function () {
        return view('dashboard.admin');
    })->name('admin');

    Route::resource('/admin/beasiswa', BeasiswaController::class)->names('admin.beasiswa');
    Route::resource('/admin/user', UserController::class)->names('admin.user');

});



Route::get('/informasi', function () {
    return view('informasi');
})->name('informasi');
Route::get('/tutorial', function () {
    return view('tutorial');
})->name('tutorial');

require __DIR__.'/auth.php';