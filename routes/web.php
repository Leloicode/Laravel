<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\TypeProductController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';






Route::post('/logoutadmin' ,[AdminController::class ,'postlogout'])->name('postlogout');

Route::post('/admin/login' ,[AdminController::class ,'postlogin'])->name('postloginadmin');
Route::get('/admin/login' ,[AdminController::class ,'getlogin'])->name('getloginadmin');


//client
Route::group(['middleware' => 'client'], function(){
    Route::get('/',[ProductController::class,'index']);
 
Route::get('/gioithieu' ,function () {
    return view('product.gioithieu');
})->name('gioithieu');

Route::get('/lienhe' ,function () {
    return view('product.lienhe');
})->name('lienhe');
route::get('/typefiter/{id?}/{name?}',[ProductController::class ,'type_product'])->name('Products.type_product');
Route::resource('Products',ProductController::class);



});



//amdin
Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
    //type_product
    // Route::get('/admin/edit-type/{id}',[AdminController::class,'edittype'])->name('admin.edittype-product');
    // Route::get('/admin/typeproduct',[AdminController::class , 'gettype_product'])->name('admin.typeproducts');
    // Route::post('/admin/deletetype/{id}',[AdminController::class , 'deletetype'])->name('admin.deletetype-product');
    // Route::post('/admin/updatetype/{id}',[AdminController::class , 'updatetype'])->name('admin.updatetype');   
    Route::resource('admin/typeproduct',TypeProductController::class);
    Route::resource('admin/product',ProductController::class);
    Route::get('admin/product-index',[ProductController::class ,'getindex'])->name('admin.products.index');
    //end_type_product
    Route::resource('admin/slide',SlideController::class);
    Route::get('admin/slide-index',[SlideController::class ,'getindex'])->name('admin.slides.index');
    Route::get('/admin/user' ,[AdminController::class , 'getuser'])->name('admin.user');

Route::get('/admin/edit-user/{id}',[AdminController::class,'edituser'])->name('admin.edituser');

Route::post('/admin/user/delete/{id}',[AdminController::class , 'deleteuser'])->name('deleteuser');
Route::get('/admin/user/update/{id}',[AdminController::class , 'updateuser'])->name('admin.updateuser');
    
});

Route::get('/input-email',[PageController::class,'getinputemail'])->name('getinputemail');

Route::post('/resetpassword' , [PageController::class , 'postInputEmail'])->name('postInputEmail');

Route::get('/add-to-cart/{id}',[PageController::class,'getAddtocart'])->name('themgiohang');