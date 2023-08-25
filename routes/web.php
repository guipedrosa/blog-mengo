<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopOrderController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Orders history for User
Route::get('/user-orders', [ProfileController::class, 'ordersHistory']);

require __DIR__.'/auth.php';

// Blog
Route::get('/blog', [PostController::class, 'index'])->name('blog');

// Shop
Route::controller(ProductController::class)->group(function(){
    Route::get('/', 'showcase');  
    Route::get('/products', 'showcase');    
    Route::get('/product/{id}', 'show');
});

Route::controller(ShopOrderController::class)->group(function(){
    Route::get('/checkout/payment', 'pay');
    Route::post('/checkout', 'checkout');
    Route::get('/congratulations/{product:id}', 'congratulations')->name('congratulations');
    // Route::get('/checkout/{product:id}', 'checkout');
});

// Blog posts
Route::get('/{post:slug}', [PostController::class, 'show'])->name('view');