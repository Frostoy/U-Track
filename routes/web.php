<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
<<<<<<< HEAD
=======
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ReportsController;
>>>>>>> 82482a3fdd4df5a2e47f9e364c988bc47fa270a4
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

<<<<<<< HEAD
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
=======
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('role:admin');
    Route::resource('inventory', InventoryController::class)
        ->names(['index' => 'inventory.index'])
        ->parameters(['inventory' => 'medicine'])
        ->middleware('role:admin');
    Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index')->middleware('role:admin,user');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// Route::get('/reports', function () {
//     return view('reports/index');
// });
>>>>>>> 82482a3fdd4df5a2e47f9e364c988bc47fa270a4
