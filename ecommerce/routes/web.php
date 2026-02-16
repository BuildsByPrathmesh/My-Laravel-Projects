<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');    
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('products', ProductController::class)->except(['index', 'show']);
});

Route::get('/products', [ProductController::class, 'index'])
    ->middleware('auth')
    ->name('products.index');

Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])
    ->name('admin.dashboard')
    ->middleware(['auth', 'admin']);


require __DIR__.'/auth.php';



