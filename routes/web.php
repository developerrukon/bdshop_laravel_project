<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;

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
//frontend controller
Route::controller(HomeController::class)->name('frontend.')->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/product-details/{id}',  'product_details')->name('product_details');
    Route::post('/add-cart/{id}',  'add_cart')->name('add_cart');
    Route::get('/show-cart',  'show_cart')->name('show_cart');
    Route::delete('/delete-cart{id}',  'destroy_cart')->name('destroy_cart');
    Route::get('/cash-order',  'cash_order')->name('cash_order');
    Route::get('/stripe/{price}',  'stripe')->name('stripe');
    Route::post('/stripe-post/{price}',  'stripe_post')->name('stripe_post');

});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//backend controller//-----
Route::middleware('auth')->get('/redirect', [HomeController::class, 'redirect'])->name('backend.redirect');
//category route
Route::controller(CategoryController::class)->name('backend.category.')->group(function(){
    Route::get('/all_Category', 'index')->name('index');
    Route::post('/add_Category', 'store')->name('store');
    Route::get('/delete_Category/{id}', 'destroy')->name('destroy');

});
//product route
Route::controller(ProductController::class)->name('backend.product.')->group(function(){
    Route::get('/all_Product', 'index')->name('index');
    Route::get('/add_Product', 'create')->name('create');
    Route::post('/store_Product', 'store')->name('store');
    Route::get('/edit_Product/{id}', 'edit')->name('edit');
    Route::post('/update_Product/{id}', 'update')->name('update');
    Route::get('/delete_Product/{id}', 'destroy')->name('destroy');

});
