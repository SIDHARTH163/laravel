<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Models\Cart;
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
// user routes
Route::get('/login', function () {
    return view('login');
});
Route::post("/login",[UserController::class,'ulogin']);
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});
Route::get("/",[ProductsController::class,'index']);
Route::get("detail/{id}",[ProductsController::class,'detail']);
Route::post("add_to_cart",[ProductsController::class,'addToCart']);
Route::get("search",[ProductsController::class,'search']);
Route::get("cartlist",[ProductsController::class,'cartList']); 
Route::get("removecart/{id}",[ProductsController::class,'removeCart']); 
Route::get("ordernow",[ProductsController::class,'orderNow']); 
Route::post("orderplace",[ProductsController::class,'orderPlace']);
Route::get("myorders",[ProductsController::class,'myOrders']);
Route::get('customerorders',[ProductsController::class,'orders']);
Route::get('addadmin', function () {
    return view('admin.adminreg');
});

// userroutes ends ther
// admin dashboard routess
Route::get('/adminlogin', function () {
    return view('admin.adminlogin');
});
Route::post("/adminlogin",[UserController::class,'login']);
// // insert data or products route

Route::post("/adminregister",[UserController::class,'adminregister']);
Route::get('/logout', function () {
  Session::forget('user');
   return redirect('/');
});

// Route::get('admin', function () {
// return view('admin.orders');
// });
// Route::get('view', function () {
//     return view('admin.viewallproducts');
//     });

Route::get('customers',[UserController::class,'customers']);
// add products to database 
Route::get('customerorders',[ProductsController::class,'customerorders']);
Route::get('addproducts',[ProductsController::class,'view']);
Route::Post('insert',[ProductsController::class,'insert']);
// Route::Post('insert', 'App\Http\Controllers\ProductsController@insert');
Route::get('viewproducts',[ProductsController::class,'show']);
Route::get('delete/{id}',[ProductsController::class,'destroy']);
Route::get('edit/{id}',[ProductsController::class,'showData']);
Route::post('edit',[ProductsController::class,'update']);
