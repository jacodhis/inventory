<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReceiptController;
use  App\Http\Controllers\CustomerController;
use  App\Http\Controllers\CartController;
use  App\Http\Controllers\SalesController;
use App\Http\Controllers\GeneratePdf;
use App\Http\Controllers\CategoryController;

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
  Route::get('/user/{user}','show')->name('user.show');
  Route::get('/user/delete/{user}','delete')->name('user.delete');
  Route::Post('/user/update/{user}','update')->name('user.update');
  Route::Post('/user/store','store')->name('user.store');
 
});

Route::controller(CategoryController::class)->middleware(['auth','superadmin'])->group(function(){
  Route::get('/categories','index')->name('categories');
  Route::get('/category/create','create')->name('category.create');
  Route::get('/category/edit/{category}','edit')->name('category.edit');
  Route::get('/category/update/{category}','update')->name('category.update');
  Route::get('/category/show/{category}','show')->name('category.show');
  Route::get('/category/delete/{category}','delete')->name('category.delete');
  Route::Post('/category/update/{category}','update')->name('category.update');
  Route::Post('/category/store','store')->name('category.store');
 
});


Route::controller(ProductController::class)->middleware('auth')->group(function () {
    Route::get('products/all-products','index')->name('all.products');

    Route::get('products/added','added')->name('products.added')->middleware('adminSuperAdmin');
    Route::get('product/delete/{product}','delete')->name('product.delete')->middleware('superadmin');
    Route::get('product/insert/{product}','insert')->name('product.insert')->middleware('superadmin');
    Route::get('products/all-products/removed','deletedProducts')->name('products.deleted')->middleware('superadmin');
    Route::get('product/{product}','show')->name('product.show')->middleware('adminSuperAdmin');

    Route::get('product/edit/{product}','edit')->name('product.edit')->middleware('admin');
    Route::get('products/create','create')->name('product.create')->middleware('admin');
    Route::post('products/store','store')->name('product.store')->middleware('admin');
    Route::post('product/update-add/{product}','updateadd')->name('product.addupdated')->middleware('admin');
    Route::post('product/update-product/{product}','update')->name('product.update')->middleware('admin');

  
});


Route::controller(CartController::class)->middleware('auth')->group(function () {

  Route::get('/cart', 'my_cart_items')->name('cart.items');
  Route::post('/cart-remove/{product}','cart_remove')->name('cart-remove');
  Route::post('add-to-cart/{product}','add_to_cart')->name('cart.addtocart');
 
   
});   
Route::controller(SalesController::class)->middleware('auth')->group(function(){
  Route::get('/sales', 'all_sales')->name('sales')->middleware('adminSuperAdmin');
  Route::post('/sales', 'store')->name('sales.store')->middleware('retailer');;
});

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
