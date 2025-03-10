<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::post('updateRole'   , [RoleController::class,'update']);
Route::post('DeleteRole'   , [RoleController::class,'destroy']);




