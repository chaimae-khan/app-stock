<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TvaController;
Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'products' => ProductController::class,
   
]);
// Route::get('/', function () {
//     return view('template.index');
// });

// TVA Routes
Route::get('tva', [App\Http\Controllers\TvaController::class, 'index']);
Route::post('addTva', [App\Http\Controllers\TvaController::class, 'store']);
Route::get('tva/{id}/edit', [App\Http\Controllers\TvaController::class, 'edit']);
Route::post('updateTva', [App\Http\Controllers\TvaController::class, 'update']);
Route::post('DeleteTva', [App\Http\Controllers\TvaController::class, 'destroy']);
// Category Routes
Route::get('categories', [App\Http\Controllers\CategoryController::class, 'index']);
Route::post('addCategory', [App\Http\Controllers\CategoryController::class, 'store']);
Route::get('categories/{id}/edit', [App\Http\Controllers\CategoryController::class, 'edit']);
Route::post('updateCategory', [App\Http\Controllers\CategoryController::class, 'update']);
Route::post('DeleteCategory', [App\Http\Controllers\CategoryController::class, 'destroy']);
Route::get('/productlist', function () {
    return view('template.productlist');
});
/* Route::get('/adduser', function () {
    return view('Users.create');
}); */
Route::post('adduser',[UserController::class,'store']);
// Route::get('/signin', function () {
//     return view('template.signin');
// });
Route::get('/addproduct', function () {
    return view('template.addproduct');
});
Route::get('/test', function () {
    return view('template.test');
});
Route::get('/sidebar', function () {
    return view('layouts.sidebar');
});
Route::get('/categorylist', function () {
    return view('template.categorylist');
});
Route::get('/addcategory', function () {
    return view('template.addcategory');
});
Route::get('/subcategorylist', function () {
    return view('template.subcategorylist');
});
Route::get('/subaddcategory', function() {
  return view('template.subaddcategory');
});
Route::get('/saleslist', function() {
  return view('template.saleslist');
});
Route::get('/salesreturnlists', function() {
    return view('template.salesreturnlists');
});
Route::get('/salesreturnlist', function() {
    return view('template.salesreturnlist');
});
Route::get('/createsalesreturn', function() {
    return view('template.createsalesreturn');
});
Route::get('/createsalesreturns', function() {
    return view('template.createsalesreturns');
});
Route::get('/newuser', function() {
    return view('template.newuser');
});
Route::get('/userlists', function() {
    return view('template.userlists');
});


Route::post('updateUser' ,[UserController::class,'update']);
Route::post('DeleteUser' ,[UserController::class,'destroy']);




