<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('/welcome', ['title' => "Belajar-Laravel-8"]);
// });
// Route::get('/main', function () {
//     return view('/main', ['title' => "Belajar-Laravel-8"]);
// });

/* Dashb */
// Route::get('dashboard', function(){
//     return view('dashb');
// });

// Route::get('users', function(){
//     return view('user.data', ['title' => 'Ini Hal User']);
// });
// Route::get('customers', function(){
//     return view('customer.data', ['title' => 'Ini Hal Customer'] );
// });
Auth::routes();




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'ceklevel:1,2,'])->group(function () {
Route::get('/', [DashboardController::class, 'dashbmethod'])->name('/');
});

Route::middleware(['auth', 'ceklevel:1,'])->group(function () {

    /* Product */
    // Route::get('/hal-products', [ProductsController::class, 'productmethod']);
    Route::get('/hal-products', [ProductsController::class, 'productmethod'])->name('products');
    Route::post('/addproducts',[ProductsController::class, 'addproductmethod']);
    // success update
    Route::patch('/updateproducts',[ProductsController::class, 'updateproductmethod']);
    Route::get('/successupdate', [ProductsController::class, 'successupdatemethod']);
    // Route::delete('/deleteproducts.{id}',[ProductsController::class, 'deleteproductmethod']);
    Route::delete('/deleteproducts/{id}',[ProductsController::class, 'deleteproductmethod']);

});

Route::middleware(['auth', 'ceklevel:2,'])->group(function () {
    Route::get('/users', [UsersController::class,'index']);
});

Route::middleware(['auth', 'ceklevel:3,'])->group(function () {
    Route::get('/customers', [CustomersController::class,'index']);
});
