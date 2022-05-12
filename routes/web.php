<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReceiptController;
use  App\Http\Controllers\CustomerController;
use  App\Http\Controllers\CartController;
use  App\Http\Controllers\SalesController;
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

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/dashboard',function(){
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::controller(UsersController::class)->middleware('auth')->group(function(){
  Route::get('/users','index')->name('users');
  Route::get('/user/create','create')->name('user.create');
  Route::get('/user/edit/{id}','edit')->name('user.edit');
  Route::get('/user/{id}','show')->name('user.show');
  Route::get('/user/delete/{id}','delete')->name('user.delete');
  Route::Post('/user/update/{id}','update')->name('user.update');
  Route::Post('/user/store','store')->name('user.store');
 
});


Route::controller(ProductController::class)->middleware('auth')->group(function () {
    Route::get('products/all-products','index')->name('all.products');
    Route::get('products/added','added')->name('products.added');
    Route::get('products/sold','sold')->name('products.sold');
    Route::get('product/delete/{id}','delete')->name('product.delete');
    Route::get('product/insert/{id}','insert')->name('product.insert');
    Route::get('products/all-products/removed','deletedProducts')->name('products.deleted');
    Route::get('product/{id}','show')->name('product.show');
    Route::get('product/edit/{id}','edit')->name('product.edit');
    Route::get('products/create','create')->name('product.create');
    Route::post('products/store','store')->name('product.store');
    // Route::post('product/update-sold/{id}','updatesold')->name('product.soldupdated');
    Route::post('product/update-add/{id}','updateadd')->name('product.addupdated');
    Route::post('product/update-product/{id}','update')->name('product.update');

  
});


Route::controller(CartController::class)->middleware('auth')->group(function () {

  Route::get('/cart', 'my_cart_items')->name('cart.items');
  Route::post('/cart-remove/{id}','cart_remove')->name('cart-remove');
  Route::post('add-to-cart/{id}','add_to_cart')->name('cart.addtocart');
 
   
});   
Route::controller(SalesController::class)->middleware('auth')->group(function(){
  Route::get('/sales', 'all_sales')->name('sales');
  Route::post('/sales', 'store')->name('sales.store');
});
 
Route::controller(ReceiptController::class)->middleware('auth')->group(function () {

  Route::get('receipt-index','create')->name('receipt.index');
});   

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
