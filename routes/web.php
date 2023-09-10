<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index'])->name("home");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class,'redirect']);
// admin conteoller

Route::get('/view_catagory',[AdminController::class,'view_catagory']); 
// catagory
Route::post('/add_catagory',[AdminController::class,'add_catagory']);

Route::get('delete_catagory/{id}',[AdminController::class,'delete_catagory']);// for deleting catgory item

Route::get('/view_product',[AdminController::class,'view_product']);

Route::post('/addproduct',[AdminController::class,'add_product']);

Route::get('/show_product',[AdminController::class,'show_product']);

Route::get('/delete_product/{id}',[AdminController::class,'delete_product']);

Route::get('/update_product/{id}',[AdminController::class,'update_product']);

Route::post('/update_Nproduct/{id}',[AdminController::class,'update_Nproduct']);

Route::get('/product_details/{id}',[HomeController::class,'product_details']); 

Route::post('/add_cart/{id}',[HomeController::class,'add_cart']); 

Route::get('/show_cart',[HomeController::class,'Show_cart']); 

Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']); 

Route::get('/cash_order',[HomeController::class,'cash_order']);

Route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);


Route::get('stripe/{$totalprice}',[HomeController::class,'stripePost'])->name('stripe.post');


Route::get('/order',[AdminController::class,'order']);

Route::get('/deliverd/{id}',[AdminController::class,'deliverd']);

Route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);

Route::get('/send_email/{id}',[AdminController::class,'send_email']);

Route::post('/send_user_email/{id}',[AdminController::class,'send_user_email']);

Route::get('/search',[AdminController::class,'searchdata']);

Route::get('/show_order',[HomeController::class,'show_order']);

Route::get('/cancle_order/{id}',[HomeController::class,'cancle_order']);

Route::post('/Add_comment',[HomeController::class,'add_comment']);

