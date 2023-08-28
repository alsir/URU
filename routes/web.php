<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderitemController;
use App\Http\Controllers\ManfacturerController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Route::redirect('/', '/admin/login');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::prefix('admin')->middleware(['auth','web'])->group(function () {

    Route::get('/edit_profile',[ProfileController::class,'edit_profile']);
    Route::post('/update_profile',[ProfileController::class,'update_profile']);
    Route::post('/update_password',[ProfileController::class,'update_password']);
    Route::get('/order/someorders',[FilterController::class,'index']);
    Route::get('/ordering', [CartController::class, 'ordering']);
    Route::post('/ordering', [CartController::class, 'orderingComfirming']);
    Route::get('/cart', [CartController::class, 'cartList']);
    Route::post('/cart', [CartController::class, 'addToCart']);
    Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::resource('/category',CategoryController::class);
    Route::resource('/manfacturer',ManfacturerController::class);
    Route::resource('/orderitem',OrderitemController::class);
    Route::resource('/order',OrderController::class);
    Route::resource('/product',ProductController::class);
    Route::resource('/users',UserController::class);
    Route::get('/dashboard',[FrontendController::class,'index']);
    
});
require __DIR__ . '/auth.php';
