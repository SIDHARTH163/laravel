<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UController;
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

Route::get('/logout', function () {
    Session::forget('admin');
    return redirect('/')->with('danger', 'logged out successfully ');
});
Route::get('/logout1', function () {
    Session::forget('user');
    return redirect('/index')->with('danger', 'logged out successfully ');
});
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/index', function () {
//     return view('index');
// });
Route::get('/index',[UController::class,'index']);
Route::get('/pr',[UController::class,'pr']);
Route::get('/electronics',[UController::class,'electronics']);
Route::get('/fashion',[UController::class,'fashion']);
Route::get('/comingsoon',[UController::class,'soon']);
Route::get("detail/{id}",[UController::class,'detail']);


Route::get('/login', function () {
    return view('login');
});
Route::post("/userreg",[UserController::class,'usersignup']);
Route::post("/login",[UserController::class,'ulogin']);
Route::post("add_to_cart",[UController::class,'addToCart']);
Route::get("cartlist",[UController::class,'cartList']); 
Route::get("removecart/{id}",[UController::class,'removeCart']);
Route::get("ordernow",[UController::class,'orderNow']); 
Route::post("orderplace",[UController::class,'orderPlace']);
Route::get("myorders",[UController::class,'myOrders']);
Route::get("search",[UController::class,'search']);

// admin routes
Route::get('/admin', function () {
    return view('admin.alogin');
});
Route::Post("alogin",[UserController::class,'index']);
Route::Post("adminsignup",[UserController::class,'adminsignup']);
Route::get('/addproducts', function () {
    return view('admin.add_products');
});
Route::Post('insert',[ProductsController::class,'insert']);
Route::get('viewproducts',[ProductsController::class,'viewpr1']);
Route::get('viewproducts1',[ProductsController::class,'viewpr2']);
Route::get('viewproducts2',[ProductsController::class,'viewpr3']);
Route::get('delete/{id}',[ProductsController::class,'destroy']);
Route::get('edit/{id}',[ProductsController::class,'showData']);
Route::post('edit',[ProductsController::class,'update']);
Route::get('customerorders',[ProductsController::class,'customerorders']);
Route::get('customers',[UserController::class,'customers']);