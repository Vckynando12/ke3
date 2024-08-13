<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarouselController;
use App\Models\Carousel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will be
| assigned to the "web" middleware group. Make something great!
|
*/

// Landing Page Route
Route::get('/', function () {
    $carousels = Carousel::all();
    return view('welcome', compact('carousels'));
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth:web')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Carousel Routes
    Route::resource('carousels', CarouselController::class);
});

// Auth Routes
// Auth Routes
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login']);
Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('admin/register', [AdminController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('admin/register', [AdminController::class, 'register']);

